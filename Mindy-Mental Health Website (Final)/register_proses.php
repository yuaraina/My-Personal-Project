<?php

include("koneksi.php");

$nama = $_POST['nama'];
$email = $_POST['email'];
$password =  $_POST['password'];
$password_confirm = $_POST['password_confirm'];
$phone = $_POST['phone'];

$email_cek = "SELECT email FROM user WHERE email= '$email' ";
$select = mysqli_query($db_con, $email_cek);

if (!mysqli_fetch_assoc($select)) {
    if ($password == $password_confirm) {
        $password = password_hash($password, PASSWORD_DEFAULT);

        print_r(mysqli_fetch_assoc($select));

        $query = "INSERT INTO user (nama, email, password, phone) VALUES ('$nama', '$email', '$password', '$phone')";
        mysqli_query($db_con, $query);

        session_start();
        $_SESSION['register'] = 'Berhasil registrasi, silahkan login';

        header("Location: login.php");
        exit();
    }
}
session_start();
$_SESSION['message'] = 'Email anda sudah pernah terdaftar!';

header("Location: register.php");

exit();
