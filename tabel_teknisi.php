<?php
ob_start();
session_start();
if (!isset($_SESSION['teknisi_id'])) header("location:loginteknisi.php");
include "config.php";

// Handle form submission for month and status filter
$monthFilter = isset($_POST['month']) ? $_POST['month'] : '';
$statusFilter = isset($_POST['status']) ? $_POST['status'] : '';

// Tampilkan data dengan filter bulan dan status jika ada
$query = "SELECT * FROM laporan WHERE 1=1";
if ($monthFilter) {
  $query .= " AND MONTH(tanggal) = '$monthFilter'";
}
if ($statusFilter) {
  $query .= " AND status = '$statusFilter'";
}
$query .= " ORDER BY id DESC";
$pengaduan = mysqli_query($conn, $query);

function calculateDuration($startTime, $endTime)
{
  $startTimestamp = strtotime($startTime);
  $endTimestamp = strtotime($endTime);

  // Tambahkan satu hari jika waktu akhir lebih kecil dari waktu mulai
  if ($endTimestamp < $startTimestamp) {
    $endTimestamp += 24 * 60 * 60; // Tambahkan satu hari dalam detik
  }

  $durationMinutes = ($endTimestamp - $startTimestamp) / 60;
  $hours = floor($durationMinutes / 60);
  $minutes = $durationMinutes % 60;

  return sprintf("%02d:%02d", $hours, $minutes);
}
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
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700&display=swap" rel="stylesheet" />
  <!-- Logo Title Bar -->
  <link rel="icon" href="image/Traktor Nusantara Logo - Vertikal RGB.png" type="image/x-icon" />
  <title>Daftar Pengaduan Teknisi</title>
  <style>
    table {
      font-family: "Poppins", "sans-serif";
      font-size: 13px;
    }

    th,
    td {
      white-space: nowrap;
      padding: 8px 12px;
      text-align: center;
    }

    th {
      background-color: #f8f9fa;
    }

    .table-responsive {
      margin: 20px;
    }
  </style>
</head>

<body>
  <!-- start navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
    <div class="container">
      <a class="navbar-brand" href="">
        <img src="image/Traktor Nusantara Logo - Horizontal RGB.png" alt="" width="200" />
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
        </ul>
      </div>
    </div>
  </nav>
  <!-- End navbar -->
  <!-- Start Filter Form -->
  <div class="container mt-4">
    <form method="post" class="row g-3">
      <div class="col-md-4">
        <label for="month" class="form-label">Filter by Month:</label>
        <select name="month" id="month" class="form-select">
          <option value="">All Month</option>
          <option value="1" <?php if ($monthFilter == '1') echo 'selected'; ?>>January</option>
          <option value="2" <?php if ($monthFilter == '2') echo 'selected'; ?>>February</option>
          <option value="3" <?php if ($monthFilter == '3') echo 'selected'; ?>>March</option>
          <option value="4" <?php if ($monthFilter == '4') echo 'selected'; ?>>April</option>
          <option value="5" <?php if ($monthFilter == '5') echo 'selected'; ?>>May</option>
          <option value="6" <?php if ($monthFilter == '6') echo 'selected'; ?>>June</option>
          <option value="7" <?php if ($monthFilter == '7') echo 'selected'; ?>>July</option>
          <option value="8" <?php if ($monthFilter == '8') echo 'selected'; ?>>August</option>
          <option value="9" <?php if ($monthFilter == '9') echo 'selected'; ?>>September</option>
          <option value="10" <?php if ($monthFilter == '10') echo 'selected'; ?>>October</option>
          <option value="11" <?php if ($monthFilter == '11') echo 'selected'; ?>>November</option>
          <option value="12" <?php if ($monthFilter == '12') echo 'selected'; ?>>December</option>
        </select>
      </div>
      <div class="col-md-4">
        <label for="status" class="form-label">Filter by Status:</label>
        <select name="status" id="status" class="form-select">
          <option value="">All Status</option>
          <option value="Sudah Dikerjakan" <?php if ($statusFilter == 'Sudah Dikerjakan') echo 'selected'; ?>>Sudah Dikerjakan</option>
          <option value="On-progress" <?php if ($statusFilter == 'On-progress') echo 'selected'; ?>>On-progress</option>
        </select>
      </div>
      <div class="col-md-4 align-self-end">
        <button type="submit" class="btn btn-primary">Filter</button>
        <!-- <a href="excel.php?month=<?= $monthFilter ?>" class="btn btn-primary">Excel</a> -->
        <a href="teknisi.php" class="btn btn-primary">Form Teknisi</a>
        <a href="logoutteknisi.php" class="btn btn-danger">Log Out</a>
      </div>
    </form>
  </div>
  <!-- End Filter Form -->
  <!-- Start Table -->
  <div class="table-responsive">
    <table class="table table-striped mt-2 text-center">
      <thead>
        <tr>
          <th>No.</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Departemen</th>
          <th>Cabang</th>
          <th>Kebutuhan</th>
          <th>Tanggal Pengaduan</th>
          <th>Penjelasan</th>
          <th>Lokasi</th>
          <th>Tanggal Kerja</th>
          <th>Jenis Pengaduan</th>
          <th>Mulai Pekerjaan</th>
          <th>Selesai Pekerjaan</th>
          <th>Durasi (Jam:Menit)</th>
          <th>Status</th>
          <th>Nama Pekerja</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if (mysqli_num_rows($pengaduan)) { ?>
          <?php $no = 1 ?>
          <?php while ($row_pengaduan = mysqli_fetch_array($pengaduan)) {
            $durasiFormatted = calculateDuration($row_pengaduan["wkt_mulai"], $row_pengaduan["wkt_akhir"]);
          ?>
            <tr class="table">
              <td><?php echo $no ?></td>
              <td><?php echo $row_pengaduan["nama"] ?></td>
              <td><?php echo $row_pengaduan["email"] ?></td>
              <td><?php echo $row_pengaduan["departemen"] ?></td>
              <td><?php echo $row_pengaduan["cabang"] ?></td>
              <td><?php echo $row_pengaduan["kebutuhan"] ?></td>
              <td><?php echo $row_pengaduan["tanggal"] ?></td>
              <td><?php echo $row_pengaduan["penjelasan"] ?></td>
              <td><?php echo $row_pengaduan["lokasi"] ?></td>
              <td><?php echo $row_pengaduan["tgl_kerja"] ?></td>
              <td><?php echo $row_pengaduan["jenis"] ?></td>
              <td><?php echo $row_pengaduan["wkt_mulai"] ?></td>
              <td><?php echo $row_pengaduan["wkt_akhir"] ?></td>
              <td><?php echo $durasiFormatted ?></td>
              <td><?php echo $row_pengaduan["status"] ?></td>
              <td><?php echo $row_pengaduan["pekerja"] ?></td>
              <td>
                <?php
                // Tampilkan tombol "Update" jika pengaduan belum diperbarui
                if (!$row_pengaduan["updated"]) {
                ?>
                  <a href="updateteknisi.php?update=<?php echo $row_pengaduan["id"] ?>" class="btn btn-primary mb-2">Update</a>
                <?php
                }
                ?>
                <a href="image/<?php echo $row_pengaduan["image"] ?>" target="_blank" class="btn btn-warning"><i class='bx bxs-file-image'></i></a>
              </td>
            </tr>
          <?php $no++;
          } ?>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <!-- End Table -->
  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0A7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
<?php
mysqli_close($conn);
ob_end_flush();
?>