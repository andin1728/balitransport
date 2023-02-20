<?php
include 'config.php';

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get data from form input
// Get the current timestamp
$timestamp = time();
// Generate a unique ID using the timestamp and the uniqid function
$id_faktur = uniqid($timestamp);
// Extract the first 10 characters of the ID
$id_faktur = substr($id_faktur, 0, 8);
$id_kendaraan = $_POST['id_kendaraan'];
$no_ktp = $_POST['no_ktp'];
$nama_penyewa = $_POST['nama_penyewa'];
$email_penyewa = $_POST['email_penyewa'];
$no_hp = $_POST['no_hp'];
$tanggal_mulai = $_POST['tanggal_mulai'];
$tanggal_selesai = $_POST['tanggal_selesai'];
$durasi_sewa = $_POST['durasi_sewa'];
$total_harga = $_POST['total_harga'];
$status = $_POST['status'];

// SQL query
$sql = "INSERT INTO tb_transaksi (id_faktur, id_kendaraan, no_ktp, nama_penyewa, email_penyewa, no_hp, tanggal_mulai, tanggal_selesai, durasi_sewa, total_harga, status)
VALUES ('$id_faktur', '$id_kendaraan', '$no_ktp', '$nama_penyewa', '$email_penyewa', '$no_hp', '$tanggal_mulai', '$tanggal_selesai', '$durasi_sewa', '$total_harga', '$status')";

// Execute query
if (mysqli_query($con, $sql)) {
    echo "<script>window.location.href='index.php?module=transaksi&success-Transaksi';</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

// Close connection
mysqli_close($con);
