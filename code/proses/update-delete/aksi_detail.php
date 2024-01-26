<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Update Data Detail</title>

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
    $NomorResep = $_POST['NomorResep'];
    $KodeObat = $_POST['KodeObat'];
    $Dosis = $_POST['Dosis'];
    $Jumlah = $_POST['Jumlah'];
    $SubTotal = $_POST['SubTotal'];

    if ($aksi == "delete") {
        $delete_detail = "DELETE from detail where NomorResep='$NomorResep' and KodeObat='$KodeObat' and Dosis='$Dosis' and Jumlah='$Jumlah' and SubTotal='$SubTotal'";

        $delete_detail_query = mysqli_query($connect, $delete_detail);

        if ($delete_detail_query) {
            header("location:halaman_utama.php?tabel_detail=$tabel_detail");
        } else {
            echo "Delete gagal dijalankan";
        }
    } else {
        include "koneksi.php";

        $query = mysqli_query($connect, "select r.NomorResep,p.WaktuDaftar,pa.NamaPasien,d.NamaDokter,o.KodeObat,o.NamaObat,o.HargaObat,Dosis,Jumlah,d.Tarif
from resep r,pendaftaran p,pasien pa,dokter d,obat o,detail dt
where r.NomorResep=dt.NomorResep and p.KodePasien=pa.KodePasien and p.KodeDokter=d.KodeDokter and r.NoDaftar=p.NoDaftar
and dt.KodeObat=o.KodeObat and SubTotal='$SubTotal' and Jumlah='$Jumlah' and Dosis='$Dosis' and dt.KodeObat='$KodeObat'");
    ?>

        <div class="container mt-5">
            <div class="text-center">
                <h2>Update Data Detail</h2>
            </div>
            <hr>

            <form action="code/proses/update-delete/update/update_detail.php" method="POST">

                <?php
                while ($isi = mysqli_fetch_array($query)) {
                ?>
                    <div class="form-group">
                        <label for="NomorResep">Nomor Resep</label>
                        <input type="text" name="NomorResep" class="form-control" value="(<?php echo $isi['NomorResep'] ?>) <?php echo $isi['WaktuDaftar'] ?> | <?php echo $isi['NamaPasien'] ?> (PASIEN) - <?php echo $isi['NamaDokter'] ?> (DOKTER)" readonly>
                        <input type="hidden" name="NomorResep" value="<?php echo $NomorResep; ?>">
                        <input type="hidden" name="Tarif" value="<?php echo $isi['Tarif']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="KodeObat">Obat</label>
                        <input type="text" name="KodeObat" class="form-control" value="<?php echo $isi['KodeObat'] ?> | <?php echo $isi['NamaObat'] ?> ( Rp.<?php echo $isi['HargaObat'] ?> )" readonly>
                        <input type="hidden" name="HargaObat" value="<?php echo $isi['HargaObat'] ?>">
                        <input type="hidden" name="KodeObat" value="<?php echo $isi['KodeObat'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="Dosis">Dosis</label>
                        <input type="text" name="Dosis" class="form-control" placeholder="Ketikkan dosis obat..." value="<?php echo $isi['Dosis']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="Jumlah">Jumlah Obat</label>
                        <input type="text" name='Jumlah' class="form-control" maxlength="7" value="<?php echo $isi['Jumlah']; ?>">
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
    <script src="assets/AdminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <!-- Your other scripts go here -->
</body>

</html>
