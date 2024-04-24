<?php
include "config.php";
$query = mysqli_query($conn, "SELECT * FROM ga_target");

$query1 = mysqli_query($conn, "SELECT * FROM ga_target WHERE status ='Sedang Dikerjakan'");
$count1 = mysqli_num_rows($query1);
$query2 = mysqli_query($conn, "SELECT * FROM ga_target WHERE status ='Belum Dimulai'");
$count2 = mysqli_num_rows($query2);
$query3 = mysqli_query($conn, "SELECT * FROM ga_target WHERE status ='Sudah Selesai'");
$count3 = mysqli_num_rows($query3);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet" />
    <!-- Logo Title Bar -->
    <link rel="icon" href="image/Traktor Nusantara Logo - Vertikal RGB.png" type="image/x-icon" />
    <!-- My style -->
    <link rel="stylesheet" href="style_infra.css" />
    <title>Admin</title>
</head>

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
                    <li class="nav-item mx-2">
                        <a class="nav-link" aria-current="page" href="tabel_target.php">Table</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" aria-current="page" href="target.php">Form</a>
                    </li>
                </ul>
            </div>
            <div>
                <a href="halaman_admin.php" class="btn btn-primary">Home</a>
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
                    <th>Status</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Sedang Dikerjakan</td>
                    <td><?= $count1 ?></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Belum Dimulai</td>
                    <td><?= $count2 ?></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Sudah Selesai</td>
                    <td><?= $count3 ?></td>
                </tr>
                <tr>
            </tbody>
        </table>
    </div>
    <!-- End Table -->
    </div>
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