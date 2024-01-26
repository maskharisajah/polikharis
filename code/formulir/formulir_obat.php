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
      <h2 class="text-center">Tambah Data Obat</h2>
    </div>
    <div class="card-body">
      <form action="code/proses/input/input_obat.php" method="POST">

        <div class="form-group">
          <label for="KodeObat"><b>Kode Obat</b></label>
          <?php
          include "koneksi.php";
          $tampilkan_isi = "SELECT COUNT(KodeObat) AS jumlah FROM obat;";
          $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);
          $no = 1;

          while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
            $jumlah = $isi['jumlah'];
          ?>
            <input type="text" name='KodeObat' class="form-control" style="background-color:#E0DFDF" value="O-<?php echo $no + $jumlah ?>" readonly>
          <?php
          } ?>
        </div>

        <div class="form-group">
          <label for="NamaObat"><b>Nama Obat</b></label>
          <input type="text" name="NamaObat" class="form-control" maxlength="40" placeholder="Ketikkan nama obat.." required>
        </div>

        <div class="form-group">
          <label for="JenisObat"><b>Jenis Obat</b></label>
          <input type="text" name="JenisObat" class="form-control" maxlength="30" placeholder="Ketikkan jenis obat.." required>
        </div>

        <div class="form-group">
          <label for="Kategori"><b>Kategori Obat</b></label>
          <select name="Kategori" class="form-control" required>
            <option value="" disabled selected>Pilih Kategori</option>
            <option value="Bebas">Bebas</option>
            <option value="Keras">Keras</option>
            <option value="Psikotropika">Psikotropika</option>
          </select>
        </div>

        <div class="form-group">
          <label for="HargaObat"><b>Harga Obat</b></label>
          <input type="text" name="HargaObat" class="form-control" maxlength="10" placeholder="Ketikkan harga obat.." required>
        </div>

        <div class="form-group">
          <label for="StokObat"><b>Stok</b></label>
          <input type="text" name="StokObat" class="form-control" maxlength="7" placeholder="Ketikkan stok obat saat ini.." required>
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
