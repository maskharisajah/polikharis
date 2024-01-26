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
<body class="">

<div class="container">
    <b>
        <font color="#00b994">OBAT</font>
    </b>
    <br><br>
    <hr class="bg-info" style="height: 2px; width: 100%">
    <br>

    <form action="halaman_utama.php?tabel_obat=$tabel_obat" method="post">
        <div class="row">
            <div class="col-md-6">
                <?php if ($_SESSION['Level'] == "Superadmin" or $_SESSION['Level'] == "Admin") { ?>
                    <a href="halaman_utama.php?formulir_obat=$formulir_obat" class="btn btn-success">Tambah</a>
                <?php } ?>

            </div>
            <div class="col-md-6 text-right">
                <label for="cari" class="h5">Search :</label>
                <input type="search" name="cari" class="form-control" style="width: 200px; display: inline-block;">
            </div>
        </div>
    </form>

    <br>

    <table id="daftar-table" class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr align='center'>
                <th class="normal">Kode Obat</th>
                <th class="normal">Nama Obat</th>
                <th class="normal">Jenis Obat</th>
                <th class="normal">Kategori</th>
                <th class="normal">Harga Obat</th>
                <th class="normal">Stok</th>
                <?php if ($_SESSION['Level'] == "Superadmin" or $_SESSION['Level'] == "Admin") { ?>
                    <th class="normal">Tools</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php
            include "koneksi.php";

            $tampilkan_isi = "select * from obat";

            if (isset($_POST['cari']) and $_POST['cari'] <> "") {
                $key = $_POST['cari'];
                $tampilkan_isi = "select * from obat where NamaObat LIKE '%$key%' ";

                echo "<font size='3' face='Calibri'>Pencarian data obat dengan kata '$key'</font>";
            } else if (isset($_POST['cari']) and $_POST['cari'] == "") {
                $tampilkan_isi = "select * from obat";
            }

            $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

            while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
                $KodeObat = $isi['KodeObat'];
                $NamaObat = $isi['NamaObat'];
                $JenisObat = $isi['JenisObat'];
                $Kategori = $isi['Kategori'];
                $HargaObat = $isi['HargaObat'];
                $StokObat = $isi['StokObat'];
            ?>
                <tr class="isi" align='left'>
                    <td><?php echo $KodeObat ?></td>
                    <td><?php echo $NamaObat ?></td>
                    <td><?php echo $JenisObat ?></td>
                    <td><?php echo $Kategori ?></td>
                    <td>Rp.<b><?php echo $HargaObat ?></b></td>
                    <td><?php echo $StokObat ?></td>
                    <?php if ($_SESSION['Level'] == "Superadmin" or $_SESSION['Level'] == "Admin") { ?>
                        <td>
                            <div class="btn-group" role="group">
                                <form action="halaman_utama.php?aksi_obat=$aksi_obat" method="post">
                                    <input type="hidden" name="KodeObat" value="<?php echo $KodeObat; ?>">
                                    <button class="btn btn-warning" name="proses" type="submit">Update</button>
                                </form>
								<p>&ensp;</p>
                                <form action="halaman_utama.php?aksi_obat=$aksi_obat" method="post" onsubmit="return confirm('Apakah Anda ingin menghapus data obat <?php echo $NamaObat; ?> ?')">
                                    <input type="hidden" name="KodeObat" value="<?php echo $KodeObat; ?>">
                                    <button class="btn btn-danger" name="proses" value="delete" type="submit">Delete</button>
                                </form>
                            </div>
                        </td>
                    <?php } ?>
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


