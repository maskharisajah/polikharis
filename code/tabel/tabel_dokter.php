<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dokter</title>

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
            <font color="#00b994">DOKTER</font>
        </b>
        <br><br>
        <hr class="bg-info" style="height: 2px; width: 100%">
        <br>

        <form action="halaman_utama.php?tabel_dokter=$tabel_dokter" method="post">
            <div class="row">
            <div class="col-md-6">
    <?php if ($_SESSION['Level'] == "Superadmin") { ?>
        <a href="halaman_utama.php?formulir_dokter=<?= $formulir_dokter ?>" class="btn btn-primary">Tambah</a>

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
                    <th class="normal">Kode Dokter</th>
                    <th class="normal">Nama Dokter</th>
                    <th class="normal">Spesialis</th>
                    <th class="normal">Alamat</th>
                    <th class="normal">Telepon</th>
                    <th class="normal">Tarif</th>
                    <th class="normal">Poli</th>
                    <?php if ($_SESSION['Level'] == "Superadmin") { ?>
                        <th class="normal">Tools</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                include "koneksi.php";

                $tampilkan_isi = "select * from dokter d,poli p where d.KodePoli=p.KodePoli";

                if (isset($_POST['cari']) and $_POST['cari'] <> "") {
                    $key = $_POST['cari'];
                    $tampilkan_isi = "select * from dokter d,poli p where d.KodePoli=p.KodePoli AND NamaDokter LIKE '%$key%' ";
                    echo "<font size='3' face='Calibri'>Pencarian data dokter dengan kata '$key'</font>";
                } else if (isset($_POST['cari']) and $_POST['cari'] == "") {
                    $tampilkan_isi = "select * from dokter d,poli p where d.KodePoli=p.KodePoli";
                }

                $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

                while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
                    $KodeDokter = $isi['KodeDokter'];
                    $NamaDokter = $isi['NamaDokter'];
                    $Spesialis = $isi['Spesialis'];
                    $AlamatDokter = $isi['AlamatDokter'];
                    $TeleponDokter = $isi['TeleponDokter'];
                    $Tarif = $isi['Tarif'];
                    $NamaPoli = $isi['NamaPoli'];
                ?>
                    <tr class="isi" align='left'>
                        <td><?php echo $KodeDokter ?></td>
                        <td><?php echo $NamaDokter ?></td>
                        <td><?php echo $Spesialis ?></td>
                        <td><?php echo $AlamatDokter ?></td>
                        <td><?php echo $TeleponDokter ?></td>
                        <td>Rp.<b><?php echo $Tarif ?></b></td>
                        <td><?php echo $NamaPoli ?></td>
                        <?php if ($_SESSION['Level'] == "Superadmin") { ?>
                            <td>
                                <div class="btn-group" role="group">
                                    <form action="halaman_utama.php?aksi_dokter=$aksi_dokter" method="post">
                                        <input type="hidden" name="KodeDokter" value="<?php echo $KodeDokter; ?>">
                                        <button class="btn btn-warning" name="proses" type="submit">Update</button>
                                    </form>
                                    <p>&ensp;</p>
                                    <form action="halaman_utama.php?aksi_dokter=$aksi_dokter" method="post" onsubmit="return confirm('Apakah Anda ingin menghapus data dokter <?php echo $NamaDokter; ?> ?')">
                                        <input type="hidden" name="KodeDokter" value="<?php echo $KodeDokter; ?>">
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
