<?php
$model = new App\Models\AutoloadModel();
$banner_homepage = get_slide(['keyword' => 'main', 'language' => $language]);
$testimonials = get_slide(['keyword' => 'testimonials', 'language' => $language]);
$hotel = get_slide(['keyword' => 'hotel', 'language' => $language]);
$productList = $model->_get_where(array(
  'select' => 'tb1.id, tb1.viewed,  tb1.created_at ,tb1.productid, tb1.image,tb1.price,tb1.rate, tb1.price_promotion,  tb1.album, tb3.title, tb3.canonical, tb3.description, tb3.content',
  'table' => 'product as tb1',
  'where' => [
    'tb1.deleted_at' => 0,
    'tb1.publish' => 1,
  ],
  'join' => [
    [
      'object_relationship as tb2',
      'tb1.id = tb2.objectid AND tb2.module = "product" ',
      'inner'
    ],
    [
      'product_translate as tb3',
      'tb1.id = tb3.objectid AND tb3.module = "product" AND tb3.language = \'' . currentLanguage() . '\' ',
      'inner'
    ],
  ],
  'limit' => 16,
  'order_by' =>  'tb1.created_at desc',
  'group_by' => 'tb1.id'
), TRUE);
$productHot = $model->_get_where(array(
  'select' => 'tb1.id, tb1.viewed,  tb1.created_at ,tb1.productid, tb1.image,tb1.price,tb1.rate, tb1.price_promotion,  tb1.album, tb3.title, tb3.canonical, tb3.description, tb3.content',
  'table' => 'product as tb1',
  'where' => [
    'tb1.deleted_at' => 0,
    'tb1.publish' => 1,
    'tb1.hot' => 1,
  ],
  'join' => [
    [
      'object_relationship as tb2',
      'tb1.id = tb2.objectid AND tb2.module = "product" ',
      'inner'
    ],
    [
      'product_translate as tb3',
      'tb1.id = tb3.objectid AND tb3.module = "product" AND tb3.language = \'' . currentLanguage() . '\' ',
      'inner'
    ],
  ],
  'limit' => 8,
  'order_by' =>  'tb1.created_at desc',
  'group_by' => 'tb1.id'
), TRUE);
?>
<main>
  <?php if (isset($banner_homepage) && is_array($banner_homepage) && count($banner_homepage)) { ?>
    <section class="parallax parallax01" style="background-image: url(<?php echo $banner_homepage[0]['image'] ?>)">
      <div class="container">
        <div class="row">
          <div class="grid_12">
            <div class="promo-box">
              <p><?php echo $banner_homepage[0]['alt'] ?> <em><?php echo $banner_homepage[0]['title'] ?></em></p>
            </div>
          </div>

        </div>
      </div>
    </section>
  <?php } ?>
  <section class="well center border">
    <div class="container">
      <h2><?php echo !empty($general['homepage_title_introduce']) ? $general['homepage_title_introduce'] : ''; ?></h2>
      <?php echo !empty($general['homepage_introduce']) ? $general['homepage_introduce'] : ''; ?>
    </div>
  </section>
  <?php if (isset($general['aboutus_image']) && !empty($general['aboutus_image'])) { ?>
    <section class="well">
      <div class="container">
        <div class="custom-box01">
          <div class="row">
            <div class="grid_6 text-center">
              <div class="img">
                <img src="<?php echo $general['aboutus_image'] ?>" alt="">
              </div>
            </div>
            <div class="grid_6">
              <h2><?php echo $general['aboutus_title'] ?></h2>
              <p><?php echo $general['aboutus_description'] ?></p>
              <div class="iconed-box">
                <div class="icon icon-ith-motel"></div>
                <h3><?php echo $general['aboutus_title1'] ?></h3>
                <p><?php echo $general['aboutus_description1'] ?></p>
              </div>
              <div class="iconed-box">
                <div class="icon icon-ith-hotel77"></div>
                <h3><?php echo $general['aboutus_title2'] ?></h3>
                <p><?php echo $general['aboutus_description2'] ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php } ?>
  <section class="parallax parallax02 center" style="background-image: url(<?php echo $general['services_image'] ?>)">
    <div class="container">
      <h2><?php echo $general['services_title'] ?></h2>
      <div class="custom-box02 left">
        <div class="row">
          <div class="grid_6">
            <div class="iconed-box">
              <div class="icon icon-ith-cup53"></div>
              <h3><?php echo $general['services_title1'] ?></h3>
              <p><?php echo $general['services_description1'] ?></p>
            </div>
          </div>
          <div class="grid_6">
            <div class="iconed-box">
              <div class="icon icon-ith-dont-disturb"></div>
              <h3><?php echo $general['services_title2'] ?></h3>
              <p><?php echo $general['services_description2'] ?></p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="grid_6">
            <div class="iconed-box">
              <div class="icon icon-ith-suitcase47"></div>
              <h3><?php echo $general['services_title3'] ?></h3>
              <p><?php echo $general['services_description3'] ?></p>
            </div>
          </div>
          <div class="grid_6">
            <div class="iconed-box">
              <div class="icon icon-ith-hanger24"></div>
              <h3><?php echo $general['services_title4'] ?></h3>
              <p><?php echo $general['services_description4'] ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php if (isset($testimonials) && is_array($testimonials) && count($testimonials)) { ?>
    <section class="well center">
      <div class="container">
        <h2><?php echo $testimonials[0]['cat_title'] ?></h2>
        <figure class="testimonial-box">
          <div class="img"><img src="<?php echo $testimonials[0]['image'] ?>" alt=""></div>
          <blockquote><?php echo $testimonials[0]['description'] ?></blockquote>
          <figcaption><?php echo $testimonials[0]['title'] ?></figcaption>
        </figure>
      </div>
    </section>
  <?php } ?>
  <?php if (isset($hotel) && is_array($hotel) && count($hotel)) { ?>
    <section>
      <div class="gallery-box">
        <?php foreach ($hotel as $key => $val) { ?>
          <div class="img"><a data-fancybox-group="gallery" class="thumb" href="<?php echo $val['image'] ?>"><img src="<?php echo $val['image'] ?>" alt=""><span class="thumb_overlay"></span></a></div>
        <?php } ?>
      </div>
    </section>
  <?php } ?>
  <section class="well well__01 bg-1 center">
    <div class="container">
      <div class="custom-box03">
        <div class="booking-box mt10">
          <h2>Đặt phòng</h2>
          <form id="bookingForm" class="booking-form">
            <div class="tmInput">
              <input class="minh-fullname-contact" name="fullname" placeholder="Họ và tên" type="text">
            </div>
            <div class="tmInput">
              <input class="minh-email-contact" name="email" placeholder="E-mail" type="text">
            </div>
            <div class="tmInput">
              <input class="minh-phone-contact" name="phone" placeholder="Số điện thoại" type="text">
            </div>
            <label class="tmDatepicker">
              <input class="minh-checkin-contact" type="text" name="Check in" placeholder='Check in'>
            </label>
            <label class="tmDatepicker">
              <input class="minh-checkout-contact" type="text" name="Check out" placeholder='Check out'>
            </label>
            <div class="tmInput">
              <textarea class="minh-message-contact" placeholder="Gửi lời nhắn của bạn tại đây..." name="" id=""></textarea>
            </div>
            <button class="btn btn-booking-form" type="submit">Đặt ngay</button>
          </form>
          <p>Liên hệ với chúng tôi để được đặt phòng sớm nhất </p>
        </div>
      </div>
    </div>
  </section>

</main>
<?php

function convertYouTubeUrlToIframe($url)
{
  if (preg_match('/youtu\.be\/([^\?]*)/', $url, $matches)) {
    $videoId = $matches[1];
  } elseif (preg_match('/youtube\.com\/.*v=([^&]*)/', $url, $matches)) {
    $videoId = $matches[1];
  } else {
    return 'Invalid YouTube URL';
  }

  return '<iframe src="https://www.youtube.com/embed/' . $videoId . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
}
?>