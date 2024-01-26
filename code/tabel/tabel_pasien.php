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
<form action="halaman_utama.php?tabel_pasien=$tabel_pasien" method="post">
    <div class="row">
      <div class="col-md-6">
        <a href="halaman_utama.php?formulir_pasien=$formulir_pasien" class="btn btn-primary">Tambah</a>
      
      </div>
      <div class="col-md-6 text-right">
        <label for="cari" class="h5">Search :</label>
        <input type="search" name="cari" class="form-control" style="width: 200px; display: inline-block;">
      </div>
    </div>
    <div class="row mt-2">
      <div class="col-md-12 text-right">
        <p class="h6"><u>Harap gunakan <b>Nama Pasien</b> dalam pencarian Pasien</u>!</p>
      </div>
    </div>
  </form>

  <br>

  <table id="daftar-table" class="table table-bordered table-striped">
    <thead class="thead-dark">
      <tr align='center'>
        <th class="normal">Kode Pasien</th>
        <th class="normal">Nama</th>
        <th class="normal">Alamat</th>
        <th class="normal">Jenis Kelamin</th>
        <th class="normal">Umur</th>
        <th class="normal">Telepon</th>
        <th class="normal">Tools</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include "koneksi.php";

      $tampilkan_isi = "select * from pasien";

      if (isset($_POST['cari']) and $_POST['cari'] <> "") {
        $key = $_POST['cari'];
        $tampilkan_isi = "select * from pasien where NamaPasien LIKE '%$key%' ";
        echo "<font size='3' face='Calibri'>Pencarian data pasien dengan kata '$key'</font>";
      } else if (isset($_POST['cari']) and $_POST['cari'] == "") {
        $tampilkan_isi = "select * from pasien";
      }

      $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

      while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
        $KodePasien = $isi['KodePasien'];
        $NamaPasien = $isi['NamaPasien'];
        $AlamatPasien = $isi['AlamatPasien'];
        $GenderPasien = $isi['GenderPasien'];
        $UmurPasien = $isi['UmurPasien'];
        $TeleponPasien = $isi['TeleponPasien'];
      ?>
        <tr class="isi" align='left'>
          <td><?php echo $KodePasien ?></td>
          <td><?php echo $NamaPasien ?></td>
          <td><?php echo $AlamatPasien ?></td>
          <td><?php echo ($GenderPasien == "L") ? "Laki-Laki" : "Perempuan"; ?></td>
          <td><?php echo $UmurPasien ?></td>
          <td><?php echo $TeleponPasien ?></td>
          <td>
            <form action="halaman_utama.php?aksi_pasien=$aksi_pasien" method="post">
              <input type="hidden" name="KodePasien" value="<?php echo $KodePasien; ?>">
              <input class="btn btn-warning" name="proses" type="submit" value="Update">
              <input class="btn btn-danger" name="proses" type="submit" value="Delete" onClick="return confirm('Apakah Anda ingin menghapus data pasien bernama <?php echo $NamaPasien; ?> ?')">
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


