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
									<button href="" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addSubmenu">Tambah Submenu</button>

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
										<th>Submenu</th>
										<th>Menu</th>
										<th>Url</th>
										<th>Ikon</th>
										<th>Aktif</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
									<?php foreach ($subMenu as $sm) :
										$active = $sm['is_active'] == 1 ? 'AKTIF' : 'TIDAK AKTIF'; ?>
										<tr>
											<td><?= $i; ?></td>
											<td><?= $sm['title']; ?></td>
											<td><?= $sm['menu']; ?></td>
											<td><?= $sm['url']; ?></td>
											<td><i class="<?= $sm['icon']; ?>"></i></td>
											<td><?= $active ?></td>

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
					<div class="modal fade" id="addSubmenu">
						<div class="modal-dialog">
							<div class="modal-content bg-dark">
								<div class="modal-header">
									<h4 class="modal-title">Tambah SubMenu Baru</h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span></button>
								</div>
								<form action="<?= base_url('menu/submenu') ?>" method="POST">
									<div class="modal-body">
										<div class="form-group">
											<input type="text" name="title" id="title" class="form-control" placeholder="Nama SubMenu">
										</div>
										<div class="form-group">
											<select name="menu_id" id="menu_id" class="form-control">
												<option value="">Pilih Menu</option>
												<?php foreach ($menu as $m) : ?>
													<option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
										<div class="form-group">
											<input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
										</div>
										<div class="form-group">
											<a href="https://fontawesome.com/icons?d=gallery&m=free" target="_blank">
												<p class="text-light"> Klik disini untuk melihat Kode ikon
												</p>
											</a>
											<input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
										</div>
										<div class="form-group">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
												<label class="form-check-label" for="is_active">
													Aktif?
												</label>
											</div>
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
