<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Update Resep</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/AdminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/AdminLTE/dist/css/adminlte.min.css">
</head>

<body>
    <?php
    include "koneksi.php";
    $aksi = strtolower($_POST['proses']);
    $NomorResep = $_POST['NomorResep'];

    if ($aksi == "delete") {
        $delete_resep = "DELETE FROM resep WHERE NomorResep='$NomorResep'";
        $delete_resep_query = mysqli_query($connect, $delete_resep);

        if ($delete_resep_query) {
            header("location:halaman_utama.php?tabel_resep=$tabel_resep");
        } else {
            echo "Delete gagal dijalankan";
        }
    } else {

        include "koneksi.php";

        $query = mysqli_query($connect, "SELECT r.NomorResep, p.WaktuDaftar, r.NoDaftar, pa.NamaPasien, d.NamaDokter, r.TanggalTebus, r.TotalHarga, r.Bayar, r.Kembali
            FROM resep r, pendaftaran p, pasien pa, dokter d
            WHERE p.KodePasien = pa.KodePasien AND p.KodeDokter = d.KodeDokter AND r.NoDaftar = p.NoDaftar AND r.NomorResep='$NomorResep'");
    ?>

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h2 class="text-center">Update Data Resep</h2>
                    <hr>

                    <form action="code/proses/update-delete/update/update_resep.php" method="POST">
                        <?php while ($isi = mysqli_fetch_array($query)) { ?>
                            <div class="form-group">
                                <label for="NomorResep"><b>Nomor Resep</b></label>
                                <input type="text" class="form-control" name='NomorResep' value="<?php echo $NomorResep; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="NoDaftar"><b>No.Daftar</b></label>
                                <input type="text" class="form-control" name="NoDaftar" value="(<?php echo $isi['NoDaftar'] ?>) <?php echo $isi['WaktuDaftar'] ?> | <?php echo $isi['NamaPasien'] ?> (PASIEN) - <?php echo $isi['NamaDokter'] ?> (DOKTER)" readonly>
                            </div>
                            <div class="form-group">
                                <label for="TanggalTebus"><b>Tanggal Tebus</b></label>
                                <input type="date" class="form-control" name="TanggalTebus" value="<?php echo $isi['TanggalTebus'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="TotalHarga"><b>Total Harga</b></label>
                                <input type="text" class="form-control" name='TotalHarga' value="<?php echo $isi['TotalHarga']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="Bayar"><b>Bayar</b></label>
                                <input type="text" class="form-control" name='Bayar' value="<?php echo $isi['Bayar']; ?>">
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" class="btn btn-primary" value="Update">
                            </div>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>

    <?php } ?>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-1BmBEEBASy2ZBbL5IqExEKLi9q6JfoJnRMJh4At2aIt+ibwAqYZFcsa5DJDoW1Fz" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+Wy9aAV1bSkjqC6RS5EaF9hq8E1dGW4Jc+"
        crossorigin="anonymous"></script>

    <!-- AdminLTE App -->
    <script src="assets/AdminLTE/plugins/jquery/jquery.min.js"></script>
    <script src="assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/AdminLTE/dist/js/adminlte.min.js"></script>
</body>
</html>
