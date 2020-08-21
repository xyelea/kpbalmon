<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-secondary elevation-4">
	<!-- Brand Logo -->
	<a href="#" class="brand-link">
		<img src="<?= base_url('assets/img/logo.png') ?>" alt="Logo" class=" elevation-3 img-bordered-sm" style="width: 40px;">
		<span class="brand-text font-weight-light">KOMINFO | BALMON</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="<?= base_url('user') ?>" class="d-block"><?= $user['name']; ?></a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
							 with font-awesome or any other icon font library -->
				<?php
				$role_id = $this->session->userdata('role_id');
				$queryMenu = "SELECT `user_menu`.`id`, `menu`
                            FROM `user_menu` JOIN `user_access_menu`
                              ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                           WHERE `user_access_menu`.`role_id` = $role_id
                        ORDER BY `user_access_menu`.`menu_id` ASC
                        ";
				$menu = $this->db->query($queryMenu)->result_array();
				?>
				<!-- looping Menu -->
				<?php foreach ($menu as $m) : ?>
					<li class="nav-header p-1">
						<?= $m['menu']; ?>
					</li>
					<!-- Siapkan sub menu sesuai menu -->
					<?php
					$menuId = $m['id'];
					$querySubMenu = " SELECT *
														 FROM `user_sub_menu` WHERE `menu_id` = $menuId
														 AND `user_sub_menu`.`is_active` = 1 ";
					$subMenu = $this->db->query($querySubMenu)->result_array();
					?>

					<?php foreach ($subMenu as $sm) : ?>
						<?php if ($title == $sm['title']) : ?>
							<li class="nav-item">
								<a href="<?= base_url($sm['url']); ?>" class="nav-link pb-0 active">
								<?php else : ?>
							<li class="nav-item">
								<a href="<?= base_url($sm['url']); ?>" class="nav-link pb-0">
								<?php endif; ?>
								<i class="nav-icon <?= $sm['icon']; ?>"></i>
								<p>
									<?= $sm['title']; ?>
								</p>
								</a>
							</li>
						<?php endforeach; ?>
						<li class="dropdown-divider mt-3"></li>
					<?php endforeach; ?>
					<li class="nav-item">
						<a href="<?= base_url('auth/logout'); ?>" class="nav-link">
							<i class="nav-icon fas fa-sign-out-alt"></i>
							<p>
								Keluar
							</p>
						</a>
					</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>


<!-- Control Sidebar  -->
<!-- <aside class="control-sidebar control-sidebar-dark"> -->
<!-- Control sidebar content goes here -->
<!-- <div class="p-3">
		<h5>Pengumuman</h5>
		<p>Sistem masih dalam tahap Development</p>
	</div>
</aside> -->
<!-- /.control-sidebar
