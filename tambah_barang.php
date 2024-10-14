<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_barang = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['tanggal'];

    // Menyimpan data barang baru ke database
    $stmt = $db->prepare("INSERT INTO barang (nama_barang, kategori, jumlah, tanggal) VALUES (:nama_barang, :kategori, :jumlah, :tanggal)");
    $stmt->bindValue(':nama_barang', $nama_barang);
    $stmt->bindValue(':kategori', $kategori);
    $stmt->bindValue(':jumlah', $jumlah);
    $stmt->bindValue(':tanggal', $tanggal);
    $stmt->execute();

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
    <link rel="stylesheet" href="../inventory_management/style.css">
</head>
<body>
    <div class="container">
        <h1>Tambah Barang</h1>
        <form method="POST">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" required>

            <label>Kategori</label>
            <select name="kategori" required>
                <option value="">Pilih Kategori</option>
                <option value="Elektronik">Elektronik</option>
                <option value="Perabotan">Perabotan</option>
                <option value="Perangkat Cetak">Perangkat Cetak</option>
                <option value="Perangkat Komunikasi">Perangkat Komunikasi</option>
                <option value="Alat Tulis">Alat Tulis</option>
                <option value="Lainnya">Lainnya</option>
            </select>

            <label>Jumlah</label>
            <input type="number" name="jumlah" required>

            <label>Tanggal</label>
            <input type="date" name="tanggal" required>

            <button type="submit" class="btn-save">Simpan</button>
        </form>
        <a href="index.php" class="btn-back">Kembali</a>
    </div>
</body>
</html>
