<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/AdminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="assets/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/AdminLTE/dist/css/adminlte.min.css">
</head>
<body class="">
<div class="container text-left">
      
<b>
  <font color="#00b994">PENDAFTARAN</font>
</b>
<br><br>
<hr class="bg-info" style="height: 2px; width: 100%">
<br>

<form action="halaman_utama.php?tabel_pendaftaran=$tabel_pendaftaran" method="post">
  <div class="row">
    <div class="col-md-6">
      <a href="halaman_utama.php?formulir_pendaftaran=$formulir_pendaftaran" class="btn btn-primary">Tambah</a>
    
    </div>
    <div class="col-md-6 text-right">
      <label for="cari" class="h5">Search :</label>
      <input type="search" name="cari" class="form-control" style="width: 200px; display: inline-block;">
    </div>
  </div>
  <div class="row mt-2">
    <div class="col-md-12 text-right">
      <p class="h6"><u>Harap gunakan <b>Nomor Pendaftaran</b> dalam pencarian Pendaftaran</u>!</p>
    </div>
  </div>
</form>

<br>

<table id="daftar-table" class="table table-bordered table-striped">
  <thead class="thead-dark">
    <tr align='center'>
      <th class="normal">No.Daftar</th>
      <th class="normal">Waktu Daftar</th>
      <th class="normal">Pasien</th>
      <th class="normal">Dokter</th>
      <th class="normal">Tools</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include "koneksi.php";

    // ... (Bagian PHP Anda tetap sama)
	$tampilkan_isi = "select pd.NoDaftar,pd.WaktuDaftar,p.NamaPasien,d.NamaDokter from pendaftaran pd,pasien p,dokter d where p.KodePasien=pd.KodePasien and pd.KodeDokter=d.KodeDokter order by pd.NoDaftar";

	if (isset($_POST['cari']) and $_POST['cari'] <> "") {
		$key = $_POST['cari'];
		$tampilkan_isi = "select pd.NoDaftar,pd.WaktuDaftar,p.NamaPasien,d.NamaDokter from pendaftaran pd,pasien p,dokter d where p.KodePasien=pd.KodePasien and pd.KodeDokter=d.KodeDokter AND pd.NoDaftar LIKE '%$key%' order by pd.NoDaftar ";

		echo "<font size='3' face='Calibri'>Pencarian data pendaftaran dengan nomor '$key'</font>";
	} else if (isset($_POST['cari']) and $_POST['cari'] == "") {
		$tampilkan_isi = "select pd.NoDaftar,pd.WaktuDaftar,p.NamaPasien,d.NamaDokter from pendaftaran pd,pasien p,dokter d where p.KodePasien=pd.KodePasien and pd.KodeDokter=d.KodeDokter order by pd.NoDaftar";
	}

	$tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

    while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
      $NoDaftar = $isi['NoDaftar'];
      $WaktuDaftar = $isi['WaktuDaftar'];
      $NamaPasien = $isi['NamaPasien'];
      $NamaDokter = $isi['NamaDokter'];

    ?>
      <tr class="isi" align='left'>
        <td><?php echo $NoDaftar ?></td>
        <td><?php echo $WaktuDaftar ?></td>
        <td><?php echo $NamaPasien ?></td>
        <td><?php echo $NamaDokter ?></td>
        <td>
          <form action="aksi_pendaftaran.php" method="post">
            <input type="hidden" name="NoDaftar" value="<?php echo $NoDaftar; ?>">
            <input class="btn btn-danger" name="proses" type="submit" value="Delete" onClick="return confirm('Apakah Anda ingin menghapus data pendaftaran bernama <?php echo $NamaPasien; ?> ?')">
          </form>
        </td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>


<!-- jQuery -->
<script src="assets/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
</div>

</body>

</html>


