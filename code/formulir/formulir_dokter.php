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
      <h2 class="text-center">Tambah Data Dokter</h2>
    </div>
    <div class="card-body">
      <form action="code/proses/input/input_dokter.php" method="POST">

        <div class="form-group">
          <label for="KodeDokter"><b>Kode Dokter</b></label>
          <?php
          include "koneksi.php";
          $tampilkan_isi = "SELECT COUNT(KodeDokter) AS jumlah FROM dokter;";
          $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);
          $no = 1;

          while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
            $jumlah = $isi['jumlah'];
          ?>
            <input type="text" name='KodeDokter' class="form-control" style="background-color:#E0DFDF" value="DO-<?php echo $no + $jumlah ?>" readonly>
          <?php
          } ?>
        </div>

        <div class="form-group">
          <label for="NamaDokter"><b>Nama Dokter</b></label>
          <input type="text" name="NamaDokter" class="form-control" maxlength="40" placeholder="Ketikkan nama dokter.." required>
        </div>

        <div class="form-group">
          <label for="Spesialis"><b>Spesialis</b></label>
          <input type="text" name="Spesialis" class="form-control" maxlength="30" placeholder="Ketikkan spesialis.." required>
        </div>

        <div class="form-group">
          <label for="KodePoli"><b>Poli</b></label>
          <select name="KodePoli" class="form-control" required>
            <option value="" disabled selected>Pilih Poliklinik</option>
            <?php
            include "koneksi.php";
            $tampilkan_isi = "SELECT * FROM `poli`";
            $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

            while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
              $KodePoli = $isi['KodePoli'];
              $NamaPoli = $isi['NamaPoli'];
            ?>
              <option value="<?php echo $KodePoli ?>"><?php echo $KodePoli ?> | <?php echo $NamaPoli ?></option>
            <?php
            }
            ?>
          </select>
        </div>

        <div class="form-group">
          <label for="AlamatDokter"><b>Alamat</b></label>
          <textarea name="AlamatDokter" class="form-control" cols="28" rows="5" maxlength="50" placeholder="Ketikkan alamat dokter.." required></textarea>
        </div>

        <div class="form-group">
          <label for="TeleponDokter"><b>Telepon</b></label>
          <input type="text" name="TeleponDokter" class="form-control" maxlength="13" placeholder="Ketikkan nomor telepon.." required>
        </div>

        <div class="form-group">
          <label for="Tarif"><b>Tarif</b></label>
          <input type="text" name="Tarif" class="form-control" maxlength="10" placeholder="Ketikkan tarif.." required>
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
