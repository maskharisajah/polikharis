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
</head>
<body>

<div class="container mt-4">
  <div class="card">
    <div class="card-header">
      <h2 class="text-center">Tambah Data Detail</h2>
    </div>
    <div class="card-body">
      <form action="code/proses/input/input_detail.php" method="POST">

        <div class="form-group">
          <label for="NomorResep"><b>Nomor Resep</b></label>
          <select class="form-control" name="NomorResep" required>
            <option value="" disabled selected>Pilih Nomor Resep</option>

            <?php
            include "koneksi.php";
            $tampilkan_isi = "SELECT r.NomorResep, p.WaktuDaftar, pa.NamaPasien, d.NamaDokter, d.Tarif
              FROM resep r, pendaftaran p, pasien pa, dokter d
              WHERE p.KodePasien = pa.KodePasien AND p.KodeDokter = d.KodeDokter AND r.NoDaftar = p.NoDaftar;";
            $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

            while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
              $NomorResep = $isi['NomorResep'];
              $WaktuDaftar = $isi['WaktuDaftar'];
              $NamaPasien = $isi['NamaPasien'];
              $NamaDokter = $isi['NamaDokter'];
              $Tarif = $isi['Tarif'];
            ?>
              <option value="<?php echo $NomorResep ?>">
                (<?php echo $NomorResep ?>) | <?php echo $WaktuDaftar ?> | <?php echo $NamaPasien ?>&nbsp;(PASIEN) - <?php echo $NamaDokter ?>
              </option>
            <?php
            }
            ?>
          </select>
        </div>

        <div class="form-group">
          <label for="KodeObat"><b>Obat</b></label>
          <select class="form-control" name="KodeObat" required>
            <option value="" disabled selected>Kode Obat</option>
            <?php
            include "koneksi.php";
            $tampilkan_isi2 = "SELECT * FROM `obat`";
            $tampilkan_isi_sql2 = mysqli_query($connect, $tampilkan_isi2);

            while ($isi2 = mysqli_fetch_array($tampilkan_isi_sql2)) {
              $KodeObat = $isi2['KodeObat'];
              $NamaObat = $isi2['NamaObat'];
              $HargaObat = $isi2['HargaObat'];
            ?>
              <option value="<?php echo $KodeObat ?>">
                <?php echo $KodeObat ?> | <?php echo $NamaObat ?> ( Rp.<?php echo $HargaObat ?> )
              </option>
            <?php
            }
            ?>
          </select>
        </div>

        <div class="form-group">
          <label for="Dosis"><b>Dosis</b></label>
          <input type="text" class="form-control" name="Dosis" maxlength="20" placeholder="Ketikkan dosis.." required>
        </div>

        <div class="form-group">
          <label for="Jumlah"><b>Jumlah Obat</b></label>
          <input type="text" class="form-control" name="Jumlah" maxlength="6" placeholder="Ketikkan jumlah.." required>
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
