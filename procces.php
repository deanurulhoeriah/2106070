<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'bpjs';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil nilai dari formulir HTML
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];
    $email = $_POST['email'];

    // Menyimpan data ke dalam tabel MySQL
    $sql = "INSERT INTO peserta (nama, nik, jenis_kelamin, alamat, no_telepon, email) 
            VALUES ('$nama', '$nik', '$jenis_kelamin', '$alamat', '$no_telepon', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Pendaftaran berhasil!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
