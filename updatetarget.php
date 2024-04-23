<?php
ob_start();
include "config.php";
/** Proses Update Data**/
if (isset($_POST["ubah"])) {
    $_id = $_POST["id"];
    $status = $_POST["status"];
    $tgl_akhir = $_POST["tgl_akhir"];
    mysqli_query($conn, "UPDATE ga_target SET tgl_akhir='$tgl_akhir', status='$status' WHERE id='$_id'");
    header("location:tabel_target.php");
}
/** Proses Ambil Data **/
$id = $_GET["update"];
$edit = mysqli_query($conn, "SELECT * FROM ga_target WHERE id ='$id' ");
if (mysqli_num_rows($edit) == 0) header("location:updatetarget.php");
$row_edit = mysqli_fetch_array($edit);
/**Tampil data**/
$pengaduan = mysqli_query($conn, "SELECT * FROM ga_target ORDER BY id DESC");
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
    <title>Update Target</title>
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
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <!-- Start Form -->
    <div class="row vh-100 g-0">
        <div class="">
            <div class="row align-items-center justify-content-center h-100 g-0 px-4 px-sm-0">
                <div class="col col-sm-6 col-lg-7 col-xl-6">
                    <!-- Start Logo  -->
                    <a href="#" class="d-flex justify-content-center mb-4"><img src="image/Traktor Nusantara Logo - Horizontal RGB.png" alt="" width="200" />
                    </a>
                    <!-- End Logo -->
                    <div class="text-center">
                        <h3 class="fw-bold">Form Update Target</h3>
                        <p class="text-secondary">Update Our Target</p>
                    </div>
                    <!-- Start Form -->
                    <form method="post">
                        <label for="">Status</label>
                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example" name="status" value="<?php echo $row_edit["status"] ?>">
                                <option value=""></option>
                                <option value="Belum Selesai" <?php if ($row_edit['status'] == 'Belum Selesai') echo 'selected' ?>>Belum Selesai</option>
                                <option value="Sudah Selesai" <?php if ($row_edit['status'] == 'Sudah Selesai') echo 'selected' ?>>Sudah Selesai</option>
                            </select>
                        </div>
                        <label for="">Tanggal Berakhir</label>
                        <div>
                            <input type="date" class="form-control form-control-lg fs-6 mb-3" name="tgl_akhir" value="<?php echo $row_edit["tgl_akhir"] ?>" />
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-100 mb-3" name="ubah">Simpan</button>
                        <input type="hidden" name="id" value="<?php echo $row_edit["id"] ?>">
                    </form>
                    <!-- End Form -->
                    <div class="text-center">
                        <small>Apakah ingin ke?
                            <a href="tabel_target.php" class="fw-bold">Tabel</a></small>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Form -->
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