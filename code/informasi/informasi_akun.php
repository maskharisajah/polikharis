<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dokter</title>

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

    <?php
    include "koneksi.php";

    $informasi = $_SESSION['IdUser'];

    $tampilkan_isi = "select * from useradmin where IdUser='$informasi'  ";

    $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

    while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
        $IdUser = $isi['IdUser'];
        $Nama = $isi['Nama'];
        $JenisKelamin = $isi['JenisKelamin'];
        $Alamat = $isi['Alamat'];
        $NoTelp = $isi['NoTelp'];
        $Username = $isi['Username'];
        $Password = $isi['Password'];
    ?>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h2 class="text-center">Informasi Akun</h2>
                    <hr>
                    <table class="table table-bordered">
                        <tr>
                            <td><b>ID USER</b></td>
                            <td><?php echo $IdUser ?></td>
                        </tr>
                        <tr>
                            <td><b>NAMA</b></td>
                            <td><?php echo $Nama ?></td>
                        </tr>
                        <tr>
                            <td><b>JENIS KELAMIN</b></td>
                            <td><?php echo $JenisKelamin ?></td>
                        </tr>
                        <tr>
                            <td><b>ALAMAT</b></td>
                            <td><?php echo $Alamat ?></td>
                        </tr>
                        <tr>
                            <td><b>NO.TELP</b></td>
                            <td><?php echo $NoTelp ?></td>
                        </tr>
                        <tr>
                            <td><b>USERNAME</b></td>
                            <td><?php echo $Username ?></td>
                        </tr>
                        <tr>
                            <td><b>PASSWORD</b></td>
                            <td><?php echo $Password ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <form action="halaman_utama.php?aksi_login=$aksi_login" method="post">
                                    <input type="hidden" name="IdUser" value="<?php echo $IdUser; ?>">
                                    <input class="btn btn-primary" name="proses" type="submit" value="Update">
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

    <script src="assets/AdminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
</body>

</html>
