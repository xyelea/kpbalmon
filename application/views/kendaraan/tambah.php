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
					<h5>Tambah Kendaraan</h5>
					<div class="card card-primary card-outline elevation-5">
						<div class="card-body ">

							<?= form_open_multipart('admin/tambahKendaraan'); ?>
							<div class="form-group">
								<label for="merek">merek</label>
								<input type="text" class="form-control" id="merek" name="merek">
								<?= form_error('merek', '<div class="alert alert-danger text-center" role="alert">', '</div>'); ?>
							</div>
							<div class="form-group">
								<label for="jenis">jenis</label>
								<input type="text" class="form-control" id="jenis" name="jenis">
								<?= form_error('jenis', '<div class="alert alert-danger text-center" role="alert">', '</div>'); ?>
							</div>
							<div class="form-group">
								<label for="merek">Nomor Registrasi</label>
								<input type="text" class="form-control" id="no_registrasi" name="no_registrasi">
								<?= form_error('no_registrasi', '<div class="alert alert-danger text-center" role="alert">', '</div>'); ?>
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
