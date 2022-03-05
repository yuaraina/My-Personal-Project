<?php
include("koneksi.php");

$id = $_POST['id'];
$produk = $_POST['produk'];
$harga = $_POST['harga'];

// echo $id;
// echo $produk;
// echo $harga;

$result = mysqli_query($db_con, "UPDATE buy SET produk = '$produk', harga = $harga WHERE id = $id;");

session_start();
$_SESSION['message'] = 'Berhasil Update';
header("location:landingpage_admin.php");
