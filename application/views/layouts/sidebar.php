  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
	<div class="sidebar-brand-icon ">
		<i class="fas fa-school"></i>
	</div>
	<div class="sidebar-brand-text mx-3">SMKN 4</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<?php if($title == "Dashboard"): ?>
<li class="nav-item active">
<?php else: ?>
	<li class="nav-item">
<?php endif; ?>
	<a class="nav-link" href="<?= base_url('dashboard') ?>">
		<i class="fas fa-fw fa-tachometer-alt"></i>
		<span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
	Interface
</div>

<!-- Nav Item - Charts -->
<?php if($title == "Profile"): ?>
<li class="nav-item active">
<?php else: ?>
	<li class="nav-item">
<?php endif; ?>
	<a class="nav-link" href="<?= base_url('profile') ?>">
		<i class="fas fa-fw fa-user"></i>
		<span>Profile</span></a>
</li>


<!-- halaman untuk admin saja -->
<?php if($this->session->userdata('level') == "Admin"): ?>
	<?php if($title == "Pembayaran SPP"): ?>
	<li class="nav-item active">
	<?php else: ?>
		<li class="nav-item">
	<?php endif; ?>
		<a class="nav-link" href="<?= base_url('admin/pembayaran') ?>">
			<i class="fas fa-fw fa-wallet"></i>
			<span>Pembayaran SPP</span></a>
	</li>

	<?php if($title == "SPP"): ?>
	<li class="nav-item active">
	<?php else: ?>
		<li class="nav-item">
	<?php endif; ?>
		<a class="nav-link" href="<?= base_url('admin/spp') ?>">
			<i class="fas fa-fw fa-book-open"></i>
			<span>SPP</span></a>
	</li>

	<?php if($title == "Data Murid"): ?>
	<li class="nav-item active">
	<?php elseif($title == "Data Petugas"): ?>
		<li class="nav-item active">
	<?php elseif($title == "Edit Data Murid"): ?>
		<li class="nav-item active">
	<?php elseif($title == "Data Petugas"): ?>
		<li class="nav-item active">
	<?php elseif($title == "Tambah Data Murid"): ?>
		<li class="nav-item active">
	<?php else: ?>
		<li class="nav-item">
	<?php endif; ?>
		<a class="nav-link" href="<?= base_url('admin/user') ?>">
			<i class="fas fa-fw fa-users"></i>
			<span>Users</span></a>
	</li>

	<?php if($title == "Kelas"): ?>
	<li class="nav-item active">
	<?php else: ?>
		<li class="nav-item">
	<?php endif; ?>
		<a class="nav-link" href="<?= base_url('admin/kelas') ?>">
			<i class="fas fa-fw fa-tasks"></i>
			<span>Kelas</span></a>
	</li>
<?php else: ?>
	<?php if($title == "SPPku"): ?>
	<li class="nav-item active">
	<?php else: ?>
		<li class="nav-item">
	<?php endif; ?>
		<a class="nav-link" href="<?= base_url('murid') ?>">
			<i class="fas fa-fw fa-book-open"></i>
			<span>SPP Saya</span></a>
	</li>
<?php endif; ?>





<li class="nav-item">
		<a class="nav-link" href="<?= base_url('auth/logout') ?>">
			<i class="fas fa-fw fa-sign-out-alt"></i>
			<span>Logout</span></a>
	</li>



<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
	<button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>



</ul>
<!-- End of Sidebar -->