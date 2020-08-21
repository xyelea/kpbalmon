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
						<span class="login-name text-color--white">Reset Password untuk : </span>
						<?= $this->session->flashdata('pesan'); ?><br>
						<span class="login-name text-color--white"><?= $this->session->userdata('reset_email'); ?></span>
					</div>
					<div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">

						<form action="<?= base_url('auth/changepassword'); ?>" method="post">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
								<input class="mdl-textfield__input form-control" type="password" id="password1" name="password1">
								<span class="color-text--red"><?= form_error('password1'); ?> </span>
								<label class="mdl-textfield__label" for="password">Password baru</label>
							</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
								<input class="mdl-textfield__input form-control" type="password" id="password2" name="password2">
								<span class="color-text--red"><?= form_error('password1'); ?> </span>
								<label class="mdl-textfield__label" for="password">Ulangi password</label>
							</div>
							<div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone submit-cell">
								<div class="mdl-layout-spacer">
									<button type="submit" class="mdl-button mdl-js-button mdl-button--raised color--light-blue ">
										Ganti Password
									</button>
								</div>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	</main>
</div>
