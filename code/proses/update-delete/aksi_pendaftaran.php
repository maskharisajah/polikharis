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
<body>
<?php
include "koneksi.php";
$NoDaftar = $_POST['NoDaftar'];

$delete_pendaftaran = "DELETE from pendaftaran where NoDaftar='$NoDaftar'";

	$delete_pendaftaran_query = mysqli_query($connect,$delete_pendaftaran);

	if ($delete_pendaftaran_query)
	{
		header("location:halaman_utama.php?tabel_pendaftaran=$tabel_pendaftaran");
	}
	else
	{
		echo "Delete gagal dijalankan";
	}
?>

<script src="assets/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
</body>
</html>