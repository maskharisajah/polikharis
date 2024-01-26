<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Update Poli</title>

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
    $KodePoli = $_POST['KodePoli'];

    if ($aksi == "delete") {
        $delete_poli = "DELETE FROM poli WHERE KodePoli='$KodePoli'";
        $delete_poli_query = mysqli_query($connect, $delete_poli);

        if ($delete_poli_query) {
            header("location:halaman_utama.php?tabel_poli=$tabel_poli");
        } else {
            echo "Delete gagal dijalankan";
        }
    } else {

        include "koneksi.php";

        $query = mysqli_query($connect, "SELECT * FROM poli WHERE KodePoli='$KodePoli'");
    ?>

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h2 class="text-center">Update Data Poli</h2>
                    <hr>

                    <form action="code/proses/update-delete/update/update_poli.php" method="POST">
                        <?php while ($isi = mysqli_fetch_array($query)) { ?>
                            <div class="form-group">
                                <label for="KodePoli"><b>Kode Poli</b></label>
                                <input type="text" class="form-control" name='KodePoli' value="<?php echo $KodePoli; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="NamaPoli"><b>Nama Poli</b></label>
                                <input type="text" class="form-control" name="NamaPoli" placeholder="Ketikkan nama poli..." value="<?php echo $isi['NamaPoli']; ?>" required>
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+Wy9aAV1bSkjqC6RS5EaF9hq8E1dGW4Jc+" crossorigin="anonymous"></script>

    <!-- AdminLTE App -->
    <script src="assets/AdminLTE/plugins/jquery/jquery.min.js"></script>
    <script src="assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/AdminLTE/dist/js/adminlte.min.js"></script>
</body>
</html>
