<?php
include 'koneksi.php';

buatDatabase();
buatTabelMahasiswa();

// Koneksi ke database
$koneksi = koneksiDatabase();

// Fungsi untuk mendapatkan data mahasiswa
function getMahasiswa($koneksi, $program_studi = null) {
    $filter = $program_studi ? "WHERE program_studi = '$program_studi'" : "";
    $query = "SELECT * FROM mahasiswa $filter";
    $result = mysqli_query($koneksi, $query);

    $mahasiswa = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $mahasiswa[] = $row;
    }

    return $mahasiswa;
}

// Tampilkan data mahasiswa
$program_studi = isset($_GET['filter']) ? $_GET['filter'] : null;
$mahasiswa = getMahasiswa($koneksi, $program_studi);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <br><br>
    <!-- Form tambah data -->
    <h1>Tambah Mahasiswa</h1>
    <form action="tambah.php" method="POST">
        <label for="nim">NIM:</label>
        <input type="text" name="nim" required>
        <br>
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required>
        <br>
        <label for="program_studi">Program Studi:</label>
        <input type="text" name="program_studi" required>
        <br>
        <input type="submit" value="Tambah">
    </form>

    <h1>Data Mahasiswa</h1>

    <?php
    // Form filter
    echo '<form action="" method="GET">';
    echo '<label for="filter">Filter Program Studi: </label>';
    echo '<select name="filter" id="filter">';
    echo '<option value="">-- Pilih Prodi --</option>';
    
    // Ambil daftar program studi dari database
    $query_program_studi = "SELECT DISTINCT program_studi FROM mahasiswa";
    $result_program_studi = mysqli_query($koneksi, $query_program_studi);
    while ($row_program_studi = mysqli_fetch_assoc($result_program_studi)) {
        $selected = ($program_studi == $row_program_studi['program_studi']) ? 'selected' : '';
        echo "<option value='{$row_program_studi['program_studi']}' $selected>{$row_program_studi['program_studi']}</option>";
    }
    echo '</select>';
    echo '<br><br>';
    echo '<input type="submit" value="Filter">';
    echo '</form>';

    mysqli_close($koneksi);
    
    // Tampilan data mahasiswa
    if (!empty($mahasiswa)) {
        echo '<table border="1">';
        echo '<tr><th>NIM</th><th>Nama</th><th>Program Studi</th><th>Aksi</th></tr>';
        foreach ($mahasiswa as $mhs) {
            echo "<tr>
                    <td>{$mhs['nim']}</td>
                    <td>{$mhs['nama']}</td>
                    <td>{$mhs['program_studi']}</td>
                    <td>
                        <a href='edit.php?nim={$mhs['nim']}'>Edit</a> |
                        <a href='hapus.php?nim={$mhs['nim']}'>Hapus</a>
                    </td>
                  </tr>";
        }
        echo '</table>';
    } else {
        echo 'Tidak ada data mahasiswa.';
    }

    ?>

</body>
</html>
