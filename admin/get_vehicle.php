<?php 
  include "config.php";

  if(isset($_POST["search"])) {
    $search = $_POST["search"];
    $query = "SELECT nama, harga FROM tb_kendaraan WHERE nama LIKE '%$search%'";
    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_array($result)) {
        echo '<option value="'.$row["nama"].'">'.$row["nama"] . ' - Rp. ' . number_format($row["harga"]) . '</option>';
      }
    } else {
      echo '<option value="">Tidak Ada Kendaraan</option>';
    }
  }
?>