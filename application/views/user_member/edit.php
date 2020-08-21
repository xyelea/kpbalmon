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
					<!-- Profile Image -->
					<div class="card card-primary card-outline elevation-5">
						<div class="card-body ">
							<div class="text-center">
								<img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/img/profile/') . $user['image']; ?>" alt="User profile picture">
							</div>
							<p class="text-muted text-center">Terdaftar pada <?= date('d F Y', $user['date_created']); ?></p>

							<?= form_open_multipart('user/edit'); ?>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
							</div>
							<div class="form-group">
								<label for="name">Nama</label>
								<input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
								<?= form_error('name', '<div class="alert alert-danger text-center" role="alert">', '</div>'); ?>
							</div>
							<div class="form-group">
								<label for="">Gambar</label>
								<div class="input-group">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="image" name="image">
										<label class="custom-file-label" for="image">Pilih file ( Ukuran rekomendasi 448x448 px )</label>
									</div>
									<div class="input-group-append">
										<span class="input-group-text" id="">Unggah</span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block"><b>Simpan</b>
								</button>
							</div>
							</form>




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
