<?php
  include "config.php";
  $sqlb = mysqli_query($con, "delete from tb_transaksi where id_transaksi='$_GET[id_transaksi]'");
  
  if($sqlb){
  	echo "<script>window.location.href='index.php?module=riwayat-transaksi&success-riwayat-transaksi';</script>";
  }else{
  	echo "<script>window.location.href='index.php?module=riwayat-transaksi&success-riwayat-transaksi';</script>";
  }
