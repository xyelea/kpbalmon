<!-- Main Footer -->
<footer class="main-footer bg-gray-dark">
	<!-- To the right -->
	<div class="float-right d-none d-sm-block">
		Made with a lots of
		<img src="<?= base_url('assets'); ?>/img/hati.gif" alt="gambar footer" /> by
		<a href="https://www.linkedin.com/in/mastah-koding-7a597b1a6/" target="_blank" class="heading">
			Satria Efriyadi </a>
	</div>
	<!-- Default to the left -->
	<strong>Copyright &copy; <?= date('Y'); ?>.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url('assets/style/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/style/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/style/dist/js/adminlte.min.js') ?>"></script>
<!-- ajax -->
<script>
	// Ganti nama file saat di input
	$('.custom-file-input').on('change', function() {
		let fileName = $(this).val().split('\\').pop();
		$(this).next('.custom-file-label').addClass("selected").html(fileName);
	});

	$('.form-check-input').on('click', function() {
		const menuId = $(this).data('menu');
		const roleId = $(this).data('role');

		$.ajax({
			url: "<?= base_url('admin/changeaccess'); ?>",
			type: 'post',
			data: {
				menuId: menuId,
				roleId: roleId
			},
			success: function() {
				document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
			}
		});

	});
</script>
</body>

</html>
