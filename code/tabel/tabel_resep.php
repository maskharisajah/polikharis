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
<div class="container">

  <b>
    <font color="#00b994">RESEP</font>
  </b>
  <br><br>
  <hr class="bg-info" style="height: 2px; width: 100%">
  <br>

  <form action="halaman_utama.php?tabel_resep=$tabel_resep" method="post">
    <div class="row">
      <div class="col-md-6">
      <div class=" text-left">
        <a href="halaman_utama.php?formulir_resep=$formulir_resep" class="btn btn-primary">Tambah</a>
      </div>
      </div>
      <div class="col-md-6 text-right">
        <label for="cari" class="h5">Search :</label>
        <input type="search" name="cari" class="form-control" style="width: 200px; display: inline-block;">
      </div>
    </div>
  </form>

  <br>

  <table id="daftar-table" class="table table-bordered table-striped">
    <thead class="thead-dark">
      <tr align='center'>
        <th class="normal">No.Resep</th>
        <th class="normal">Tanggal/Waktu Pendaftaran</th>
        <th class="normal">Pasien</th>
        <th class="normal">Dokter</th>
        <th class="normal">Tanggal Tebus</th>
        <th class="normal">Total Harga</th>
        <th class="normal">Pembayaran</th>
        <th class="normal">Kembali</th>
        <?php
        if ($_SESSION['Level'] == "Superadmin" or $_SESSION['Level'] == "Admin") {
        ?>
          <th class="normal">Tools</th>
        <?php } ?>
      </tr>
    </thead>
    <tbody>
      <?php
      include "koneksi.php";

      $tampilkan_isi = "select r.NomorResep,p.WaktuDaftar,pa.NamaPasien,d.NamaDokter,r.TanggalTebus,r.TotalHarga,r.Bayar,r.Kembali
        from resep r,pendaftaran p,pasien pa,dokter d
        where p.KodePasien=pa.KodePasien and p.KodeDokter=d.KodeDokter and r.NoDaftar=p.NoDaftar;";

      if (isset($_POST['cari']) and $_POST['cari'] <> "") {
        $key = $_POST['cari'];
        $tampilkan_isi = "select r.NomorResep,p.WaktuDaftar,pa.NamaPasien,d.NamaDokter,r.TanggalTebus,r.TotalHarga,r.Bayar,r.Kembali
        from resep r,pendaftaran p,pasien pa,dokter d
        where p.KodePasien=pa.KodePasien and p.KodeDokter=d.KodeDokter and r.NoDaftar=p.NoDaftar AND r.NomorResep LIKE '%$key%' ";
        echo "<font size='3' face='Calibri'>Pencarian data resep dengan nomor '$key'</font>";
      } else if (isset($_POST['cari']) and $_POST['cari'] == "") {
        $tampilkan_isi = "select r.NomorResep,p.WaktuDaftar,pa.NamaPasien,d.NamaDokter,r.TanggalTebus,r.TotalHarga,r.Bayar,r.Kembali
        from resep r,pendaftaran p,pasien pa,dokter d
        where p.KodePasien=pa.KodePasien and p.KodeDokter=d.KodeDokter and r.NoDaftar=p.NoDaftar;";
      }

      $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

      while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
        $NomorResep = $isi['NomorResep'];
        $WaktuDaftar = $isi['WaktuDaftar'];
        $NamaPasien = $isi['NamaPasien'];
        $NamaDokter = $isi['NamaDokter'];
        $TanggalTebus = $isi['TanggalTebus'];
        $TotalHarga = $isi['TotalHarga'];
        $Bayar = $isi['Bayar'];
        $Kembali = $isi['Kembali'];
      ?>
        <tr class="isi" align='left'>
          <td><?php echo $NomorResep ?></td>
          <td><?php echo $WaktuDaftar ?></td>
          <td><?php echo $NamaPasien ?></td>
          <td><?php echo $NamaDokter ?></td>
          <td><?php echo $TanggalTebus ?></td>
          <td>Rp.<b><?php echo $TotalHarga ?></b></td>
          <td>Rp.<b><?php echo $Bayar ?></b></td>
          <td>Rp.<b><?php echo $Kembali ?></b></td>
          <?php
          if ($_SESSION['Level'] != "Pasien") {
          ?>
            <?php
            if ($_SESSION['Level'] == "Superadmin" or $_SESSION['Level'] == "Admin") {
            ?>
              <td>
                <div class="btn-group" role="group">
                  <form action="halaman_utama.php?aksi_resep=$aksi_resep" method="post">
                    <input type="hidden" name="NomorResep" value="<?php echo $NomorResep; ?>">
                    <button class="btn btn-warning" name="proses" type="submit">Update</button>
                  </form>
                  <p>&ensp;</p>
                
                  <form action="halaman_utama.php?aksi_=$aksi_resep" method="post" onsubmit="return confirm('Apakah Anda ingin menghapus data resep bernama <?php echo $NamaPasien; ?> ?')">
                    <input type="hidden" name="NomorResep" value="<?php echo $NomorResep; ?>">
                    <button class="btn btn-danger" name="proses" type="submit">Delete</button>
                  </form>
                </div>
              </td>
            <?php } ?>
          <?php } ?>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</div>

<script src="assets/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
</body>
</html>
