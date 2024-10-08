<?php
ob_start();
include "config.php";
/**Input Data**/
if (isset($_POST["simpan"])) {
    $nama = $_POST["nama"];
    $departemen = $_POST["departemen"];
    $cabang = $_POST["cabang"];
    $kebutuhan = $_POST["kebutuhan"];
    $tanggal = $_POST["tanggal"];
    $penjelasan = $_POST["penjelasan"];
    $lokasi = $_POST["lokasi"];
    $tgl_kerja = $_POST["tgl_kerja"];
    $jenis = $_POST["jenis"];
    $wkt_mulai = $_POST["wkt_mulai"];
    $wkt_mulai = date("H:i", strtotime($wkt_mulai));
    $wkt_akhir = $_POST["wkt_akhir"];
    $wkt_akhir = date("H:i", strtotime($wkt_akhir));
    $status = $_POST["status"];
    $pekerja = $_POST["pekerja"];
    $simpan = mysqli_query($conn, "INSERT INTO laporan (nama, departemen, cabang, kebutuhan, tanggal, penjelasan, lokasi,tgl_kerja,jenis, wkt_mulai,wkt_akhir, status,pekerja) VALUES('$nama','$departemen','$cabang','$kebutuhan','$tanggal','$penjelasan','$lokasi','$tgl_kerja','$jenis','$wkt_mulai','$wkt_akhir','$status','$pekerja')");

    if ($simpan) {
        echo "<script>
              alert('data anda berhasil disimpan!');
              document.location='tabel_teknisi.php';
          </script>";
    } else {
        echo "<script>
              alert('simpan data gagal!');
              document.location='teknisi.php';
          </script>";
    }
}
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
    <link rel="stylesheet" href="" />
    <title>Form Teknisi</title>
    <style>
        .tulisan {
            font-size: 15px;
        }

        .form-select {
            font-size: 14px;
            padding: 8px;
        }

        .form-select option {
            white-space: nowrap;
            padding: 10px;
        }
    </style>
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
                <div>
                </div>
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
                        <h3 class="fw-bold">Form Pengaduan for Technician</h3>
                        <p class="text-secondary">Maintenance & Repair</p>
                    </div>
                    <!-- Start Form -->
                    <form method="post" class="tulisan">
                        <label for="">Nama</label>
                        <div class="input-group mb-3">
                            <input type="name" class="form-control form-control-lg fs-6" placeholder="Masukan nama anda" name="nama" required />
                        </div>
                        <label for="">Departemen</label>
                        <div class="input-group mb-3">
                            <select class="form-select" aria-label="Default select example" name="departemen" id="departemen">
                                <option value=""></option>
                                <option value="General Affair">General Affair</option>
                                <option value="Material Handling">Material Handling</option>
                                <option value="Marketing Communication">Marketing Communication</option>
                                <option value="Project Management 1">Project Management 1</option>
                                <option value="Material Handling Parts">Material Handling Parts</option>
                                <option value="Material Handling Service">Material Handling Service</option>
                                <option value="Material Handling Technical Suport">Material Handling Technical Suport</option>
                                <option value="Service Personnel Development & Facilities">Service Personnel Development & Facilities</option>
                                <option value="Business Development & Japan Desk">Business Development & Japan Desk</option>
                                <option value="Power Generation Sales Group 1">Power Generation Sales Group 1</option>
                                <option value="Power Generation Sales Group 2">Power Generation Sales Group 2</option>
                                <option value="Air Solution Sales">Air Solution Sales</option>
                                <option value="Agro Sales">Agro Sales</option>
                                <option value="Construction & Crane Sales">Construction & Crane Sales</option>
                                <option value="Product Management 2">Product Management 2</option>
                                <option value="Product Management 3">Product Management 3</option>
                                <option value="Application Engineering">Application Engineering</option>
                                <option value="Marketing Support & Importation">Marketing Support & Importation</option>
                                <option value="Parts Marketing">Parts Marketing</option>
                                <option value="Parts Sales & Key Account">Parts Sales & Key Account</option>
                                <option value="Parts Logistic & Warehouse">Parts Logistic & Warehouse</option>
                                <option value="Service Business & Marketing">Service Business & Marketing</option>
                                <option value="Service Technical Support">Service Technical Support</option>
                                <option value="Human Capital Development (HCD)">Human Capital Development (HCD)</option>
                                <option value="Human Capital Services (HCS)">Human Capital Services (HCS)</option>
                                <option value="Accounting & Taxes">Accounting & Taxes</option>
                                <option value="Sustainability, Security, Environment, Health, and Safety (SSEHS)">Sustainability, Security, Environment, Health, and Safety (SSEHS)</option>
                                <option value="Budget & Control">Budget & Control</option>
                                <option value="Finance & PDCA">Finance & PDCA</option>
                                <option value="Information Technology (IT)">Information Technology (IT)</option>
                            </select>
                        </div>
                        <label for="">Kebutuhan</label>
                        <div class="input-group mb-3">
                            <select class="form-select" aria-label="Default select example" name="kebutuhan" id="kebutuhan">
                                <option value=""></option>
                                <option value="Repair">Repair</option>
                                <option value="Maintenance">Maintenance</option>
                            </select>
                        </div>
                        <label for="">Cabang</label>
                        <div class="input-group mb-3">
                            <select class="form-select" aria-label="Default select example" name="cabang" id="kebutuhan">
                                <option value=""></option>
                                <option value="TN-HO">TN-HO</option>
                                <option value="SHN">SHN</option>
                            </select>
                        </div>
                        <label for="">Tanggal Pengaduan</label>
                        <div>
                            <input type="date" class="form-control form-control-lg fs-6 mb-3" name="tanggal" />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Penjelasan</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Jelaskan yang akan diperbaiki/maintenance" name="penjelasan"></textarea>
                        </div>
                        <label for="">Lokasi</label>
                        <div class="input-group mb-3">
                            <input type="name" class="form-control form-control-lg fs-6" placeholder="Masukan lokasi kerusakan/maintenance" name="lokasi" required />
                        </div>
                        <label for="">Tanggal Pengerjaan</label>
                        <div>
                            <input type="date" class="form-control form-control-lg fs-6 mb-3" name="tgl_kerja" />
                        </div>
                        <label for="">Jenis Pengaduan</label>
                        <div class="input-group mb-3">
                            <select class="form-select" aria-label="Default select example" name="jenis" id="kebutuhan">
                                <option value=""></option>
                                <option value="Pengaduan">Pengaduan</option>
                                <option value="Non-Pengaduan">Non-Pengaduan</option>
                            </select>
                        </div>
                        <label for="">Waktu Mulai Pengerjaan</label>
                        <div class="input-group mb-3">
                            <input type="time" id="jam_mulai" name="wkt_mulai">
                        </div>
                        <label for="">Selesai Pengerjaan</label>
                        <div class="input-group mb-3">
                            <input type="time" id="jam_akhir" name="wkt_akhir">
                        </div>
                        <label for="">Status</label>
                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example" name="status">
                                <option value=""></option>
                                <option value="Belum dikerjakan">Belum dikerjakan</option>
                                <option value="Sudah dikerjakan">Sudah dikerjakan</option>
                            </select>
                        </div>
                        <label for="">Nama Pekerja</label>
                        <div class="input-group mb-3">
                            <input type="name" class="form-control form-control-lg fs-6" placeholder="Masukan nama pekerja" name="pekerja" required />
                        </div>

                        <!-- <div class="mb-3">
              <label for="">Bukti</label>
              <input class="form-control" type="file" id="formFileMultiple" multiple name="image">
              <p style="color: red;">Kosongkan jika belum dikerjakan</p>
            </div> -->
                        <button type="submit" class="btn btn-primary btn-lg w-100 mb-3" name="simpan">Simpan</button>
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