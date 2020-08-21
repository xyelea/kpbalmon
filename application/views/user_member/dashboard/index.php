<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<br>
	<!-- Main content -->
	<div class="content">
		<!-- Default box -->
		<div class="container-fluid">
			<div class="row">
				<div class=" col-md-6 mr-auto ml-auto">
					<?= $this->session->flashdata('pesan'); ?>
					<!-- Profile Image -->
					<div class="card card-primary card-outline elevation-5">
						<div class="card-body ">
							<div class="text-center">
								<img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/img/profile/') . $user['image']; ?>" alt="User profile picture">
							</div>

							<h3 class="profile-username text-center"><?= $user['name']; ?></h3>

							<p class="text-muted text-center">Terdaftar pada <?= date('d F Y', $user['date_created']); ?></p>

							<ul class="list-group list-group-unbordered mb-3">
								<li class="list-group-item">
									<strong class="text-center">Nama : <?= $user['name']; ?></strong>
								</li>
								<li class="list-group-item">
									<strong class="text-center">Email : <?= $user['email']; ?></strong>
								</li>

							</ul>

							<a href="<?= base_url('user/edit'); ?>" class="btn btn-primary btn-block"><b>Edit profil</b></a>
						</div>
						<!-- /.card-body -->
					</div>
				</div>
				<!-- /.content -->
			</div>
		</div>
	</div>
</div>
<!-- /.content-wrapper -->
