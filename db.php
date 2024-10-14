<?php
$db = new SQLite3('inventaris_barang.db');

$db->query("CREATE TABLE IF NOT EXISTS barang (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nama_barang TEXT NOT NULL,
    kategori TEXT NOT NULL,
    jumlah INTEGER NOT NULL,
    tanggal DATE NOT NULL
)");
?>