<?php
ob_start();
include "config.php";

// Mendapatkan filter bulan dan status dari query string
$monthFilter = isset($_GET['month']) ? $_GET['month'] : '';
$statusFilter = isset($_GET['status']) ? $_GET['status'] : '';

// Membuat nama bulan dalam format teks jika bulan dipilih
if ($monthFilter) {
    $bulan = date('F', mktime(0, 0, 0, $monthFilter, 10)); // Contoh output: January, February, dst.
} else {
    $bulan = 'All_Months'; // Jika tidak ada bulan yang dipilih
}

// Membuat nama status
if ($statusFilter) {
    $status = str_replace(' ', '_', $statusFilter);
} else {
    $status = 'All_Status'; // Jika tidak ada status yang dipilih
}

$tahun = date('Y'); // Contoh output: 2024

// Membuat nama file sesuai dengan bulan, tahun, status, dan kata "pengaduan"
$filename = "pengaduan_" . $bulan . "_" . $status . "_" . $tahun . ".xls";

// Menetapkan header untuk mengunduh file Excel
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$filename");

// Konten Excel Anda dapat dimulai dari sini
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Data Pengaduan</title>
</head>

<body>
    <!-- Start Table -->
    <table border="1">
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
            </tr>
        </thead>
        <tbody>
            <?php
            // Query untuk mendapatkan data berdasarkan filter bulan dan status
            $query = "SELECT *, TIMESTAMPDIFF(MINUTE, wkt_mulai, wkt_akhir) AS durasi_menit FROM laporan WHERE 1=1";
            if ($monthFilter) {
                $query .= " AND MONTH(tanggal) = '$monthFilter'";
            }
            if ($statusFilter) {
                $query .= " AND status = '$statusFilter'";
            }
            $query .= " ORDER BY id DESC";
            $pengaduan = mysqli_query($conn, $query);

            if (mysqli_num_rows($pengaduan) > 0) {
                $no = 1;
                while ($row = mysqli_fetch_assoc($pengaduan)) {
                    $durasiMenit = $row["durasi_menit"];
                    $hours = floor($durasiMenit / 60);
                    $minutes = $durasiMenit % 60;
                    $durasiFormatted = sprintf("%02d:%02d", $hours, $minutes);
                    echo "<tr>";
                    echo "<td>" . $no . "</td>";
                    echo "<td>" . $row["nama"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["departemen"] . "</td>";
                    echo "<td>" . $row["cabang"] . "</td>";
                    echo "<td>" . $row["kebutuhan"] . "</td>";
                    echo "<td>" . $row["tanggal"] . "</td>";
                    echo "<td>" . $row["penjelasan"] . "</td>";
                    echo "<td>" . $row["lokasi"] . "</td>";
                    echo "<td>" . $row["tgl_kerja"] . "</td>";
                    echo "<td>" . $row["jenis"] . "</td>";
                    echo "<td>" . $row["wkt_mulai"] . "</td>";
                    echo "<td>" . $row["wkt_akhir"] . "</td>";
                    echo "<td>" . $durasiFormatted . "</td>";
                    echo "<td>" . $row["status"] . "</td>";
                    echo "<td>" . $row["pekerja"] . "</td>";
                    echo "</tr>";
                    $no++;
                }
            } else {
                echo "<tr><td colspan='15'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <!-- End Table -->
</body>

</html>

<?php
mysqli_close($conn);
ob_end_flush();
?>