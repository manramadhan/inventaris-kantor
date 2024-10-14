<?php
include 'db.php';

$id = $_GET['id'];
$result = $db->query("SELECT * FROM barang WHERE id=$id");
$row = $result->fetchArray();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_barang = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['tanggal'];

    // Mengupdate data barang
    $stmt = $db->prepare("UPDATE barang SET nama_barang=:nama_barang, kategori=:kategori, jumlah=:jumlah, tanggal=:tanggal WHERE id=:id");
    $stmt->bindValue(':nama_barang', $nama_barang);
    $stmt->bindValue(':kategori', $kategori);
    $stmt->bindValue(':jumlah', $jumlah);
    $stmt->bindValue(':tanggal', $tanggal);
    $stmt->bindValue(':id', $id);
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
    <title>Edit Barang</title>
    <link rel="stylesheet" href="../inventory_management/style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Barang</h1>
        <form method="POST">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" value="<?= htmlspecialchars($row['nama_barang']) ?>" required>

            <label>Kategori</label>
            <input type="text" name="kategori" value="<?= htmlspecialchars($row['kategori']) ?>" required>

            <label>Jumlah</label>
            <input type="number" name="jumlah" value="<?= htmlspecialchars($row['jumlah']) ?>" required>

            <label>Tanggal</label>
            <input type="date" name="tanggal" value="<?= htmlspecialchars($row['tanggal']) ?>" required>

            <button type="submit" class="btn-save">Simpan</button>
        </form>
        <a href="index.php" class="btn-back">Kembali</a>
    </div>
</body>
</html>
