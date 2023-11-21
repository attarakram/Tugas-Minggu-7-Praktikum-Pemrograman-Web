<?php
include 'koneksi.php';

if (isset($_GET['nim'])) {
    $koneksi = koneksiDatabase();

    $nim = $_GET['nim'];

    // Hapus data mahasiswa berdasarkan NIM
    $query = "DELETE FROM mahasiswa WHERE nim = '$nim'";
    mysqli_query($koneksi, $query);

    mysqli_close($koneksi);

    header('Location: index.php');
    exit;
} else {
    header('Location: index.php');
    exit;
}
?>
