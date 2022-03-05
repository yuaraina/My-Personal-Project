<?php

include_once("koneksi.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="landingpage_admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <title> Mindy Dashboard </title>
</head>

<body>
    <header class="navbar navbar-expand-lg navbar-light sticky-top bg-light flex-md-nowrap p-0 shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="mind.png" width="80" height="60"></a>
            <div class="d-flex align-items-center">
                <form class="w-100 me-3">
                    <input type="search" class="form-control" placeholder="Search" aria-label="Search">
                </form>
                <div class="flex-shrink-0 dropdown">
                    <label for="profile2" class="profile-dropdown">
                        <input type="checkbox" id="profile2">
                        <span></span>
                        <img src="arin.jpg" alt="mdo" width="40" height="40" class="rounded-circle">
                        <label for="profile2"></label>
                        <ul>
                            <li><a href="#">Profile</a></li>
                            <li><a href="#">Settings</a></li>
                            <li><a href="landingpage_anonymous.php">Logout</a></li>
                        </ul>
                    </label>
                </div>
            </div>
        </div>
    </header><br>

    <?php
    session_start();
    if (isset($_SESSION['message'])) :  ?>
        <div class="alert alert-success alert-dismissible fade show fade in" role="alert">
            <?= $_SESSION['message']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    <?php
        unset($_SESSION['message']);
    endif;
    ?>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="landingpage_admin.php">
                                <span data-feather="home"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="landingpage_admin_product.php">
                                <span data-feather="package"></span>
                                Product
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="users"></span>
                                Roles
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="bar-chart-2"></span>
                                Reports
                            </a>
                        </li>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Saved reports</span>
                        <a class="link-secondary" href="#" aria-label="Add a new report">
                            <span data-feather="plus-circle"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text"></span>
                                Current month
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text"></span>
                                Last quarter
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Mindy Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <button id="btnShow" type="button" class="btn btn-sm btn-outline-secondary me-2"> Download </button>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar"></span>
                            This week
                        </button>
                    </div>
                </div><br>
                <!-- manggil icon dari feather -->
                <script>
                    feather.replace()
                </script>

                <!-- modal -->
                <div class="modal fade" tabindex="-1" id="testModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"> Download File </h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p> Do you want to download the data? </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancel </button>
                                <button type="button" class="btn btn-primary" id="btnSave"> Save </button>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    const container = document.getElementById("testModal");
                    const modal = new bootstrap.Modal(container);

                    document.getElementById("btnShow").addEventListener("click", function() {
                        modal.show();
                    });
                    document.getElementById("btnSave").addEventListener("click", function() {
                        modal.hide();
                    });
                </script>

                <h3> Input Product </h3><br>
                <section class="tambah_produk">
                    <div class="container mt-3">
                        <div class="container mt-3 col-md-8">
                            <form action="product_proses.php" enctype="multipart/form-data" method="POST" role="form" class="php-email-form aos-init aos-animate" data-aos="fade-up">
                                <div class="form-group">
                                    <label for="prod_name" class="form-label"><b> Nama Produk </b></label>
                                    <input type="text" name="prod_name" class="form-control" id="prod_name" required="">
                                </div><br>
                                <div class="form-group">
                                    <label for="prod_price" class="form-label"><b> Harga Produk </b></label>
                                    <input type="text" name="prod_price" class="form-control" id="prod_price" value="0" required="">
                                </div><br>
                                <div class="form-group">
                                    <label for="prod_desc" class="form-label"><b> Deskripsi </b></label>
                                    <textarea class="form-control" name="prod_desc" rows="5" required=""></textarea>
                                </div><br>
                                <div class="form-group">
                                    <label for="prod_pic" class="form-label"><b> Gambar </b></label>
                                    <input class="form-control" type="file" id="prod_pic" name="prod_pic">
                                </div><br><br>

                                <div class=" mb-3 d-flex justify-content-center">
                                    <button type="submit" name="submit" class=" w-100 btn btn-secondary btn-lg"> ADD DATA </button>
                                </div>
                            </form><br><br>
                        </div>

                    </div>

                </section><br><br>


                <section>
                    <div class="container">
                        <footer class="my-4 pt-2 text-muted text-small py-3 my-2">
                            <p class="mb-1"> © 2021 Mindy Company, Inc </p>
                        </footer>
                    </div>
                </section>
        </div>
    </div>


</body>

</html>