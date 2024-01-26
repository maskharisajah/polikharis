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
      <h2 class="text-center">Tambah Data Resep</h2>
    </div>
    <div class="card-body">
      <form action="code/proses/input/input_resep.php" method="POST">
        <div class="form-group">
          <label for="NomorResep"><b>Nomor Resep</b></label>
          <?php
          include "koneksi.php";
          $tampilkan_isi = "select count(NomorResep) as jumlah from resep;";
          $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);
          $no = 1;

          while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
            $jumlah = $isi['jumlah'];
          ?>
            <input type="text" name='NomorResep' class="form-control" style="background-color:#E0DFDF" value="<?php echo $no + $jumlah ?>" readonly>
          <?php
          } ?>
        </div>

        <div class="form-group">
          <label for="NoDaftar"><b>No.Daftar</b></label>
          <select name="NoDaftar" class="form-control" required>
            <option value="">Pilih Pendaftaran</option>
            <?php
            include "koneksi.php";
            $tampilkan_isi = "select p.NoDaftar,p.WaktuDaftar,pa.NamaPasien,d.NamaDokter from resep r
                      right outer join pendaftaran p
                      ON r.NoDaftar=p.NoDaftar
                      right outer join pasien pa
                      ON p.KodePasien=pa.KodePasien
                      right outer join dokter d
                      ON p.KodeDokter=d.KodeDokter
                      where r.NomorResep is NULL and p.WaktuDaftar is NOT NULL;";
            $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

            while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
              $NoDaftar = $isi['NoDaftar'];
              $WaktuDaftar = $isi['WaktuDaftar'];
              $NamaPasien = $isi['NamaPasien'];
              $NamaDokter = $isi['NamaDokter'];
            ?>
              <option value="<?php echo $NoDaftar ?>">
                <?php echo $NoDaftar ?> | <?php echo $WaktuDaftar ?> | <?php echo $NamaPasien ?> (PASIEN) - <?php echo $NamaDokter ?> (DOKTER) 
              </option>
              <?php
            }
              ?>        
          </select>
        </div>

        <div class="form-group">
          <label for="TanggalTebus"><b>Tanggal Tebus</b></label>
          <input type="date" name="TanggalTebus" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="TotalHarga"><b>Total Harga</b></label>
          <input type="text" name="TotalHarga" class="form-control" size="25px" maxlength="10" placeholder="ketikkan total harga.." required>
        </div>

        <div class="form-group">
          <label for="Bayar"><b>Bayar</b></label>
          <input type="text" name="Bayar" class="form-control" size="25px" maxlength="10" placeholder="ketikkan total pembayaran.." required>
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