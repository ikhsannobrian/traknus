<?php
ob_start();
session_start();
include "config.php";

/**Tampil data**/
$pengaduan = mysqli_query($conn, "SELECT * FROM laporan ORDER BY id DESC");

// Query untuk menghitung jumlah repair dan maintenance setiap bulannya
$monthly_count = mysqli_query($conn, "
    SELECT 
        MONTH(tanggal) AS month, 
        YEAR(tanggal) AS year,
        SUM(CASE WHEN kebutuhan = 'repair' THEN 1 ELSE 0 END) AS total_repair,
        SUM(CASE WHEN kebutuhan = 'maintenance' THEN 1 ELSE 0 END) AS total_maintenance
    FROM laporan
    GROUP BY YEAR(tanggal), MONTH(tanggal)
    ORDER BY YEAR(tanggal), MONTH(tanggal)
") or die(mysqli_error($conn));
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
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet" />
    <!-- Logo Title Bar -->
    <link rel="icon" href="image/Traktor Nusantara Logo - Vertikal RGB.png" type="image/x-icon" />
    <!-- My style -->
    <link rel="stylesheet" href="" />
    <title>Laporan Repair & Maintenance</title>
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
            <a class="navbar-brand" href="#">
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
                        <a class="nav-link" href="">R & M</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-3" href="pekerja.php">Pekerja</a>
                    </li>
                </ul>
                <div>
                    <a href="halamanadmin.php" class="btn btn-primary">Home</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Start Monthly Summary -->
    <div class="container mt-4">
        <h2 class="text-center">Monthly Repair and Maintenance Summary</h2>
        <table class="table table-bordered mt-2 text-center">
            <thead>
                <tr>
                    <th>Year</th>
                    <th>Month</th>
                    <th>Total Repair</th>
                    <th>Total Maintenance</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($monthly_count)) { ?>
                    <?php while ($row = mysqli_fetch_array($monthly_count)) { ?>
                        <tr>
                            <td><?php echo $row["year"] ?></td>
                            <td><?php echo date("F", mktime(0, 0, 0, $row["month"], 10)) ?></td>
                            <td><?php echo $row["total_repair"] ?></td>
                            <td><?php echo $row["total_maintenance"] ?></td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="4">No data found</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- End Monthly Summary -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
<?php
mysqli_close($conn);
ob_end_flush();
?>