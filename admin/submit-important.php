<?php
include 'config.php';

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get data from form input
$id_info = $_POST['id_info'];
$b_book = $_POST['b_book'];
$a_book = $_POST['a_book'];
$d_pick = $_POST['d_pick'];

// SQL query
$sql = "UPDATE tb_info
SET b_book='$b_book', a_book='$a_book', d_pick='$d_pick'
WHERE id_info='$id_info'";

// Execute query
if (mysqli_query($con, $sql)) {
    echo "<script>window.location.href='index.php?module=important-info&success-Important';</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

// Close connection
mysqli_close($con);
