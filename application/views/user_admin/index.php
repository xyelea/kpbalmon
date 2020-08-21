<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<br>
	<!-- Main content -->
	<div class="content">
		<!-- Default box -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-info">
						<div class="inner">
							<h3>
								<?= $this->db->count_all('user');
								?>
							</h3>

							<p> Total Akun</p>
						</div>
						<div class="icon">
							<i class="fas fa-fw fa-users"></i>
						</div>
						<a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-success">
						<div class="inner">
							<h3> <?= $this->db->count_all('user_role');
										?></h3>
							<p>Role Pengguna</p>
						</div>
						<div class="icon">
							<i class="fas fa-fw fa-user-tie"></i>
						</div>
						<a href="<?= base_url('admin/role') ?>" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-warning">
						<div class="inner">
							<h3><?= $this->db->count_all('user_sub_menu');
									?></h3>

							<p>Total Menu</p>

						</div>
						<div class="icon">
							<i class="fas fa-fw fa-folder"></i>
						</div>
						<a href="<?= base_url('menu/submenu') ?>" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->


			</div>
			<!-- /.content -->
		</div>
	</div>
</div>
</div>
<!-- /.content-wrapper -->
