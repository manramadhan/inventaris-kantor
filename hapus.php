<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Menghapus barang dari database
    $stmt = $db->prepare("DELETE FROM barang WHERE id = :id");
    $stmt->bindValue(':id', $id);
    $stmt->execute();
}

// Redirect kembali ke halaman index
header("Location: index.php");
exit;
?>
