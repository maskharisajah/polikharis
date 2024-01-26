<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Update Data Obat</title>

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
    $KodeObat = $_POST['KodeObat'];

    if ($aksi == "delete") {
        $delete_obat = "DELETE from obat where KodeObat='$KodeObat'";

        $delete_obat_query = mysqli_query($connect, $delete_obat);

        if ($delete_obat_query) {
            header("location:halaman_utama.php?tabel_obat=$tabel_obat");
        } else {
            echo "Delete gagal dijalankan";
        }
    } else {

        include "koneksi.php";

        $query = mysqli_query($connect, "select * from obat where KodeObat='$KodeObat'");
    ?>

        <div class="container mt-5">
            <div class="text-center">
                <h2>Update Data Obat</h2>
            </div>
            <hr>

            <form action="code/proses/update-delete/update/update_obat.php" method="POST">
                <?php
                while ($isi = mysqli_fetch_array($query)) {
                ?>
                    <div class="form-group">
                        <label for="KodeObat">Kode Obat</label>
                        <input type="text" name='KodeObat' class="form-control" size="25px" maxlength="5" style="background-color:#E0DFDF" value="<?php echo $KodeObat; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="NamaObat">Nama Obat</label>
                        <input type="text" name="NamaObat" class="form-control" size="25px" maxlength="40" placeholder="Ketikkan nama obat..." value="<?php echo $isi['NamaObat']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="JenisObat">Jenis Obat</label>
                        <input type="text" name="JenisObat" class="form-control" size="25px" maxlength="30" placeholder="Ketikkan jenis obat..." value="<?php echo $isi['JenisObat']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="Kategori">Kategori Obat</label>
                        <select name="Kategori" class="form-control">
                            <option value="" disabled selected>Pilih Kategori</option>
                            <option value="Bebas" <?php echo ($isi['Kategori'] == 'Bebas') ? 'selected' : ''; ?>>Bebas</option>
                            <option value="Keras" <?php echo ($isi['Kategori'] == 'Keras') ? 'selected' : ''; ?>>Keras</option>
                            <option value="Psikotropika" <?php echo ($isi['Kategori'] == 'Psikotropika') ? 'selected' : ''; ?>>Psikotropika</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="HargaObat">Harga</label>
                        <input type="text" name='HargaObat' class="form-control" size="25px" maxlength="15" value="<?php echo $isi['HargaObat']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="StokObat">Stok</label>
                        <input type="text" name='StokObat' class="form-control" size="25px" maxlength="7" value="<?php echo $isi['StokObat']; ?>">
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
