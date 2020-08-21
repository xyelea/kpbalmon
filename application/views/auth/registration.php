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
						<span class="login-name text-color--white">Silahkan Registrasi untuk mengakses sistem</span>
					</div>

					<div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
						<!-- form -->
						<form method="post" action="<?= base_url('auth/registration') ?>">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
								<input class="mdl-textfield__input" type="text" id="name" name="name" value="<?= set_value('name'); ?>">
								<label class="mdl-textfield__label" for="name">Nama</label>
								<?= form_error('name'); ?>
							</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
								<input class="mdl-textfield__input" type="text" id="email" name="email" value="<?= set_value('email'); ?>">
								<label class="mdl-textfield__label" for="email">Email</label>
								<?= form_error('email'); ?>
							</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
								<input class="mdl-textfield__input" type="password" id="password1" name="password1">
								<label class="mdl-textfield__label" for="password1">Password</label>
								<?= form_error('password1'); ?>
							</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
								<input class="mdl-textfield__input" type="password" id="password2" name="password2">
								<label class="mdl-textfield__label" for="password2">Ulangi password</label>
								<?= form_error('password2'); ?>
							</div>
							<div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone submit-cell">
								<a href="<?= base_url('auth') ?>" class="login-link">Sudah punya akun ?</a>
								<div class="mdl-layout-spacer"></div>
								<button type="submit" class="mdl-button mdl-js-button mdl-button--raised color--light-blue">
									Daftar
								</button>
						</form>
					</div>
				</div>



			</div>
		</div>
</div>
</div>
</main>
</div>
