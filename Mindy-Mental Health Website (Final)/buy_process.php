<?php
include("koneksi.php");

if (isset($_POST['buy'])) {
    $user_id = $_POST['user_id'];
    $produk = $_POST['produk'];
    $harga = $_POST['harga'];

    $sql = "INSERT INTO buy(users_id, produk, harga)
            VALUES($user_id, '$produk', $harga)";
    $query = mysqli_query($db_con, $sql);

    session_start();
    $_SESSION['message'] = 'Pembelianmu telah berhasil!';
    header("location: landingpage_user_pay.php");
};

// delete
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'delete') {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $sql = "DELETE FROM buy WHERE id= '$id'";
            $query = mysqli_query($db_con, $sql);

            session_start();
            $_SESSION['message'] = 'Berhasil Dihapus';
            header("location: landingpage_admin.php");
        };
    }
}
