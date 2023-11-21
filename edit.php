<?php
include 'koneksi.php';

if (isset($_GET['nim'])) {
    $koneksi = koneksiDatabase();

    $nim = $_GET['nim'];

    // Ambil data mahasiswa berdasarkan NIM
    $query = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
    $result = mysqli_query($koneksi, $query);
    $mahasiswa = mysqli_fetch_assoc($result);

    mysqli_close($koneksi);
} else {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Edit Data Mahasiswa</h1>

    <form action="update.php" method="POST">
        <input type="hidden" name="old_nim" value="<?php echo $mahasiswa['nim']; ?>">

        <label for="nim">NIM:</label>
        <input type="text" name="nim" value="<?php echo $mahasiswa['nim']; ?>" required>
        <br>

        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="<?php echo $mahasiswa['nama']; ?>" required>
        <br>

        <label for="program_studi">Program Studi:</label>
        <input type="text" name="program_studi" value="<?php echo $mahasiswa['program_studi']; ?>" required>
        <br>

        <input type="submit" value="Update">
    </form>
</body>
</html>
