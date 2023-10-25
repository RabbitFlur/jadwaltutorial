<?php
// Import konfigurasi database
require_once "../config/koneksi.php";

// Fungsi untuk melakukan pencarian data berdasarkan NIM
function searchByNIM($nim) {
    global $conn; // Gunakan koneksi yang telah diimpor

    // Lindungi dari SQL injection
    $nim = mysqli_real_escape_string($conn, $nim);

    // Lakukan query pencarian
    $query = "SELECT * FROM jadwal WHERE nim = '$nim'";
    $result = $conn->query($query);

    // Membuat tampilan hasil pencarian
    $output = "";

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Ambil baris pertama
        $output .= '<div class="student-info-table">
                        <table>
                            <tr>
                                <th>NIM</th>
                                <td>' . $nim . '</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>' . $row["nama"] . '</td>
                            </tr>
                        </table>
                    </div>';

        
        $output .= '<div class="table-responsive">
                    <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Kode MK</th>
                            <th>Tanggal Mulai</th>
                            <th>Hari</th>
                            <th>Jam</th>
                            <th>Nama MK</th>
                            <th>Tutor</th>
                            <th>Lokasi / Link</th>
                        </tr>
                    </thead>
                    <tbody>';

        do {
            // Deteksi dan olah link pada kolom "link_lokasi"
            $link_lokasi = $row["link_lokasi"];
            if (filter_var($link_lokasi, FILTER_VALIDATE_URL)) {
                $link_lokasi = '<a href="' . $link_lokasi . '" target="_blank">' . $link_lokasi . '</a>';
            } else {
                $link_lokasi = htmlspecialchars($link_lokasi);
            }

            // Tampilkan data dalam tabel
            $output .= '<tr>
                            <td><strong>' . $row["kode_mk"] . '</strong></td>
                            <td>' . $row["tgl_mulai"] . '</td>
                            <td>' . $row["hari"] . '</td>
                            <td>' . $row["jam"] . '</td>
                            <td>' . $row["nama_mk"] . '</td>
                            <td>' . $row["tutor"] . '</td>
                            <td><strong>' . $link_lokasi . '</strong></td>
                        </tr>';
        } while ($row = $result->fetch_assoc());

        $output .= '</table>';
    } else {
        $output = "Tidak ada hasil yang ditemukan.";
    }

    return $output;
}

// Cek apakah permintaan dikirim melalui metode POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["searchNIM"])) {
        $nim = $_POST["searchNIM"];
        $searchResult = searchByNIM($nim);
        echo $searchResult;
    }
}
?>
