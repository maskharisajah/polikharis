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
      <h2 class="text-center">Tambah Data User</h2>
    </div>
    <div class="card-body">
      <form action="code/proses/input/input_login.php" method="POST">

        <div class="form-group">
          <label for="IdUser"><b>ID User</b></label>
          <?php
          include "koneksi.php";
          $tampilkan_isi = "SELECT COUNT(IdUser) AS jumlah FROM useradmin;";
          $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);
          $no = 1;

          while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
            $jumlah = $isi['jumlah'];
          ?>
            <input type="text" name='IdUser' class="form-control" style="background-color:#E0DFDF" value="ID-<?php echo $no + $jumlah ?>" readonly>
          <?php
          } ?>
        </div>

        <div class="form-group">
          <label for="Nama"><b>Nama Lengkap</b></label>
          <input type="text" name="Nama" class="form-control" maxlength="30" placeholder="Ketikkan nama.." required>
        </div>

        <div class="form-group">
          <label><b>Jenis Kelamin</b></label><br>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="JenisKelamin" value="P" required>
            <label class="form-check-label">Perempuan</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="JenisKelamin" value="L">
            <label class="form-check-label">Laki-Laki</label>
          </div>
        </div>

        <div class="form-group">
          <label for="Alamat"><b>Alamat</b></label>
          <textarea name="Alamat" class="form-control" cols="28" rows="5" maxlength="50" placeholder="Ketikkan alamat pasien.." required></textarea>
        </div>

        <div class="form-group">
          <label for="NoTelp"><b>Telepon</b></label>
          <input type="text" name="NoTelp" class="form-control" maxlength="13" placeholder="Ketikkan nomor telepon.." required>
        </div>

        <div class="form-group">
          <label for="Username"><b>Username</b></label>
          <input type="text" name="Username" class="form-control" maxlength="20" placeholder="Ketikkan username.." required>
        </div>

        <div class="form-group">
          <label for="Password"><b>Password</b></label>
          <input type="password" name="Password" class="form-control" maxlength="20" placeholder="Ketikkan password.." required>
        </div>

        <div class="form-group">
          <label for="Level"><b>Level User</b></label>
          <select name="Level" class="form-control" required>
            <option value="" disabled selected>Pilih Level User</option>
            <option value="Superadmin">Super Admin</option>
            <option value="Admin">Admin</option>
            <option value="Dokter">Dokter</option>
            <option value="Pasien">Pasien</option>
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
