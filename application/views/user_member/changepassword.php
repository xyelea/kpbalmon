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
								<h1>Ganti Password</h1>
								<?= $this->session->flashdata('pesan'); ?>
							</div>


							<?= form_open_multipart('user/changepassword'); ?>
							<div class="form-group">
								<label for="name">Password lama</label>
								<input type="password" class="form-control" id="current_password" name="current_password">
								<?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<label for="name">Password baru</label>
								<input type="password" class="form-control" id="new_password1" name="new_password1">
								<?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<label for="name">Ulangi password baru</label>
								<input type="password" class="form-control" id="new_password2" name="new_password2">
								<?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
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
