<!DOCTYPE html>
<html lang="vi-VN" data-wf-page="6330105a320e0ead44adaf1d" data-wf-site="6330105a320e0e0ed5adaf1c">

<head>
	<!-- CONFIG -->
	<base href="<?php echo BASE_URL ?>" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="robots" content="index,follow" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Thu thập dữ liệu</title>
	<script src="public/backend/js/jquery-3.1.1.min.js"></script>
	<style>
		.wrap-text {
			padding: 100px;
		}

		.border-text {
			border: 1px solid blue;
			height: 400px;
			overflow: auto;
			padding: 10px;
		}

		.title-catalogue {
			color: red;
		}

		.title-product {
			color: green;
			padding-left: 10px;
		}
	</style>
</head>

<body>
	<div class="wrap-text">
		<div class="border-text">

		</div>
		<button class="click-crawl" style="margin-top: 50px; padding: 10px 20px; background: #ccc;cursor: pointer;">Thu thập</button>
	</div>

	<script>
		$(document).on('click', '.click-crawl', async function() {
			let productUrls = [
				'rem-vai-1-lop-1-p5',
				'rem-vai-1-lop-2-p6',
				'rem-vai-1-lop-3-p7',
				'rem-vai-1-lop-4-p8',
				'rem-vai-1-lop-5-p9',
				'rem-vai-1-lop-6-p10',
				'rem-vai-1-lop-7-p11',
				'rem-vai-1-lop-8-p12',
				'rem-vai-1-lop-9-p13',
				'rem-cau-vong-han-quoc-1-p14',
				'man-cau-vong-p15',
				'rem-cau-vong-3-p16',
				'rem-cau-vong-4-p17',
				'rem-cau-vong-han-quoc-5-p18',
				'rem-cau-vong-han-quoc-6-p19',
				'rem-cau-vong-han-quoc-7-p20',
				'rem-cuon-1-p21',
				'rem-cuon-tron-2-p22',
				'rem-cuon-in-tranh-1-p23',
				'rem-cuon-in-tranh-2-p24',
				'rem-cuon-in-tranh-3-p25',
				'rem-cuon-in-tranh-4-p26',
				'rem-cuon-in-tranh-5-p27',
				'man-cuon-in-tranh-6-p28',
				'rem-cuon-tron-3-p29',
				'rem-cuon-tron-4-p30',
				'rem-san-khau-1-p31',
				'rem-san-khau-2-p32',
				'rem-san-khau-3-p33',
				'rem-san-khau-4-p34',
				'rem-la-doc-1-p35',
				'rem-la-doc-2-p36',
				'rem-la-doc-3-p37',
				'rem-la-doc-4-p38',
				'rem-la-doc-5-p39',
				'rem-roman-1-p40',
				'rem-roman-2-p41',
				'rem-roman-3-p42',
				'rem-roman-4-p43',
				'rem-roman-xep-lop-5-p44',
				'rem-roman-6-p45',
				'rem-tran-1-p46',
				'rem-tran-2-p47',
				'rem-tran-3-p48',
				'rem-tran-4-p49',
				'rem-sao-g-1-p50',
				'rem-sao-g-2-p51',
				'rem-sao-g-3-p52',
				'rem-sao-g-4-p53',
				'rem-sao-g-5-p54',
				'rem-vai-2-lop-1-p55',
				'rem-vai-2-lop-2-p56',
				'rem-vai-2-lop-3-p57',
				'rem-vai-2-lop-4-p58',
				'rem-vai-2-lop-5-p59',
				'rem-vai-2-lop-6-p60',
				'rem-vai-tu-dong-1-p61',
				'rem-vai-tu-dong-2-lop-p62',
				'rem-vai-tu-dong-3-p63',
				'rem-cuon-van-phong-tu-dong-p64',
				'rem-cuon-tu-dong-1-p65',
				'man-cuon-tu-dong-p66',
				'rem-tran-tu-dong-1-p67',
				'rem-cau-vong-tu-dong-zaki-p68',
				'man-cau-vong-tu-dong-p69',
				'rem-cuon-cau-vong-tu-dong-p70',
				'rem-san-khau-tu-dong-zaki-p71',
				'rem-sao-g-tu-dong-p72',
				'man-g-tu-dong-p73',
				'rem-voan-trang-p74',
				'rem-voan-mau-p75',
				'rem-phong-khach-p76',
				'man-vai-phong-khach-p77',
				'rem-phong-ngu-p78',
				'rem-cao-cap-chau-au-p79',
				'man-vai-cao-cap-chau-au-p80',
				'rem-cuon-luoi-1-p81',
				'rem-cuon-luoi-2-p82',
				'man-cuon-van-phong-p83',
				'man-sao-cuon-p84',
				'rem-cuon-luoi-cao-cap-p85',
				'rem-vai-2-lop-phong-ngu-p86',
				'rem-roman-tu-dong-cao-cap-p87',
				'rem-cau-vong-cao-cap-p88',
				'rem-la-doc-cao-cap-p89',
				'man-sao-g-p90',
				'rem-vai-voan-cao-cap-nhat-ban-p91',
				'man-vai-cao-cap-1-lop-p92',
				'man-che-gieng-troi-p93',
				'man-san-khau-p94',
				'man-vai-tu-dong-p95',
				'rem-vai-bi-chau-au-nhap-khau-p96',
				'man-cuon-tron-p97',
				'man-cuon-tron-2-p98',
				'rem-vai-phong-khach-cao-cap-p99',
				'rem-vai-2-lop-phong-khach-p100',
				'man-cuon-van-phong-2-p101',
				'man-cuon-van-phong-3-p102',
				'rem-vai-2-lop-7-p103',
				'rem-sao-cuon-1-p104',
				'man-roman-xep-lop-1-p105',
				'rem-cau-vong-han-quoc-p106',
				'rem-vai-phong-khach-7-p107',
				'rem-sao-cuon-4-p108',
				'man-sao-cuon-luoi-1-p109',
				'rem-cuon-luoi-che-ban-cong-1-p110',
				'rem-cuon-trang-bac-1-p111',
				'rem-cau-vong-han-quoc-8-p112',
				'man-cuon-cau-vong-11-p113',
				'rem-cau-vong-han-quoc-14-p114',
				'man-cuon-cau-vong-15-p115',
				'rem-vai-nhap-khau-2-lop-p116',
				'rem-che-ban-cong-1-p117',
				'rem-tre-truc-1-p118',
				'man-cuon-van-phong-4-p119',
				'rem-vai-2-lop-8-p120',
				'rem-cuon-van-phong-1-p121',
				'rem-thong-minh-p122',
				'dong-co-rem-p123',
				'rem-vai-hai-lop-9-p124',
				'rem-cuon-van-phong-3-p125',
				'rem-che-ban-cong-2-p126',
				'rem-nhua-trong-suot-che-ban-cong-p127',
				'rem-roman-7-p128',
				'rem-cuon-in-tranh-canh-bien-p129',
				'rem-cuon-in-tranh-khung-cua-so-p130',
				'rem-cuon-in-tranh-ngua-p131',
				'rem-cuon-in-tranh-son-thuy-p132',
				'rem-cuon-in-tranh-phong-canh-p133',
				'rem-cuon-in-tranh-son-dau-p134',
				'rem-la-doc-7-p135',
				'rem-la-doc-8-p136',
				'rem-la-doc-9-p137',
				'rem-la-doc-han-quoc-1-p138',
				'rem-la-doc-han-quoc-2-p139',
				'rem-cuon-5-p140',
				'rem-cuon-6-p141',
				'rem-cuon-2-lop-1-p142',
				'rem-cuon-7-p143',
				'rem-cuon-8-p144',
				'rem-cuon-van-phong-3-p145',
				'rem-cuon-chong-nang-1-p146',
				'rem-cuon-chong-nang-2-p147',
				'rem-cuon-chong-nang-3-p148',
				'rem-cuon-chong-nang-4-p149',
				'man-sao-g-1-p152',
				'rem-cau-vong-01-p153',
				'rem-vai-2-lop-01-p154',
				'rem-cuon-van-phong-p156',
				'rem-cau-vong-02-p157',
				'vach-ngan-to-ong-1-p158',
				'cua-luoi-chong-muoi-1-p159',
				'cua-luoi-chong-muoi-2-p160',
				'vach-ngan-to-ong-2-p161',
				'rem-cau-vong-bs-p182',
				'vach-ngan-to-ong-3-p183',
				'cua-luoi-chong-mu-i-3-p184',
				'rem-cau-vong-be-p185',
				'vach-ngan-to-ong-4-p186'
			]

			for (var i = 0; i < productUrls.length; i++) {
				let ajaxUrl = "/product-crawl";
				let url = productUrls[i];
				await $.ajax({
					method: "GET",
					url: ajaxUrl,
					data: {
						url: url,
					},
					dataType: "json",
					cache: false,
					success: function(data) {
						let html = "";
						html += "<div class='title-catalogue'>";
						html += url;
						html += "</div>";
						for (var j = 0; j < data.length; j++) {
							html += "<div class='title-product'>";
							html += data[j];
							html += "</div>";
						}
						html += "</div>";
						console.log(data)
						$('.border-text').append(html);
					}
				});
			}
		});
	</script>
</body>

</html>