<?php
ob_start();
include "config.php";

/** Proses Update Data **/
if (isset($_POST["ubah"])) {
    $_id = $_POST["id"];
    $nama = $_POST["nama"];
    $departemen = $_POST["departemen"];
    $kebutuhan = $_POST["kebutuhan"];
    $tanggal = $_POST["tanggal"];
    $penjelasan = $_POST["penjelasan"];
    $tgl_kerja = $_POST["tgl_kerja"];
    $jenis = $_POST["jenis"];
    $wkt_mulai = $_POST["wkt_mulai"];
    $wkt_mulai = date("H:i", strtotime($wkt_mulai));
    $wkt_akhir = $_POST["wkt_akhir"];
    $wkt_akhir = date("H:i", strtotime($wkt_akhir));
    $status = $_POST["status"];
    $pekerja = $_POST["pekerja"];

    // Cek apakah ada file gambar yang diunggah
    if ($_FILES["image"]["size"] > 0) {
        $image_name = $_FILES["image"]["name"];
        $tmp_name = $_FILES["image"]["tmp_name"];
        move_uploaded_file($tmp_name, "image/" . $image_name);
        // Jika ada file gambar yang diunggah, update kolom gambar
        $query = "UPDATE laporan SET nama='$nama', departemen='$departemen', kebutuhan='$kebutuhan', tanggal='$tanggal', penjelasan='$penjelasan', tgl_kerja='$tgl_kerja', jenis='$jenis', wkt_mulai='$wkt_mulai', wkt_akhir='$wkt_akhir', status='$status', pekerja='$pekerja', image='$image_name', updated=TRUE WHERE id='$_id'";
    } else {
        // Jika tidak ada file gambar yang diunggah, hanya perbarui data lainnya
        $query = "UPDATE laporan SET nama='$nama', departemen='$departemen', kebutuhan='$kebutuhan', tanggal='$tanggal', penjelasan='$penjelasan', tgl_kerja='$tgl_kerja', jenis='$jenis', wkt_mulai='$wkt_mulai', wkt_akhir='$wkt_akhir', status='$status', pekerja='$pekerja', updated=TRUE WHERE id='$_id'";
    }

    if (!mysqli_query($conn, $query)) {
        echo "Error updating record: " . mysqli_error($conn);
    }

    header("location:tabel_teknisi.php");
    exit();
}

/** Tampil Data Pada Form **/
$id = $_GET["update"];
$edit = mysqli_query($conn, "SELECT * FROM laporan WHERE id='$id'");
if (mysqli_num_rows($edit) == 0) header("location:updateteknisi.php");
$row_edit = mysqli_fetch_array($edit);
/**Tampil data**/
$pengaduan = mysqli_query($conn, "SELECT * FROM laporan ORDER BY id DESC");
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
    <title>Update Pengaduan</title>
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
            <div class="collapse navbar-collapse" id="navbarNav"></div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Start Form -->
    <div class="row vh-100 g-0">
        <div class="">
            <div class="row align-items-center justify-content-center h-100 g-0 px-4 px-sm-0">
                <div class="col col-sm-6 col-lg-7 col-xl-6">
                    <!-- Start Logo  -->
                    <a href="#" class="d-flex justify-content-center mb-4"><img src="image/Traktor Nusantara Logo - Horizontal RGB.png" alt="" width="200" /></a>
                    <!-- End Logo -->
                    <div class="text-center">
                        <h3 class="fw-bold">Form Update Teknisi</h3>
                        <p class="text-secondary">Maintenance & Repair</p>
                    </div>
                    <!-- Start Form -->
                    <form method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                        <label for="">Nama</label>
                        <div class="input-group mb-3">
                            <input type="name" class="form-control form-control-lg fs-6" placeholder="Masukan nama pekerja" name="pekerja" value="<?php echo $row_edit["pekerja"] ?>" />
                        </div>
                        <label for="">Kebutuhan</label>
                        <div class="input-group mb-3">
                            <select class="form-select" aria-label="Default select example" name="kebutuhan" value="<?php echo $row_edit["kebutuhan"] ?>">
                                <option value=""></option>
                                <option value="Repair" <?php if ($row_edit['kebutuhan'] == 'Repair') echo 'selected' ?>>Repair</option>
                                <option value="Maintenance" <?php if ($row_edit['kebutuhan'] == 'Maintenance') echo 'selected' ?>>Maintenance</option>
                            </select>
                        </div>
                        <label for="">Tanggal Dikerjakan</label>
                        <div>
                            <input type="date" class="form-control form-control-lg fs-6 mb-3" name="tgl_kerja" value="<?php echo $row_edit["tgl_kerja"] ?>" />
                        </div>
                        <label for="">Jenis Pengaduan</label>
                        <div class="input-group mb-3">
                            <select class="form-select" aria-label="Default select example" name="jenis" value="<?php echo $row_edit["jenis"] ?>">
                                <option value=""></option>
                                <option value="Pengaduan" <?php if ($row_edit['jenis'] == 'Pengaduan') echo 'selected' ?>>Pengaduan</option>
                                <option value="Non-Pengaduan" <?php if ($row_edit['jenis'] == 'Non-Pengaduan') echo 'selected' ?>>Non-Pengaduan</option>
                            </select>
                        </div>
                        <label for="">Waktu Mulai Pengerjaan</label>
                        <div class="input-group mb-3">
                            <input type="time" id="jam_mulai" name="wkt_mulai" value="<?php echo $row_edit["wkt_mulai"] ?>">
                        </div>
                        <label for="">Selesai Pengerjaan</label>
                        <div class="input-group mb-3">
                            <input type="time" id="jam_akhir" name="wkt_akhir" value="<?php echo $row_edit["wkt_akhir"] ?>">
                        </div>
                        <label for="">Status</label>
                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example" name="status" value="<?php echo $row_edit["status"] ?>">
                                <option value=""></option>
                                <option value="On-progress" <?php if ($row_edit['status'] == 'On-progress') echo 'selected' ?>>On-progress</option>
                                <option value="Sudah dikerjakan" <?php if ($row_edit['status'] == 'Sudah dikerjakan') echo 'selected' ?>>Sudah dikerjakan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Bukti</label>
                            <input class="form-control" type="file" id="formFileMultiple" accept=".img, .jpeg, .png ,.jpg" name="image">
                        </div>
                        <?php if (!$row_edit['updated']) { ?>
                            <button type="submit" class="btn btn-primary btn-lg w-100 mb-3" name="ubah">Simpan</button>
                        <?php } else { ?>
                            <button type="submit" class="btn btn-primary btn-lg w-100 mb-3" name="ubah" disabled>Simpan</button>
                        <?php } ?>
                        <input type="hidden" name="id" value="<?php echo $row_edit["id"] ?>">
                        <input type="hidden" name="nama" value="<?php echo $row_edit["nama"] ?>">
                        <input type="hidden" name="departemen" value="<?php echo $row_edit["departemen"] ?>">
                        <input type="hidden" name="tanggal" value="<?php echo $row_edit["tanggal"] ?>">
                        <input type="hidden" name="penjelasan" value="<?php echo $row_edit["penjelasan"] ?>">
                    </form>
                    <!-- End Form -->
                    <div class="text-center">
                        <small>Apakah ingin kembali?
                            <a href="tabel_teknisi.php" class="fw-bold">Table</a></small>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Form -->
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script>
            function validateForm() {
                const forbiddenSymbols = /[!@#$%^&*(),.?":{}|<>]/;
                const fields = ['pekerja', 'penjelasan']; // Add other fields if needed

                for (let i = 0; i < fields.length; i++) {
                    const field = document.getElementsByName(fields[i])[0];
                    if (forbiddenSymbols.test(field.value)) {
                        alert('Field ' + fields[i] + ' contains forbidden symbols.');
                        return false;
                    }
                }
                return true;
            }
        </script>
    </div>
</body>

</html>
<?php
mysqli_close($conn);
ob_end_flush();
?>