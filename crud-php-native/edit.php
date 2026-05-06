<?php
require_once 'config/koneksi.php';

$id = $_GET['id'];

// ambil data lama
$query = "SELECT * FROM tb_absensi WHERE id=$id";
$result = $conn->query($query);
$data = $result->fetch_assoc();
?>

<h2>Edit Data Absensi</h2>

<form method="POST">
    <input type="hidden" name="id" value="<?= $data['id']; ?>">

    Nama Siswa:<br>
    <input type="text" name="nama_siswa" value="<?= $data['nama_siswa']; ?>"><br><br>

    Kelas:<br>
    <input type="text" name="kelas" value="<?= $data['kelas']; ?>"><br><br>

    Tanggal:<br>
    <input type="date" name="tanggal" value="<?= $data['tanggal']; ?>"><br><br>

    Status:<br>
    <select name="status">
        <option <?= $data['status']=="Hadir"?"selected":""; ?>>Hadir</option>
        <option <?= $data['status']=="Izin"?"selected":""; ?>>Izin</option>
        <option <?= $data['status']=="Sakit"?"selected":""; ?>>Sakit</option>
        <option <?= $data['status']=="Alpa"?"selected":""; ?>>Alpa</option>
    </select><br><br>

    <button type="submit" name="update">Update</button>
</form>

<?php
if (isset($_POST['update'])) {
    $id         = $_POST['id'];
    $nama_siswa = $_POST['nama_siswa'];
    $kelas      = $_POST['kelas'];
    $tanggal    = $_POST['tanggal'];
    $status     = $_POST['status'];

    $query = "UPDATE tb_absensi 
              SET nama_siswa='$nama_siswa',
                  kelas='$kelas',
                  tanggal='$tanggal',
                  status='$status'
              WHERE id=$id";

    if ($conn->query($query)) {
        header("Location: index.php");
    } else {
        echo "Gagal update: " . $conn->error;
    }
}
?>