<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $koneksi = koneksiDatabase();

    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $program_studi = $_POST['program_studi'];

    // Tambahkan data mahasiswa
    $query = "INSERT INTO mahasiswa (nim, nama, program_studi) VALUES ('$nim', '$nama', '$program_studi')";
    mysqli_query($koneksi, $query);

    mysqli_close($koneksi);

    header('Location: index.php');
    exit;
} else {
    header('Location: index.php');
    exit;
}
?>
