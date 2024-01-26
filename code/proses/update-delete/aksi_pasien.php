<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Update Data Pasien</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/AdminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- AdminLTE Theme style -->
    <link rel="stylesheet" href="assets/AdminLTE/dist/css/adminlte.min.css">
</head>

<body>
    <?php
    include "koneksi.php";
    $aksi = strtolower($_POST['proses']);
    $KodePasien = $_POST['KodePasien'];

    if ($aksi == "delete") {
        $delete_pasien = "DELETE from pasien where KodePasien='$KodePasien'";

        $delete_pasien_query = mysqli_query($connect, $delete_pasien);

        if ($delete_pasien_query) {
            header("location:halaman_utama.php?tabel_pasien=$tabel_pasien");
        } else {
            echo "Delete gagal dijalankan";
        }
    } else {

        include "koneksi.php";

        $query = mysqli_query($connect, "select * from pasien where KodePasien='$KodePasien'");
    ?>

        <div class="container mt-5">
            <div class="text-center">
                <h2>Update Data Pasien</h2>
            </div>
            <hr>

            <form action="code/proses/update-delete/update/update_pasien.php" method="POST">
                <?php
                while ($isi = mysqli_fetch_array($query)) {
                ?>
                    <div class="form-group">
                        <label for="KodePasien">Kode Pasien</label>
                        <input type="text" name='KodePasien' class="form-control" size="25px" maxlength="5" style="background-color:#E0DFDF" value="<?php echo $KodePasien; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="NamaPasien">Nama Pasien</label>
                        <input type="text" name="NamaPasien" class="form-control" size="25px" maxlength="40" placeholder="Ketikkan nama pasien..." value="<?php echo $isi['NamaPasien']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="AlamatPasien">Alamat</label>
                        <textarea name="AlamatPasien" class="form-control" cols="28" rows="5" maxlength="50" placeholder="Ketikkan alamat pasien.." required><?php echo $isi['AlamatPasien']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="GenderPasien">Jenis Kelamin</label>
                        <div>
                            <input type="radio" name="GenderPasien" value="P" <?php echo ($isi['GenderPasien'] == 'P') ? 'checked' : ''; ?>>&nbsp;Perempuan&nbsp;&nbsp;
                            <input type="radio" name="GenderPasien" value="L" <?php echo ($isi['GenderPasien'] == 'L') ? 'checked' : ''; ?>>&nbsp;Laki-Laki
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="UmurPasien">Umur</label>
                        <input type="text" name='UmurPasien' class="form-control" size="25px" maxlength="4" value="<?php echo $isi['UmurPasien']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="TeleponPasien">Telepon</label>
                        <input type="text" name='TeleponPasien' class="form-control" size="25px" maxlength="13" value="<?php echo $isi['TeleponPasien']; ?>">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
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
