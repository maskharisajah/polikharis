<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Update Data Dokter</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/AdminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="assets/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- AdminLTE Theme style -->
    <link rel="stylesheet" href="assets/AdminLTE/dist/css/adminlte.min.css">
</head>

<body>
    <?php
    include "koneksi.php";
    $aksi = strtolower($_POST['proses']);
    $KodeDokter = $_POST['KodeDokter'];

    if ($aksi == "delete") {
        $delete_dokter = "DELETE from dokter where KodeDokter='$KodeDokter'";

        $delete_dokter_query = mysqli_query($connect, $delete_dokter);

        if ($delete_dokter_query) {
            header("location:halaman_utama.php?tabel_dokter=$tabel_dokter");
        } else {
            echo "Delete gagal dijalankan";
        }
    } else {

        include "koneksi.php";

        $query = mysqli_query($connect, "select * from dokter d,poli p where KodeDokter='$KodeDokter' and d.KodePoli = p.KodePoli");
    ?>

        <div class="container mt-5">
            <div class="text-center">
                <h2>Update Data Dokter</h2>
            </div>
            <hr>

            <form action="code/proses/update-delete/update/update_dokter.php" method="POST">
                <?php
                while ($isi = mysqli_fetch_array($query)) {
                ?>
                    <div class="form-group">
                        <label for="KodeDokter">Kode Dokter</label>
                        <input type="text" name='KodeDokter' class="form-control" size="25px" maxlength="5" style="background-color:#E0DFDF" value="<?php echo $KodeDokter; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="NamaDokter">Nama Dokter</label>
                        <input type="text" name="NamaDokter" class="form-control" size="25px" maxlength="40" placeholder="Ketikkan nama dokter..." value="<?php echo $isi['NamaDokter']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="Spesialis">Spesialis</label>
                        <input type="text" name="Spesialis" class="form-control" size="25px" maxlength="30" placeholder="Ketikkan spesialis..." value="<?php echo $isi['Spesialis']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="KodePoli">Poli</label>
                        <input type="text" name='KodePoli' class="form-control" size="25px" maxlength="5" style="background-color:#E0DFDF" value="<?php echo $isi['NamaPoli']; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="AlamatDokter">Alamat</label>
                        <textarea name="AlamatDokter" class="form-control" cols="28" rows="5" maxlength="50" placeholder="Ketikkan alamat dokter..." required><?php echo $isi['AlamatDokter']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="TeleponDokter">Telepon</label>
                        <input type="text" name='TeleponDokter' class="form-control" size="25px" maxlength="13" value="<?php echo $isi['TeleponDokter']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="Tarif">Tarif</label>
                        <input type="text" name='Tarif' class="form-control" size="25px" maxlength="13" value="<?php echo $isi['Tarif']; ?>">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                <?php } ?>
            </form>
        </div>
    <?php
    }
    ?>

    <!-- Bootstrap JS -->
    <script src="assets/AdminLTE/plugins/jquery/jquery.min.js"></script>
    <script src="assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <!-- Your other scripts go here -->
</body>

</html>
