<?php
ob_start();
include "config.php";

/** Tampil data **/
$pengaduan = mysqli_query($conn, "
    SELECT pekerja,
           COUNT(*) as jumlah_pengaduan,
           SUM(CASE WHEN kebutuhan = 'repair' THEN 1 ELSE 0 END) as jumlah_repair,
           SUM(CASE WHEN kebutuhan = 'maintenance' THEN 1 ELSE 0 END) as jumlah_maintenance,
           GROUP_CONCAT(DISTINCT CASE WHEN kebutuhan = 'repair' THEN DATE_FORMAT(tanggal, '%M') END ORDER BY tanggal) as bulan_repair,
           GROUP_CONCAT(DISTINCT CASE WHEN kebutuhan = 'maintenance' THEN DATE_FORMAT(tanggal, '%M') END ORDER BY tanggal) as bulan_maintenance,
           GROUP_CONCAT(DISTINCT CASE WHEN kebutuhan = 'repair' THEN CONCAT(DATE_FORMAT(tanggal, '%M'), ': ', penjelasan) END ORDER BY tanggal) as penjelasan_repair,
           GROUP_CONCAT(DISTINCT CASE WHEN kebutuhan = 'maintenance' THEN CONCAT(DATE_FORMAT(tanggal, '%M'), ': ', penjelasan) END ORDER BY tanggal) as penjelasan_maintenance
    FROM laporan
    GROUP BY pekerja
    ORDER BY pekerja ASC
");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- box icons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="true" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet" />
    <!-- Logo Title Bar -->
    <link rel="icon" href="image/Traktor Nusantara Logo - Vertikal RGB.png" type="image/x-icon" />
    <!-- My style -->
    <link rel="stylesheet" href="" />
    <title>Laporan Pekerja</title>
</head>
<style>
    table {
        font-family: "poppins", "sans-serif";
        font-size: 13px;
    }
</style>

<body>
    <!-- Start Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="">
                <img src="image/Traktor Nusantara Logo - Horizontal RGB.png" alt="" width="200" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item mx-3">
                        <a class="nav-link" aria-current="page" href="tabel_admin.php">Laporan</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="repair_mtn.php">R & M</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-3" href="">Pekerja</a>
                    </li>
                </ul>
                <div>
                    <button onclick="window.print()" class="btn btn-primary">Print this page</button>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Start Table -->
    <div class="table-responsive">
        <table class="table table-striped mt-2 text-center">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Pekerja</th>
                    <th>Jumlah Pengaduan</th>
                    <th>Jumlah Repair</th>
                    <th>Jumlah Maintenance</th>
                    <th>Penjelasan Repair</th>
                    <th>Penjelasan Maintenance</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($pengaduan)) { ?>
                    <?php $no = 1 ?>
                    <?php while ($row_pengaduan = mysqli_fetch_array($pengaduan)) { ?>
                        <tr class="table">
                            <td><?php echo $no ?></td>
                            <td><?php echo $row_pengaduan["pekerja"] ?></td>
                            <td><?php echo $row_pengaduan["jumlah_pengaduan"] ?></td>
                            <td><?php echo $row_pengaduan["jumlah_repair"] ?></td>
                            <td><?php echo $row_pengaduan["jumlah_maintenance"] ?></td>
                            <td>
                                <?php
                                $penjelasan_repair = explode(',', $row_pengaduan["penjelasan_repair"]);
                                foreach ($penjelasan_repair as $penjelasan) {
                                    echo $penjelasan . "<br>";
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                $penjelasan_maintenance = explode(',', $row_pengaduan["penjelasan_maintenance"]);
                                foreach ($penjelasan_maintenance as $penjelasan) {
                                    echo $penjelasan . "<br>";
                                }
                                ?>
                            </td>
                        </tr>
                    <?php $no++;
                    } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- End Table -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>
<?php
mysqli_close($conn);
ob_end_flush();
?>