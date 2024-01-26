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
    <font color="#00b994">POLI</font>
  </b>
  <br><br>
  <hr class="bg-info" style="height: 2px; width: 100%">
  <br>

  <form action="halaman_utama.php?tabel_poli=$tabel_poli" method="post">
    <div class="row">
      <div class="col-md-6">
        <?php
        if ($_SESSION['Level'] == "Superadmin" or $_SESSION['Level'] == "Admin") {
        ?>
          <a href="halaman_utama.php?formulir_poli=$formulir_poli" class="btn btn-primary">Tambah</a>
        <?php } ?>
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
        <th class="normal">Kode Poli</th>
        <th class="normal">Nama Poli</th>
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

      $tampilkan_isi = "select * from poli";

      if (isset($_POST['cari']) and $_POST['cari'] <> "") {
        $key = $_POST['cari'];
        $tampilkan_isi = "select * from poli where KodePoli LIKE '%$key%' or NamaPoli LIKE '%$key%'";
        echo "<font size='3' face='Calibri'>Pencarian data poli dengan kata '$key'</font>";
      } else if (isset($_POST['cari']) and $_POST['cari'] == "") {
        $tampilkan_isi = "select * from poli";
      }

      $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

      while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
        $KodePoli = $isi['KodePoli'];
        $NamaPoli = $isi['NamaPoli'];
      ?>
        <tr class="isi" align='left'>
          <td><?php echo $KodePoli ?></td>
          <td><?php echo $NamaPoli ?></td>
          <?php
          if ($_SESSION['Level'] == "Superadmin" or $_SESSION['Level'] == "Admin") {
          ?>
            <td>
              <form action="halaman_utama.php?aksi_poli=$aksi_poli" method="post">
                <input type="hidden" name="KodePoli" value="<?php echo $KodePoli; ?>">
                <input class="btn btn-warning" name="proses" type="submit" value="Update">
                <input class="btn btn-danger" name="proses" type="submit" value="Delete" onClick="return confirm('Apakah Anda ingin menghapus data poli <?php echo $NamaPoli; ?> ?')">
              </form>
            </td>
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
</div>

</body>

</html>