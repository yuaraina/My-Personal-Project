<?php
include("koneksi.php");

$id = $_POST['id'];
$produk = $_POST['produk'];
$harga = $_POST['harga'];

// echo $id;
// echo $produk;
// echo $harga;

$result = mysqli_query($db_con, "UPDATE buy SET status = 'yes' WHERE id = $id;");
header("location:landingpage_user.php");
