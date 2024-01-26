<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Account</title>

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
            <font color="#00b994">ACCOUNT</font>
        </b>
        <br><br>
        <hr class="bg-info" style="height: 2px; width: 100%">
        <br>

        <form action="halaman_utama.php?tabel_login=$tabel_login" method="post">
            <div class="row">
            <div class="col-md-6">
            <a href="halaman_utama.php?formulir_login=<?= $formulir_login ?>" class="btn btn-primary">Tambah</a>
             
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
                    <th class="normal">ID User</th>
                    <th class="normal">Nama</th>
                    <th class="normal">Jenis Kelamin</th>
                    <th class="normal">Alamat</th>
                    <th class="normal">Telepon</th>
                    <th class="normal">Username</th>
                    <th class="normal">Password</th>
                    <th class="normal">Level User</th>
                    <th class="normal">Tools</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "koneksi.php";

                $tampilkan_isi = "select * from useradmin";

                if (isset($_POST['cari']) and $_POST['cari'] <> "") {
                    $key = $_POST['cari'];
                    $tampilkan_isi = "select * from useradmin where Nama LIKE '%$key%' ";
                    echo "<font size='3' face='Calibri'>Pencarian data account dengan kata '$key'</font>";
                } else if (isset($_POST['cari']) and $_POST['cari'] == "") {
                    $tampilkan_isi = "select * from useradmin";
                }

                $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

                while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
                    $IdUser = $isi['IdUser'];
                    $Nama = $isi['Nama'];
                    $JenisKelamin = $isi['JenisKelamin'];
                    $Alamat = $isi['Alamat'];
                    $NoTelp = $isi['NoTelp'];
                    $Username = $isi['Username'];
                    $Password = $isi['Password'];
                    $Level = $isi['Level'];
                ?>
                    <tr class="isi" align='left'>
                        <td><?php echo $IdUser ?></td>
                        <td><?php echo $Nama ?></td>
                        <td><?php echo ($JenisKelamin == "L") ? "Laki-Laki" : "Perempuan"; ?></td>
                        <td><?php echo $Alamat ?></td>
                        <td><?php echo $NoTelp ?></td>
                        <td><?php echo $Username ?></td>
                        <td><?php echo $Password ?></td>
                        <td><?php echo $Level ?></td>
                        <td>
                            <div class="btn-group" role="group">
                                <form action="halaman_utama.php?aksi_login=$aksi_login" method="post">
                                    <input type="hidden" name="IdUser" value="<?php echo $IdUser; ?>">
                                    <button class="btn btn-warning" name="proses" type="submit">Update</button>
                                </form>
                                <p>&ensp;</p>
                                <form action="halaman_utama.php?aksi_login=$aksi_login" method="post" onsubmit="return confirm('Apakah Anda ingin menghapus data account <?php echo $Nama; ?> ?')">
                                    <input type="hidden" name="IdUser" value="<?php echo $IdUser; ?>">
                                    <button class="btn btn-danger" name="proses" type="submit">Delete</button>
                                </form>
                            </div>
                        </td>
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
