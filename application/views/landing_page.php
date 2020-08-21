<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title><?= $judul	 ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets'); ?>/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets'); ?>/css/responsive.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />
	<link rel="icon" href="<?= base_url('assets'); ?>/img/favicon.ico" />
</head>

<body>
	<header>
		<div class="header-left">
			<img class="logo" src="<?= base_url('assets'); ?>/img/logo-small.png" />
		</div>
		<nav>
			<ul>
				<li><a href="<?= base_url('auth'); ?>" class="">Masuk</a></li>
			</ul>
		</nav>
	</header>
	<section class="jumbotron">

		<div class="container">
			<h1>SISTEM INFORMASI</h1>
			<h1>PEMELIHARAAN KENDARAAN</h1>
			<h1>BALMON BENGKULU</h1>
		</div>
	</section>
	<main class="fitur-wrapper">
		<div class="container">
			<div class="heading">
				<h2>Fitur Sistem</h2>
			</div>

			<div class="item">
				<div class="items-icon">
					<img src="<?= base_url('assets'); ?>/img/biru.png" />
					<p>Secure</p>
				</div>
				<p class="txt-contents">
					Sistem menggunakan <strong>algoritma Bcrypt</strong> untuk mengamankan <strong>Password</strong> dan Terlindungi dari serangan <strong>XSS.</strong>
				</p>
			</div>
			<div class="item">
				<div class="items-icon">
					<img src="<?= base_url('assets'); ?>/img/kuning.png" />
					<p>UI</p>
				</div>
				<p class="txt-contents">
					<strong>User Interface</strong> dirancang sedemikian rupa melalui beberapa tahap <strong>perencanaan</strong> agar menghasilkan tampilan yang <strong>menarik.</strong>
				</p>
			</div>
			<div class="item">
				<div class="items-icon">
					<img src="<?= base_url('assets'); ?>/img/merah.png" />
					<p>UX</p>
				</div>
				<p class="txt-contents">
					<strong>User Experience</strong> menjadi salah satu <strong>Poin</strong> pengembangan <strong>utama</strong> bagi <strong> Webmaster</strong> agar <strong>sistem mudah digunakan.</strong>
				</p>
			</div>
			<section class="item">
				<div class="items-icon">
					<img src="<?= base_url('assets'); ?>/img/dongker.png" />
					<p>Responsif</p>
				</div>
				<p class="txt-contents">
					Tampilan website di desain dengan tampilan <strong>Responsif</strong> untuk memudahkan pengguna <strong> mobile</strong>.
				</p>
			</section>
			<div class="clear"></div>
		</div>
		</div>
	</main>
	<section class="donwload-wrapper">
		<div class="container">
			<article class="heading">
				<h2>
					Silahkan <strong> Registrasikan akun </strong> anda ke <strong> admin </strong> bila anda belum memiliki akun.
				</h2>
				<h3>
					Hubungi Webmaster bila terdapat <strong>Bug</strong> dan <strong>eror</strong> di dalam Sistem
				</h3>
			</article>
			<span class="btn donwload">dev.xyeleawebmaster@gmail.com</span>
		</div>
	</section>

	<footer>
		<aside>
			<p>
				Made with a lots of
				<img src="<?= base_url('assets'); ?>/img/hati.gif" alt="gambar footer" /> by
				<a href="https://www.linkedin.com/in/mastah-koding-7a597b1a6/" target="_blank" class="heading">
					Satria Efriyadi </a>
			</p>
		</aside>
	</footer>
</body>

</html>
