<?php

namespace App\Controllers\Crawl;

use App\Controllers\BaseController;

class ProductCrawler extends BaseController
{

    public function __construct()
    {
    }

    public function index()
    {
        return view('backend/product/product/crawl');
    }

    public function crawl()
    {
        include('simple_html_dom.php');
        $url = 'https://shopremcua.com/' . $_GET['url'];
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $html = curl_exec($curl);
        curl_close($curl);
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true); // Tắt báo lỗi HTML không hợp lệ
        $dom->loadHTML($html);
        libxml_clear_errors();

        $dem = $this->AutoloadModel->_get_where([
            'select' => 'objectid',
            'table' => 'router',
            'where' => ['canonical' => $_GET['url']],
            'count' => TRUE
        ]);

        if ($dem == 0) {
            $productHtml = str_get_html($html);
            $image = $this->getImageUrls($productHtml, '#image-gallery img');
            $price = $productHtml->find('.gia-thi-truong', 0) !== null ? $this->extractPrice($productHtml, '.gia-thi-truong') : $this->extractPrice($productHtml, '.gia-giam');
            $price_promotion = $productHtml->find('.gia-thi-truong', 0) !== null ? $this->extractPrice($productHtml, '.gia-giam') : 0;
            $productid = $productHtml->find('.prd-code', 0)->plaintext;
            $catalogue = $productHtml->find('.danh-muc-chinh', 0)->plaintext;
            $store = [
                'productid' => (empty($productid) ? '' : $productid),
                'productid_original' => (empty($productid) ? '' : $productid),
                'album' => json_encode($image),
                'publish' => 1,
                'catalogueid' => $this->getIdByCatalogue($catalogue),
                'price' => (int)$price,
                'price_promotion' => (int)$price_promotion,
                'image' => (isset($image[0]) ? $image[0] : ''),
                'created_at' => $this->currentTime,
                'updated_at' => $this->currentTime,
                'deleted_at' => 0,
            ];
            $resultid = $this->AutoloadModel->_insert([
                'table' => 'product',
                'data' => $store,
            ]);

            if ($resultid > 0) {
                $storeLanguage = [
                    'title' => $productHtml->find('.prd-title', 0)->plaintext,
                    'meta_title' => $productHtml->find('meta[property=og:title]', 0)->content,
                    'meta_description' => $productHtml->find('meta[name=description]', 0)->content,
                    'canonical' => $_GET['url'],
                    'description' => base64_encode(str_replace(['https://shopremcua.com/uploads/images/', '/uploads/images/'], '/upload/image/', $productHtml->find('.prd-description', 0)->innertext)),
                    'content' => base64_encode(str_replace(['https://shopremcua.com/uploads/images/', '/uploads/images/'], '/upload/image/', $productHtml->find('.noi-dung', 0)->innertext)),
                    'objectid' => $resultid,
                    'language' => $this->currentLanguage(),
                    'module' => 'product'
                ];
                $this->AutoloadModel->_insert([
                    'table' => 'product_translate',
                    'data' => $storeLanguage
                ]);

                insert_router([
                    'method' => 'create',
                    'id' => $resultid,
                    'language' => $this->currentLanguage(),
                    'module' => 'product',
                    'router' => '\App\Controllers\Frontend\Product\Product::index',
                    'canonical' => $_GET['url']
                ]);
                $this->create_relationship($resultid, [], $this->getIdByCatalogue($catalogue));
            }
            $productHtml->clear();
        }
        return json_encode([$url]);
    }

    private function getImageUrls($html, $selector)
    {
        // Parse HTML with Simple HTML DOM
        $productHtml = str_get_html($html);

        // Find all image elements within the specified section
        $imageElements = $productHtml->find($selector);

        // Check if any image elements are found
        if ($imageElements) {
            $images = [];
            foreach ($imageElements as $imageElement) {
                $images[] = str_replace(['https://shopremcua.com/uploads/images/', '/uploads/images/'], '/upload/image/', $imageElement->src);
            }
            return $images;
        } else {
            return [];
        }
    }

    private function create_relationship($objectid = 0, $catalogue = [], $catalogueid)
    {
        $relationshipId =   array_unique(array_merge($catalogue, [$catalogueid]));
        $this->AutoloadModel->_delete([
            'table' => 'object_relationship',
            'where' => [
                'module' => 'product',
                'objectid' => $objectid
            ]
        ]);
        $insert = [];
        if (isset($relationshipId) && is_array($relationshipId) && count($relationshipId)) {
            foreach ($relationshipId as $key => $val) {
                $insert[] = array(
                    'objectid' => $objectid,
                    'catalogueid' => $val,
                    'module' => 'product',
                );
            }
        }

        if (isset($insert) && is_array($insert) && count($insert)) {
            $flag = $this->AutoloadModel->_create_batch([
                'data' => $insert,
                'table' => 'object_relationship'
            ]);
        }

        return $flag;
    }

    private function productCategories()
    {
        return [
            ["id" => 1, "name" => "Sản phẩm"],
            ["id" => 2, "name" => "RÈM VẢI"],
            ["id" => 3, "name" => "RÈM SÂN KHẤU"],
            ["id" => 4, "name" => "CỬA LƯỚI CHỐNG MUỖI"],
            ["id" => 5, "name" => "VÁCH NGĂN TỔ ONG"],
            ["id" => 6, "name" => "RÈM VẢI 1 LỚP"],
            ["id" => 7, "name" => "RÈM VẢI 2 LỚP"],
            ["id" => 8, "name" => "RÈM VẢI VOAN"],
            ["id" => 9, "name" => "RÈM VẢI PHÒNG KHÁCH"],
            ["id" => 10, "name" => "RÈM VẢI PHÒNG NGỦ"],
            ["id" => 11, "name" => "RÈM VẢI CAO CẤP CHÂU ÂU"],
            ["id" => 12, "name" => "RÈM TỰ ĐỘNG"],
            ["id" => 13, "name" => "RÈM TRẦN TỰ ĐỘNG"],
            ["id" => 14, "name" => "RÈM SÂN KHẤU TỰ ĐỘNG"],
            ["id" => 15, "name" => "RÈM ROMAN TỰ ĐỘNG"],
            ["id" => 16, "name" => "RÈM GỖ TỰ ĐỘNG"],
            ["id" => 17, "name" => "RÈM CẦU VÒNG TỰ ĐỘNG"],
            ["id" => 18, "name" => "RÈM CUỐN TỰ ĐỘNG"],
            ["id" => 19, "name" => "RÈM VẢI TỰ ĐỘNG"],
            ["id" => 20, "name" => "RÈM CUỐN"],
            ["id" => 21, "name" => "RÈM CUỐN TRƠN"],
            ["id" => 22, "name" => "RÈM CHE BAN CÔNG"],
            ["id" => 23, "name" => "RÈM CUỐN LƯỚI"],
            ["id" => 24, "name" => "RÈM CUỐN IN TRANH"],
            ["id" => 25, "name" => "RÈM CUỐN TRANG CAO SU"],
            ["id" => 26, "name" => "RÈM CUỐN TRÁNG BẠC"],
            ["id" => 27, "name" => "RÈM TRẦN"],
            ["id" => 28, "name" => "RÈM CẦU VÒNG"],
            ["id" => 29, "name" => "RÈM LÁ DỌC"],
            ["id" => 30, "name" => "RÈM ROMAN"],
            ["id" => 31, "name" => "RÈM GỖ"]
        ];
    }

    public function getIdByCatalogue($catalogue)
    {
        $categories = $this->productCategories();
        foreach ($categories as $category) {
            if ($category['name'] === $catalogue) {
                return $category['id'];
            }
        }
        return null; // Return null if not found
    }

    public function extractPrice($productHtml, $priceClass)
    {
        $priceElement = $productHtml->find($priceClass, 0);
        if ($priceElement) {
            $priceText = $priceElement->plaintext;
            $cleanedPrice = str_replace(['đ', '.', ',', '₫'], '', $priceText);
            return (int)$cleanedPrice;
        }
        return 0;
    }
}







// $productUrls = [];
// $anchors = $dom->getElementsByTagName('a');
// foreach ($anchors as $anchor) {
//     $class = $anchor->getAttribute('class');
//     if (strpos($class, 'elementor-sub-item') !== false) {
//         $productUrl = $anchor->getAttribute('href');
//         $productUrls[] = $productUrl;
//     }

//     if (strpos($class, 'elementor-item') !== false) {
//         $productUrl = $anchor->getAttribute('href');
//         $productUrls[] = $productUrl;
//     }
// }

// if(isset($productUrls) && is_array($productUrls) && count($productUrls)){
//     foreach ($productUrls as $productUrl) {
//         $productHtml = file_get_html($productUrl);
//         $url = $productHtml->find('a.page-numbers')->src;
//         $productUrls[] = $url;
//         $productHtml->clear();
//     }
// }