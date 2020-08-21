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
					<div class="card card-secondary">
						<div class="card-header">
							<h3 class="card-title"><?= $judul . $title; ?></h3>

						</div>

						<div class="card-body table-responsive p-0">
							<div class="card-header">
								<div class="card-title">
									<button href="" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addmenu">Tambah Menu</button>

								</div>

							</div>
							<?= form_error('menu', '<div class="alert alert-danger text-center" role="alert">', '</div>'); ?>
							<?= $this->session->flashdata('pesan'); ?>

							<table class="table table-hover table-bordered table-striped text-center">
								<thead>
									<tr>
										<th scope="row">No</th>
										<th>Menu</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
									<?php foreach ($menu as $m) : ?>
										<tr>
											<td><?= $i; ?></td>
											<td><?= $m['menu']; ?></td>
											<td class="text-left">
												<a href="" class="badge badge-success">Edit</a>
												<a href="" class="badge badge-danger">Hapus</a>
											</td>
										</tr>
										<?php $i++; ?>
									<?php endforeach; ?>
								</tbody>

							</table>

						</div>
						<!-- /.card-body -->
					</div>
					<!-- Modal -->
					<div class="modal fade" id="addmenu">
						<div class="modal-dialog">
							<div class="modal-content bg-dark">
								<div class="modal-header">
									<h4 class="modal-title">Tambah Menu Baru</h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span></button>
								</div>
								<form action="<?= base_url('menu') ?>" method="POST">
									<div class="modal-body">
										<div class="form-group">
											<input type="text" name="menu" id="menu" class="form-control" placeholder="Nama Menu">
										</div>
									</div>
									<div class="modal-footer justify-content-between">
										<button type="button" class="btn btn-outline-light" data-dismiss="modal">Tutup</button>
										<button type="submit" class="btn btn-outline-light">Simpan</button>
									</div>
								</form>
							</div>
							<!-- /.modal-content -->
						</div>
						<!-- /.modal-dialog -->
					</div>
					<!-- /.modal -->
				</div>
				<!-- /.content -->
			</div>
		</div>
	</div>
</div>
<!-- /.content-wrapper -->
