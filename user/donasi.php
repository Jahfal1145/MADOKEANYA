<?php
session_start();
require '../koneksi.php';

if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit;
}

$id_user = $_SESSION['id_user'];
$username = $email = 'Tidak ditemukan';

// Ambil data user
$query = $mysqli->prepare("SELECT username, email FROM user WHERE id_user = ?");
$query->bind_param("i", $id_user);
$query->execute();
$result = $query->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $username = $user['username'];
    $email = $user['email'];
}

$id_donasi = $_GET['id_donasi'] ?? '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // var_dump($_GET['id_donasi']);
    // die();
    $jumlah = $_POST['jumlah'];
    $id_metode = $_POST['id_metode'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = date("Y-m-d");
    $status = "pending";
    $fotobukti = $_FILES['fotobukti']['name'];
    $tmp_name = $_FILES['fotobukti']['tmp_name'];

    $ext = pathinfo($fotobukti, PATHINFO_EXTENSION);
    $newname = uniqid('bukti_', true) . '.' . $ext;
    $target_dir = "../admin/donasi/fotobukti/";
    $target_file = $target_dir . $newname;

    if (move_uploaded_file($tmp_name, $target_file)) {
        // Simpan ke tabel transaksi
        $stmt = $mysqli->prepare("INSERT INTO transaksi (id_user, jumlah, tanggal, id_metode) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iisi", $id_user, $jumlah, $tanggal, $id_metode);

        if ($stmt->execute()) {
            $id_transaksi = $stmt->insert_id;

            // Simpan ke laporan dengan nama bukti
            $stmt2 = $mysqli->prepare("INSERT INTO laporan (id_transaksi, id_user, id_donasi, deskripsi, tanggal, status, fotobukti) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt2->bind_param("iiissss", $id_transaksi, $id_user, $id_donasi, $deskripsi, $tanggal, $status, $fotobukti);
            $stmt2->execute();
            $stmt2->close();

            // Set session untuk notifikasi sukses
            $_SESSION['donasi_sukses'] = true;

            header("Location: mariberdonasi.php");
            exit;
        } else {
            echo "Gagal menyimpan transaksi: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Gagal mengupload bukti pembayaran.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Donasi</title>
    <link rel="stylesheet" href="../style.css" />
</head>

<body class="berdonasi-body">

    <a href="mariberdonasi.php" class="berdonasi-back-button">Kembali</a>

    <form action="donasi.php?id_donasi=<?= $id_donasi ?>" method="post" enctype="multipart/form-data">
        <div class="berdonasi-container">
            <div class="berdonasi-left">
                <div class="berdonasi-box berdonasi-info">
                    <h3>Informasi Donatur</h3>
                    <p><strong>Email:</strong> <?= htmlspecialchars($email); ?></p>
                    <p><strong>Username:</strong> <?= htmlspecialchars($username); ?></p>
                    <p><strong>ID User:</strong> <?= $id_user; ?></p>
                </div>

                <!-- Kotak baru untuk input bukti pembayaran -->
                <div class="berdonasi-box">
                    <h3>Upload Bukti Pembayaran</h3>
                    <label for="fotobukti" class="berdonasi-upload-label">Pilih File:</label>
                    <input type="file" name="fotobukti" id="fotobukti" class="berdonasi-upload-input" accept="image/*"
                        required>
                </div>
            </div>

            <div class="berdonasi-box">
                <h3>Scan QR Code</h3>
                <img src="Qris.png" alt="QR Code Pembayaran"
                    style="width: 100%; max-width: 300px; display: block; margin: auto;">
                <p style="text-align: center; margin-top: 10px;">Silakan scan QR untuk melakukan pembayaran.</p>
            </div>

            <div class="berdonasi-right">

                <div class="berdonasi-box">
                    <h3>Metode Pembayaran</h3>
                    <select name="id_metode" required>
                        <option value="">-- Pilih Metode --</option>
                        <?php
                        $result = $mysqli->query("SELECT id_pembayaran, nama_metode FROM metode_pembayaran");
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row['id_pembayaran'] . '">' . $row['nama_metode'] . '</option>';
                        }
                        ?>
                    </select>

                    <label for="rupiah_display">Jumlah Donasi</label>
                    <input type="text" id="rupiah_display" placeholder="Rp 0" required>
                    <input type="hidden" name="jumlah" id="rupiah_value">

                    <label for="deskripsi">Deskripsi Donasi</label>
                    <textarea name="deskripsi" rows="3" placeholder="Tuliskan deskripsi donasi..." required></textarea>


                    <button type="submit" class="berdonasi-donasi-button">Bayar Sekarang</button>
                </div>
            </div>
        </div>
    </form>

    <script>
        const displayInput = document.getElementById('rupiah_display');
        const hiddenInput = document.getElementById('rupiah_value');

        function formatRupiah(angka) {
            const number_string = angka.replace(/[^\d]/g, '');
            const sisa = number_string.length % 3;
            let rupiah = number_string.substr(0, sisa);
            const ribuan = number_string.substr(sisa).match(/\d{3}/g);
            if (ribuan) rupiah += (sisa ? '.' : '') + ribuan.join('.');
            return 'Rp ' + rupiah;
        }

        displayInput.addEventListener('keyup', function () {
            const clean = this.value.replace(/[^\d]/g, '');
            this.value = formatRupiah(clean);
            hiddenInput.value = clean;
        });
    </script>

</body>

</html>