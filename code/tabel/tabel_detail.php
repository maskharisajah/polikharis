<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Detail</title>

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
    <div class="container mt-4">
        <h2 class="mb-3"><b><font color="#000000">DETAIL</font></b></h2>
        <hr class="bg-info" size="2px">

        <form action="halaman_utama.php?tabel_detail=$tabel_detail" method="post">
            <div class="row mb-3">
                <div class="col-md-6">
                    <a href="halaman_utama.php?formulir_detail=$formulir_detail" class="btn btn-primary">Tambah</a>
                   
                </div>
                <div class="col-md-6">
                    <div class="float-right">
                        <label for="search" class="mr-2"><font size="5px">Search :</font></label>
                        <input type="search" name="cari" id="search" placeholder="" class="form-control" style="width: 200px;">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <p class="text-muted"><u>Harap gunakan <b>Nomor Resep</b> dalam pencarian Detail</u>!</p>
                </div>
            </div>
        </form>

        <table class="table table-bordered table-hover" id="daftar-table">
            <thead class="thead-dark">
                <tr align="center">
                    <th class="normal">No.Resep</th>
                    <th class="normal">Nama Obat</th>
                    <th class="normal">Dosis</th>
                    <th class="normal">Jumlah Obat</th>
                    <th class="normal">Subtotal</th>
                    <th class="normal">Tools</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "koneksi.php";

                $tampilkan_isi = "SELECT d.NomorResep, o.KodeObat, o.NamaObat, d.Dosis, d.Jumlah, d.SubTotal FROM detail d, obat o WHERE d.KodeObat=o.KodeObat";

                if (isset($_POST['cari']) and $_POST['cari'] <> "") {
                    $key = $_POST['cari'];
                    $tampilkan_isi = "SELECT d.NomorResep, o.KodeObat, o.NamaObat, d.Dosis, d.Jumlah, d.SubTotal FROM detail d, obat o WHERE d.KodeObat=o.KodeObat AND d.NomorResep LIKE '%$key%' ";

                    echo "<p class='font-size: 3px; font-family: Calibri;'>Pencarian data detail dengan nomor resep '$key'</p>";
                } else if (isset($_POST['cari']) and $_POST['cari'] == "") {
                    $tampilkan_isi = "SELECT d.NomorResep, o.KodeObat, o.NamaObat, d.Dosis, d.Jumlah, d.SubTotal FROM detail d, obat o WHERE d.KodeObat=o.KodeObat";
                }

                $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

                while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
                    $NomorResep = $isi['NomorResep'];
                    $KodeObat = $isi['KodeObat'];
                    $NamaObat = $isi['NamaObat'];
                    $Dosis = $isi['Dosis'];
                    $Jumlah = $isi['Jumlah'];
                    $SubTotal = $isi['SubTotal'];
                ?>
                    <tr class="isi" align="left">
                        <td><?php echo $NomorResep ?></td>
                        <td><?php echo $NamaObat ?></td>
                        <td><?php echo $Dosis ?></td>
                        <td><?php echo $Jumlah ?></td>
                        <td>Rp.<b><?php echo $SubTotal ?></b></td>
                        <td>
                            <form action="halaman_utama.php?aksi_detail=$aksi_detail" method="post">
                                <input type="hidden" name="NomorResep" value="<?php echo $NomorResep; ?>">
                                <input type="hidden" name="KodeObat" value="<?php echo $KodeObat; ?>">
                                <input type="hidden" name="Dosis" value="<?php echo $Dosis; ?>">
                                <input type="hidden" name="Jumlah" value="<?php echo $Jumlah; ?>">
                                <input type="hidden" name="SubTotal" value="<?php echo $SubTotal; ?>">

                                <button class="btn btn-warning" name="proses" type="submit" value="Update">Update</button>
                                <button class="btn btn-danger" name="proses" type="submit" value="delete" onclick="return confirm('Apakah Anda ingin menghapus data detail bernomor resep <?php echo $NomorResep; ?> ?')">Delete</button>
                            </form>
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
