<?php
include 'config.php';

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get data from form input
$nama = $_POST['nama'];
$merek = $_POST['merek'];
$fuel = $_POST['fuel'];
$passenger = $_POST['passenger'];
$harga = $_POST['harga'];
$transmisi = $_POST['transmisi'];
$asuransi = $_POST['asuransi'];
$service = $_POST['service'];

// SQL query
$sql = "INSERT INTO tb_kendaraan (nama, merek, fuel, passenger, harga, transmisi, asuransi, service)
VALUES ('$nama', '$merek', '$fuel', '$passenger', '$harga', '$transmisi', '$asuransi', '$service')";

// Execute query
if (mysqli_query($con, $sql)) {
    echo "<script>window.location.href='index.php?module=data-kendaraan&success-kendaraan';</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

// Close connection
mysqli_close($con);
