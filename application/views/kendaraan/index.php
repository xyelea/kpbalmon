<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<br>
	<!-- Main content -->
	<div class="content">
		<!-- Default box -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-md">

					<!-- Profile Image -->
					<div class="card card-secondary elevation-4">
						<div class="card-header">
							<h3 class="card-title"><?= $judul . $title; ?></h3>

						</div>

						<div class="card-body table-responsive p-0">
							<div class="card-header">
								<div class="card-title">
									<a href="<?= base_url('admin/tambahKendaraan'); ?>" class="btn btn-primary btn-xs">Tambah Kendaraan</a>
								</div>

							</div>

							<?php if (validation_errors()) : ?>
								<div class="alert alert-danger text-center" role="alert">
									<?= validation_errors(); ?>
								</div>
							<?php endif; ?>
							<?= $this->session->flashdata('pesan'); ?>

							<table class="table table-hover table-bordered table-striped text-center">
								<thead>
									<tr>
										<th scope="row">No</th>
										<th>Merek</th>
										<th>Jenis</th>
										<th>No Registrasi</th>
										<th>Gambar</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
									<?php foreach ($kendaraan as $k) :
									?>
										<tr>
											<td><?= $i; ?></td>
											<td><?= $k['merek']; ?></td>
											<td><?= $k['jenis']; ?></td>
											<td><?= $k['no_registrasi']; ?></td>
											<td><img class="" src="<?= base_url('assets/img/upload/') . $k['image']; ?>" alt="Gambar Default" style="width: 150px;"></td>

											<td class="text-left">
												<a href="" class="badge badge-primary">detail</a>
												<a href="" class="badge badge-success">Edit</a>
												<a href="<?= base_url('admin/hapusKendaraan') ?> <?= $k['id_kendaraan']; ?>" class="badge badge-danger" onclick="return confirm('Anda yakin ? data tidak bisa di kembalikan setelah di hapus !');">Hapus</a>
											</td>
										</tr>
										<?php $i++; ?>
									<?php endforeach; ?>
								</tbody>

							</table>

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
