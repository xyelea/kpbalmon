<div class="mdl-layout mdl-js-layout color--gray is-small-screen login">
	<main class="mdl-layout__content">
		<div class="mdl-card mdl-card__login mdl-shadow--2dp">
			<div class="mdl-card__supporting-text color--dark-gray">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
						<span class="mdl-card__title-text text-color--smooth-gray"><img src="<?= base_url('assets'); ?>/img/logo-small.png" />
						</span>
					</div>
					<div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
						<span class="login-name text-color--white">Sistem Informasi Pemeliharaan Kendaraan | Balmon</span>
						<?= $this->session->flashdata('pesan'); ?><br>
						<span class="login-secondary-text text-color--smoke"> Masuk untuk mengakses sistem</span>
					</div>
					<div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
						<form action="<?= base_url('auth'); ?>" method="post">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
								<input class="mdl-textfield__input form-control" type="text" id="email" name="email" value="<?= set_value('email'); ?>">
								<label class="mdl-textfield__label" for="email">Email Pengguna</label>
								<?= form_error('email'); ?>
							</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
								<input class="mdl-textfield__input form-control" type="password" id="password" name="password">
								<label class="mdl-textfield__label" for="password">Password</label>
								<?= form_error('password'); ?>
							</div>
							<div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone submit-cell">
								<div class="mdl-layout-spacer">
									<button type="submit" class="mdl-button mdl-js-button mdl-button--raised color--light-blue ">
										Masuk
									</button>
								</div>
								<a href="<?= base_url('auth/registration') ?>" class="login-link">Tidak punya akun?</a>
							</div>
							<a href="<?= base_url('auth/forgotPassword') ?>" class="login-link">Lupa password?</a>
						</form>
					</div>

				</div>
			</div>
		</div>
	</main>
</div>
