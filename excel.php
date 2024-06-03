<?php

use function PHPSTORM_META\type;

ob_start();
session_start();
include "config.php";

// Handle form submission for month filter
$monthFilter = isset($_GET['month']) ? $_GET['month'] : '';
$statusFilter = isset($_GET['status']) ? $_GET['status'] : '';
// Tampilkan data dengan filter bulan dan status jika ada
$query = "SELECT *, TIMESTAMPDIFF(MINUTE, wkt_mulai, wkt_akhir) AS durasi_menit FROM laporan WHERE 1=1";
if ($monthFilter) {
    $query .= " AND MONTH(tanggal) = '$monthFilter'";
}
if ($statusFilter) {
    $query .= " AND status = '$statusFilter'";
}
$query .= " ORDER BY id DESC";
$pengaduan = mysqli_query($conn, $query);

?>
<!-- Start Table -->


<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Pegawai.xls");
?>


<div class="table-responsive">
    <table border="1" class="table table-striped mt-2 text-center">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Departemen</th>
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
            </tr>
        </thead>
        <tbody>
            <?php if (mysqli_num_rows($pengaduan)) { ?>
                <?php $no = 1 ?>
                <?php while ($row_pengaduan = mysqli_fetch_array($pengaduan)) {
                    $durasiMenit = $row_pengaduan["durasi_menit"];
                    $hours = floor($durasiMenit / 60);
                    $minutes = $durasiMenit % 60;
                    $durasiFormatted = sprintf("%02d:%02d", $hours, $minutes);
                ?>
                    <tr class="table">
                        <td><?php echo $no ?></td>
                        <td><?php echo $row_pengaduan["nama"] ?></td>
                        <td><?php echo $row_pengaduan["departemen"] ?></td>
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
                    </tr>
                <?php $no++;
                } ?>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- End Table -->

<?php
mysqli_close($conn);
ob_end_flush();
?>