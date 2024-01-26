<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Starter</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/AdminLTE/dist/css/adminlte.min.css">
  <!-- Additional styling -->
</head>
<body>

<div class="container">
  <div class="card">
    <div class="card-header">
      <h2 class="text-center">Tambah Data Pendaftaran</h2>
    </div>
    <div class="card-body">
      <form action="code/proses/input/input_pendaftaran.php" method="POST">

        <div class="form-group">
          <label for="NoDaftar"><b>No.Pendaftaran</b></label>
          <?php
          include "koneksi.php";
          $tampilkan_isi = "select count(NoDaftar) as jumlah from pendaftaran;";
          $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);
          $no = 1;

          while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
            $jumlah = $isi['jumlah'];
          ?>
            <input type="text" name='NoDaftar' class="form-control" style="background-color:#E0DFDF" value="<?php echo $no + $jumlah ?>" readonly>
          <?php
          } ?>
        </div>

        <div class="form-group">
          <label for="KodePasien"><b>Pasien</b></label>
          <select name="KodePasien" class="form-control" required>
            <option value="" disabled selected>Pilih Pasien</option>
            <?php
            include "koneksi.php";
            $tampilkan_isi = "select * from `pasien`";
            $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

            while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
              $KodePasien = $isi['KodePasien'];
              $NamaPasien = $isi['NamaPasien'];
            ?>
              <option value="<?php echo $KodePasien ?>"><?php echo $KodePasien ?> | <?php echo $NamaPasien ?></option>
            <?php
            }
            ?>
          </select>
        </div>

        <div class="form-group">
          <label for="KodeDokter"><b>Dokter</b></label>
          <select name="KodeDokter" class="form-control" required>
            <option value="" disabled selected>Pilih Dokter</option>
            <?php
            include "koneksi.php";
            $tampilkan_isi = "select * from `dokter`";
            $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

            while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
              $KodeDokter = $isi['KodeDokter'];
              $NamaDokter = $isi['NamaDokter'];
            ?>
              <option value="<?php echo $KodeDokter ?>"><?php echo $KodeDokter ?> | <?php echo $NamaDokter ?></option>
            <?php
            }
            ?>
          </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
    </div>
  </div>
</div>

<script src="assets/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/AdminLTE/dist/js/adminlte.min.js"></script>
</body>
</html>
