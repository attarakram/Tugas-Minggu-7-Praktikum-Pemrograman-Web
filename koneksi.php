<?php
function buatDatabase() {
    $koneksi = mysqli_connect("localhost", "root", "");

    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Buat database 'universitas' jika belum ada
    $query_create_db = "CREATE DATABASE IF NOT EXISTS universitas";
    if (mysqli_query($koneksi, $query_create_db)) {

    } else {
        echo "Error creating database: " . mysqli_error($koneksi) . "<br>";
    }

    mysqli_close($koneksi);
}

function buatTabelMahasiswa() {
    $koneksi = mysqli_connect("localhost", "root", "", "universitas");

    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Buat tabel 'mahasiswa' jika belum ada
    $query_create_table = "CREATE TABLE IF NOT EXISTS mahasiswa (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nim VARCHAR(10) NOT NULL,
        nama VARCHAR(50) NOT NULL,
        program_studi VARCHAR(50) NOT NULL
    )";
    
    if (mysqli_query($koneksi, $query_create_table)) {

    } else {
        echo "Error creating table: " . mysqli_error($koneksi) . "<br>";
    }

    mysqli_close($koneksi);
}

function koneksiDatabase() {
    $koneksi = mysqli_connect("localhost", "root", "", "universitas");

    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    return $koneksi;
}
?>
