<?php
require_once 'config/koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Absensi</title>
    <style>
        body {
            padding: 150px;
            font-family: Arial, sans-serif;
            display: flex;
            text-align: center;
            background-color: gray;
            justify-content: center;
            align-items: center;
        }
        .card {
            padding: 36px;
            background-color: white;
            border-radius: 10px;
            width: 300px;
            height: 400px;
            justify: center;
            margin: 10px;
            text-align: start;
        }
        .card h2 {
            text-align: center;
        }
        input,select,textarea {
            width: 100%;
            padding: 8px;
            border-radius: 30px;
            margin: 5px 0;
            font-size: 14px;
            outline:none;
        }
        label {
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
<div class="card">
<h2>Tambah Data Absensi</h2>

<form method="POST" action="">
    <label>Nama Siswa</label><br>
    <input type="text" name="nama_siswa" required><br><br>

    <label>Kelas</label><br>
    <input type="text" name="kelas" required><br><br>

    <label>Tanggal</label><br>
    <input type="date" name="tanggal" required><br><br>

    <label>Status</label><br>
    <select name="status" required>
        <option value="Hadir">Hadir</option>
        <option value="Izin">Izin</option>
        <option value="Sakit">Sakit</option>
        <option value="Alpa">Alpa</option>
    </select><br><br>

    <button type="submit" name="simpan">Simpan</button>
</form>
</div>
</body>
</html>

<?php
if (isset($_POST['simpan'])) {
    $nama_siswa = $_POST['nama_siswa'];
    $kelas      = $_POST['kelas'];
    $tanggal    = $_POST['tanggal'];
    $status     = $_POST['status'];

    $query = "INSERT INTO tb_absensi (nama_siswa, kelas, tanggal, status)
              VALUES ('$nama_siswa', '$kelas', '$tanggal', '$status')";

    if ($conn->query($query)) {
        echo "Data berhasil ditambahkan!";
        echo "<br><a href='index.php'>Kembali</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>