<?php
include("koneksi.php");

if (isset($_POST['submit'])) {
    $prod_name = $_POST['prod_name'];
    $prod_price = $_POST['prod_price'];
    $prod_desc = $_POST['prod_desc'];

    //ini buat upload image
    $rand = rand(); //membuat random karakter untuk penamaan file
    $ekstensi =  array('png', 'jpg', 'jpeg', 'gif'); //ini untuk extensi yang diperbolehkan
    $filename = $_FILES['prod_pic']['name']; // ini menangkap file upload yg dikirimkan dari form
    $ukuran = $_FILES['prod_pic']['size']; // ukuran file upload
    $ukuran_maksimal = 1044070; //1 mb

    $random_filename = '';
    //cek terlebih dahulu apakah ada file yg diupload
    if (isset($_FILES['prod_pic']['tmp_name'])) {
        if ($ukuran > $ukuran_maksimal) {
            echo 'ukuran melebihi batas maksimal';
            die();
        } else {
            $random_filename = $rand . '_' . $filename;
            $upload_file = move_uploaded_file($_FILES['prod_pic']['tmp_name'], 'upload/prod/' . $random_filename);
        }
    }


    //selesai upload image
    $sql = "INSERT INTO product (prod_name, prod_price, prod_desc, prod_pic)
            VALUES('$prod_name', '$prod_price', '$prod_desc', '$random_filename')";
    $query = mysqli_query($db_con, $sql);
    $last_id = mysqli_insert_id($db_con);

    session_start();
    $_SESSION['message'] = 'Produk berhasil ditambahkan!';

    header("location:landingpage_admin.php");
};
