<!-- <?php
session_start();
if (empty($_SESSION['Username']) and empty($_SESSION['Password'])) {
	echo "<script type='text/javascript'>
	alert('SILAKAN LOGIN TERLEBIH DAHULU!')
	window.location='index.php';
	</script>";
} else {
?>

	

			<?php

			$aksi_detail = "code/proses/update-delete/aksi_detail.php";
			$aksi_dokter = "code/proses/update-delete/aksi_dokter.php";
			$aksi_login = "code/proses/update-delete/aksi_login.php";
			$aksi_obat = "code/proses/update-delete/aksi_obat.php";
			$aksi_pasien = "code/proses/update-delete/aksi_pasien.php";
			$aksi_poli = "code/proses/update-delete/aksi_poli.php";
			$aksi_resep = "code/proses/update-delete/aksi_resep.php";
			$home = "home.php";
			$formulir_detail = "code/formulir/formulir_detail.php";
			$formulir_dokter = "code/formulir/formulir_dokter.php";
			$formulir_login = "code/formulir/formulir_login.php";
			$formulir_obat = "code/formulir/formulir_obat.php";
			$formulir_pasien = "code/formulir/formulir_pasien.php";
			$formulir_pendaftaran = "code/formulir/formulir_pendaftaran.php";
			$formulir_poli = "code/formulir/formulir_poli.php";
			$formulir_resep = "code/formulir/formulir_resep.php";
			$informasi_akun = "code/informasi/informasi_akun.php";
			$informasi_resep = "code/informasi/informasi_resep.php";
			$tabel_detail = "code/tabel/tabel_detail.php";
			$tabel_dokter = "code/tabel/tabel_dokter.php";
			$tabel_login = "code/tabel/tabel_login.php";
			$tabel_obat = "code/tabel/tabel_obat.php";
			$tabel_pasien = "code/tabel/tabel_pasien.php";
			$tabel_pendaftaran = "code/tabel/tabel_pendaftaran.php";
			$tabel_poli = "code/tabel/tabel_poli.php";
			$tabel_resep = "code/tabel/tabel_resep.php";

			?>

			<div id="konten">
				<?php
				if (isset($_GET['home'])) {
					require_once $home;
				} else if (isset($_GET['aksi_detail'])) {
					require_once $aksi_detail;
				} else if (isset($_GET['aksi_dokter'])) {
					require_once $aksi_dokter;
				} else if (isset($_GET['aksi_login'])) {
					require_once $aksi_login;
				} else if (isset($_GET['aksi_obat'])) {
					require_once $aksi_obat;
				} else if (isset($_GET['aksi_pasien'])) {
					require_once $aksi_pasien;
				} else if (isset($_GET['aksi_poli'])) {
					require_once $aksi_poli;
				} else if (isset($_GET['aksi_resep'])) {
					require_once $aksi_resep;
				} else if (isset($_GET['formulir_detail'])) {
					require_once $formulir_detail;
				} else if (isset($_GET['formulir_dokter'])) {
					require_once $formulir_dokter;
				} else if (isset($_GET['formulir_login'])) {
					require_once $formulir_login;
				} else if (isset($_GET['formulir_obat'])) {
					require_once $formulir_obat;
				} else if (isset($_GET['formulir_pasien'])) {
					require_once $formulir_pasien;
				} else if (isset($_GET['formulir_pendaftaran'])) {
					require_once $formulir_pendaftaran;
				} else if (isset($_GET['formulir_poli'])) {
					require_once $formulir_poli;
				} else if (isset($_GET['formulir_resep'])) {
					require_once $formulir_resep;
				} else if (isset($_GET['informasi_akun'])) {
					require_once $informasi_akun;
				} else if (isset($_GET['informasi_resep'])) {
					require_once $informasi_resep;
				} else if (isset($_GET['tabel_detail'])) {
					require_once $tabel_detail;
				} else if (isset($_GET['tabel_dokter'])) {
					require_once $tabel_dokter;
				} else if (isset($_GET['tabel_login'])) {
					require_once $tabel_login;
				} else if (isset($_GET['tabel_obat'])) {
					require_once $tabel_obat;
				} else if (isset($_GET['tabel_pasien'])) {
					require_once $tabel_pasien;
				} else if (isset($_GET['tabel_pendaftaran'])) {
					require_once $tabel_pendaftaran;
				} else if (isset($_GET['tabel_poli'])) {
					require_once $tabel_poli;
				} else if (isset($_GET['tabel_resep'])) {
					require_once $tabel_resep;
				}
				?>
	

<?php } ?>
 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Polikharis</title>

  <!-- Google Font: Source Sans Pro -->
      <!-- Google Font: Source Sans Pro -->
	  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/AdminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="assets/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/AdminLTE/dist/css/adminlte.min.css">
	<style>
	p {
		color: white;
	}

	.main-sidebar {
  	background-color: #0F37D8 !important;
	}

	.nav-icon {
	color: white !important;
	}


	a {
	color: white !important;
	}
	</style>
</head>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar bg-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <!-- <img src="assets/AdminLTE/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="logoPoli brand-text font-weight-bold text-white ml-3">Polikharis</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="info">
        <a href="#" class="d-block">
            Selamat Datang, <b><?php echo $_SESSION['Nama']; ?>&nbsp;(<?php echo $_SESSION['Level']; ?>)</b>
        </a>
        <!-- Add the logout link with confirmation -->
        <font color="white">
            <a id="logout" href="logout.php" onclick="return confirm('Apakah anda yakin untuk logout, <?php echo $_SESSION['Nama']; ?>?')">Logout</a>
        </font>
    </div>
</div>

	  <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
	<?php if ($_SESSION['Level'] == "Superadmin") { ?>
		<li class="nav-item">
	<a href="halaman_utama.php?home=$home" class="nav-link">
		<i class="nav-icon far fa-image"></i>
		<p>Home</p>
	</a>
	</li>
		<li class="nav-item">
		<a href="halaman_utama.php?tabel_dokter=$tabel_dokter" class="nav-link">
		<i class="nav-icon far fa-image"></i>
		<p>Dokter</p>
		</a>
	</li>
	<?php } ?>

	<li class="nav-item">
	<a href="halaman_utama.php?tabel_poli=$tabel_poli" class="nav-link">
		<i class="nav-icon far fa-image"></i>
		<p>Poli</p>
	</a>
	</li>

	<?php if ($_SESSION['Level'] == "Superadmin") { ?>
	<li class="nav-item">
		<a href="halaman_utama.php?tabel_login=$tabel_login" class="nav-link">
		<i class="nav-icon far fa-image"></i>
		<p>Account</p>
		</a>
	</li>
	<?php } else { ?>
	<li class="nav-item">
		<a href="halaman_utama.php?informasi_akun=$informasi_akun" class="nav-link">
		<i class="nav-icon far fa-image"></i>
		<p>Account</p>
		</a>
	</li>
	<?php } ?>


	 <?php if ($_SESSION['Level'] != "Pasien") { ?>
    <li class="nav-item">
    <a href="halaman_utama.php?tabel_resep=$tabel_resep" class="nav-link">
      <i class="nav-icon far fa-image"></i>
      <p>Resep</p>
    </a>
  </li>
<?php } else { ?>
  <li class="nav-item">
    <a href="halaman_utama.php?informasi_resep=$informasi_resep" class="nav-link">
      <i class="nav-icon far fa-image"></i>
      <p>Resep</p>
    </a>
  </li>
<?php } ?>

<li class="nav-item">
  <a href="halaman_utama.php?tabel_obat=$tabel_obat" class="nav-link">
    <i class="nav-icon far fa-image"></i>
    <p>Obat</p>
  </a>
</li>

<?php if ($_SESSION['Level'] != "Pasien") { ?>
  <li class="nav-item">
    <a href="halaman_utama.php?tabel_pasien=$tabel_pasien" class="nav-link">
      <i class="nav-icon far fa-image"></i>
      <p>Pasien</p>
    </a>
  </li>
<?php } ?>

		<li class="nav-item">
			<?php if ($_SESSION['Level'] == "Superadmin" || $_SESSION['Level'] == "Admin") { ?>
				<a href="halaman_utama.php?tabel_pendaftaran=<?= $tabel_pendaftaran ?>" class="nav-link">
					<i class="nav-icon far fa-image"></i>
					<p>
						Pendaftaran
					</p>
				</a>
			<?php } ?>
		</li>

		<li class="nav-item">
			<?php if ($_SESSION['Level'] != "Pasien") { ?>
			<a href="halaman_utama.php?tabel_detail=$tabel_detail" class="nav-link">
				<i class="nav-icon far fa-image"></i>
				<p>
					Detail
				</p>
        </a>
    	<?php } ?>
		</li>		


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<!-- jQuery -->
<script src="assets/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/AdminLTE/dist/js/adminlte.min.js"></script>

</body>
</html>

<!-- <?php
session_start();
if (empty($_SESSION['Username']) and empty($_SESSION['Password'])) {
	echo "<script type='text/javascript'>
	alert('SILAKAN LOGIN TERLEBIH DAHULU!')
	window.location='index.php';
	</script>";
} else {
?>

	<?php

		$aksi_detail = "code/proses/update-delete/aksi_detail.php";
		$aksi_dokter = "code/proses/update-delete/aksi_dokter.php";
		$aksi_login = "code/proses/update-delete/aksi_login.php";
		$aksi_obat = "code/proses/update-delete/aksi_obat.php";
		$aksi_pasien = "code/proses/update-delete/aksi_pasien.php";
		$aksi_poli = "code/proses/update-delete/aksi_poli.php";
		$aksi_resep = "code/proses/update-delete/aksi_resep.php";
		$home = "home.php";
		$formulir_detail = "code/formulir/formulir_detail.php";
		$formulir_dokter = "code/formulir/formulir_dokter.php";
		$formulir_login = "code/formulir/formulir_login.php";
		$formulir_obat = "code/formulir/formulir_obat.php";
		$formulir_pasien = "code/formulir/formulir_pasien.php";
		$formulir_pendaftaran = "code/formulir/formulir_pendaftaran.php";
		$formulir_poli = "code/formulir/formulir_poli.php";
		$formulir_resep = "code/formulir/formulir_resep.php";
		$informasi_akun = "code/informasi/informasi_akun.php";
		$informasi_resep = "code/informasi/informasi_resep.php";
		$tabel_detail = "code/tabel/tabel_detail.php";
		$tabel_dokter = "code/tabel/tabel_dokter.php";
		$tabel_login = "code/tabel/tabel_login.php";
		$tabel_obat = "code/tabel/tabel_obat.php";
		$tabel_pasien = "code/tabel/tabel_pasien.php";
		$tabel_pendaftaran = "code/tabel/tabel_pendaftaran.php";
		$tabel_poli = "code/tabel/tabel_poli.php";
		$tabel_resep = "code/tabel/tabel_resep.php";

			?>

			<div id="konten">
				<?php
				if (isset($_GET['home'])) {
					require_once $home;
				} else if (isset($_GET['aksi_detail'])) {
					require_once $aksi_detail;
				} else if (isset($_GET['aksi_dokter'])) {
					require_once $aksi_dokter;
				} else if (isset($_GET['aksi_login'])) {
					require_once $aksi_login;
				} else if (isset($_GET['aksi_obat'])) {
					require_once $aksi_obat;
				} else if (isset($_GET['aksi_pasien'])) {
					require_once $aksi_pasien;
				} else if (isset($_GET['aksi_poli'])) {
					require_once $aksi_poli;
				} else if (isset($_GET['aksi_resep'])) {
					require_once $aksi_resep;
				} else if (isset($_GET['formulir_detail'])) {
					require_once $formulir_detail;
				} else if (isset($_GET['formulir_dokter'])) {
					require_once $formulir_dokter;
				} else if (isset($_GET['formulir_login'])) {
					require_once $formulir_login;
				} else if (isset($_GET['formulir_obat'])) {
					require_once $formulir_obat;
				} else if (isset($_GET['formulir_pasien'])) {
					require_once $formulir_pasien;
				} else if (isset($_GET['formulir_pendaftaran'])) {
					require_once $formulir_pendaftaran;
				} else if (isset($_GET['formulir_poli'])) {
					require_once $formulir_poli;
				} else if (isset($_GET['formulir_resep'])) {
					require_once $formulir_resep;
				} else if (isset($_GET['informasi_akun'])) {
					require_once $informasi_akun;
				} else if (isset($_GET['informasi_resep'])) {
					require_once $informasi_resep;
				} else if (isset($_GET['tabel_detail'])) {
					require_once $tabel_detail;
				} else if (isset($_GET['tabel_dokter'])) {
					require_once $tabel_dokter;
				} else if (isset($_GET['tabel_login'])) {
					require_once $tabel_login;
				} else if (isset($_GET['tabel_obat'])) {
					require_once $tabel_obat;
				} else if (isset($_GET['tabel_pasien'])) {
					require_once $tabel_pasien;
				} else if (isset($_GET['tabel_pendaftaran'])) {
					require_once $tabel_pendaftaran;
				} else if (isset($_GET['tabel_poli'])) {
					require_once $tabel_poli;
				} else if (isset($_GET['tabel_resep'])) {
					require_once $tabel_resep;
				}
				?>
	

<?php } ?>
 