<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Update Data Account</title>

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
    $IdUser = $_POST['IdUser'];

    if ($aksi == "delete") {
        $delete_login = "DELETE from useradmin where IdUser='$IdUser'";

        $delete_login_query = mysqli_query($connect, $delete_login);

        if ($delete_login_query) {
            header("location:halaman_utama.php?tabel_login=$tabel_login");
        } else {
            echo "Delete gagal dijalankan";
        }
    } else {

        include "koneksi.php";

        $query = mysqli_query($connect, "select * from useradmin where IdUser='$IdUser'");
    ?>

        <div class="container mt-5">
            <div class="text-center">
                <h2>Update Data Account</h2>
            </div>
            <hr>

            <form action="code/proses/update-delete/update/update_login.php" method="POST">
                <?php
                while ($isi = mysqli_fetch_array($query)) {
                ?>
                    <div class="form-group">
                        <label for="IdUser">ID User</label>
                        <input type="text" name='IdUser' class="form-control" size="25px" maxlength="5" style="background-color:#E0DFDF" value="<?php echo $IdUser; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="Nama">Nama</label>
                        <input type="text" name="Nama" class="form-control" size="25px" maxlength="40" placeholder="Ketikkan nama..." value="<?php echo $isi['Nama']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="JenisKelamin">Jenis Kelamin</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="JenisKelamin" value="P" <?php echo ($isi['JenisKelamin'] == 'P') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Perempuan</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="JenisKelamin" value="L" <?php echo ($isi['JenisKelamin'] == 'L') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Laki-Laki</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Alamat">Alamat</label>
                        <textarea name="Alamat" class="form-control" cols="28" rows="5" maxlength="50" placeholder="Ketikkan alamat.." required><?php echo $isi['Alamat']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="NoTelp">Telepon</label>
                        <input type="text" name='NoTelp' class="form-control" size="25px" maxlength="13" value="<?php echo $isi['NoTelp']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="Username">Username</label>
                        <input type="text" name='Username' class="form-control" size="25px" maxlength="13" value="<?php echo $isi['Username']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input type="password" name='Password' class="form-control" size="25px" maxlength="13" value="<?php echo $isi['Password']; ?>">
                        <?php
                        if ($_SESSION['Level'] != "Superadmin") {
                        ?>
                            <button type="submit" class="btn btn-primary mt-2">Update</button>
                        <?php } ?>
                    </div>

                    <?php
                    if ($_SESSION['Level'] == "Superadmin") {
                    ?>
                        <div class="form-group">
                            <label for="Level">Level User</label>
                            <select name="Level" class="form-control">
                                <option value="" disabled selected>Pilih Level User</option>
                                <option value="Superadmin" <?php echo ($isi['Level'] == 'Superadmin') ? 'selected' : ''; ?>>Superadmin</option>
                                <option value="Admin" <?php echo ($isi['Level'] == 'Admin') ? 'selected' : ''; ?>>Admin</option>
                                <option value="Dokter" <?php echo ($isi['Level'] == 'Dokter') ? 'selected' : ''; ?>>Dokter</option>
                                <option value="Pasien" <?php echo ($isi['Level'] == 'Pasien') ? 'selected' : ''; ?>>Pasien</option>
                            </select>
                            <button type="submit" class="btn btn-primary mt-2">Update</button>
                        </div>
                    <?php } ?>
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
