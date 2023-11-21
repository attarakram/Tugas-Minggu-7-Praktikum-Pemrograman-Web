<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $koneksi = koneksiDatabase();

    $old_nim = $_POST['old_nim'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $program_studi = $_POST['program_studi'];

    // Update data mahasiswa berdasarkan NIM
    $query = "UPDATE mahasiswa SET nim = '$nim', nama = '$nama', program_studi = '$program_studi' WHERE nim = '$old_nim'";
    mysqli_query($koneksi, $query);

    mysqli_close($koneksi);

    header('Location: index.php');
    exit;
} else {
    header('Location: index.php');
    exit;
}
?>
