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
					<?= $this->session->flashdata('pesan'); ?>
					<h5>Role : <?= $role['role']; ?></h5>
					<!-- Profile Image -->
					<div class="card card-secondary">
						<div class="card-header">
							<h3 class="card-title"><?= $judul . $title; ?></h3>

						</div>

						<div class="card-body table-responsive p-0">



							<table class="table table-hover table-bordered table-striped text-center">
								<thead>
									<tr>
										<th scope="row">No</th>
										<th>Menu</th>
										<th>Akses</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
									<?php foreach ($menu as $m) : ?>
										<tr>
											<td><?= $i; ?></td>
											<td><?= $m['menu']; ?></td>
											<td class="text-left">
												<div class="form-check text-center">
													<input type="checkbox" class="form-check-input" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id'] ?>" data-menu="<?= $m['id']; ?>">

												</div>
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
