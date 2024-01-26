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
      <h2 class="text-center">Tambah Data Pasien</h2>
    </div>
    <div class="card-body">
      <form action="code/proses/input/input_pasien.php" method="POST">

        <div class="form-group">
          <label for="KodePasien"><b>Kode Pasien</b></label>
          <?php
          include "koneksi.php";
          $tampilkan_isi = "SELECT COUNT(KodePasien) AS jumlah FROM pasien;";
          $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);
          $no = 1;

          while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
            $jumlah = $isi['jumlah'];
          ?>
            <input type="text" name='KodePasien' class="form-control" style="background-color:#E0DFDF" value="<?php echo $no + $jumlah ?>" readonly>
          <?php
          } ?>
        </div>

        <div class="form-group">
          <label for="NamaPasien"><b>Nama Pasien</b></label>
          <input type="text" name="NamaPasien" class="form-control" maxlength="40" placeholder="Ketikkan nama pasien.." required>
        </div>

        <div class="form-group">
          <label for="AlamatPasien"><b>Alamat</b></label>
          <textarea name="AlamatPasien" class="form-control" cols="28" rows="5" maxlength="50" placeholder="Ketikkan alamat pasien.." required></textarea>
        </div>

        <div class="form-group">
          <label for="GenderPasien"><b>Jenis Kelamin</b></label>
          <div>
            <input type="radio" name="GenderPasien" value="P" required>&nbsp;Perempuan&nbsp;&nbsp;
            <input type="radio" name="GenderPasien" value="L">&nbsp;Laki-Laki
          </div>
        </div>

        <div class="form-group">
          <label for="UmurPasien"><b>Umur</b></label>
          <input type="text" name="UmurPasien" class="form-control" maxlength="4" placeholder="Ketikkan umur.." required>
        </div>

        <div class="form-group">
          <label for="TeleponPasien"><b>Telepon</b></label>
          <input type="text" name="TeleponPasien" class="form-control" maxlength="13" placeholder="Ketikkan nomor telepon.." required>
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
