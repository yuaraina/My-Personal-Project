<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="landingpage_user_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>

    <title> Mindy </title>
</head>

<body>
    <section id="home" class="home">
        <nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light flex-md-nowrap p-0 shadow">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="mind.png" width="80" height="60"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="#home"> Overview </a>
                        <a class="nav-link" href="#service"> Service </a>
                        <a class="nav-link" href="#whyus"> Why US </a>
                        <a class="nav-link" href="#price"> Pricing </a>
                        <a class="nav-link" href="#contact"> Contact </a>
                    </div>
                </div>
                <div class="flex-shrink-0 dropdown">
                    <label for="profile2" class="profile-dropdown">
                        <input type="checkbox" id="profile2">
                        <span></span>
                        <img src="arin.jpg" alt="mdo" width="40" height="40" class="rounded-circle">
                        <label for="profile2"></label>
                        <ul>
                            <li><a href="landingpage_user.php">Dashboard</a></li>
                            <li><a href="landingpage_user_pay.php">Transaction</a></li>
                            <li><a href="#">Settings</a></li>
                            <li><a href="login.php">Logout</a></li>
                        </ul>
                    </label>
                </div>
            </div>
        </nav><br>

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

        <section id="about" class="d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1 aos-init aos-animate" data-aos="fade-up">
                        <div>
                            <h2><b> Mindy </b></h2> <br>
                            <h2> Your mental health is our priority. Online counseling and meditation are easier anywhere and anytime. You deserve to live happily!</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 d-lg-flex flex-lg-column align-items-stretch order-1 order-lg-2 hero-img aos-init aos-animate" data-aos="fade-up">
                        <img src="meditation.jpg" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </section><br>

        <section class="jumbotron text-center">
            <div class="container">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/AcV10oWZMzU" width="600" height="280" allowfullscreen=""></iframe>
                </div><br>
                <h3 class="display-6"> Together We Can, We Will </h3>
            </div>
        </section><br><br>
    </section>

    <section id="service" class="service">
        <div class="album py-5 bg-light">

            <?php
            include("koneksi.php");
            $query = "SELECT * FROM product";
            $hasil = mysqli_query($db_con, $query);

            ?>

            <div class="container">
                <h2> Our Service </h2><br><br>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php while ($row = mysqli_fetch_array($hasil)) { ?>
                        <div class="col">
                            <div class="card shadow-sm">
                                <img src="upload/prod/<?= $row['prod_pic'] ?>" class="card-img-top" alt="images">
                                <div class="card-body">
                                    <h4><?= $row['prod_name'] ?></h4>
                                    <p class="card-text"> <i> Start from Rp <?= $row['prod_price'] ?> </i></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                    </div>
                                    <button id="btnShowCounsel" onclick="getdetails('<?= $row['prod_desc'] ?>')" type="button" class="btn btn-secondary">View details »</button>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section><br><br>

    <section id="whyus" class="whyus">
        <div class="container marketing">
            <h2> Why Choose Us? </h2><br><br>
            <div class="row">
                <div class="col-lg-4">
                    <h1> +100.000 </h1>
                    <p>Users are more mentally healthy</p>
                </div>
                <div class="col-lg-4">
                    <h1> 100% </h1>
                    <p>Mindy online psychologist has an official license from the Indonesian Psychological Association</p>
                </div>
                <div class="col-lg-4">
                    <h1> 80% </h1>
                    <p> Users are mentally healthier with Mindy</p>
                </div>
            </div>
        </div><br><br>
    </section><br><br>

    <section id="price" class="price">
        <div class="container">
            <section class="miri-ui-kit-section"><br><br>
                <h2 class="mb-4"> Our Pricing </h2>
                <div class="row">

                    <div class="col-md-4">
                        <div class="card pricing-card">
                            <div class="card-body text-center px-5 py-4">
                                <span class="pricing-card-icon rounded-circle mb-4">
                                    <i class="mdi mdi-flag-outline"></i>
                                </span>
                                <p class="mb-2"><span class="h2">Rp 80.000</span>/Month</p>
                                <p class="h5 mb-4"> Starter Plan</p>
                                <ul class="list-group list-group-flush mb-4">
                                    <li class="list-group-item font-weight-light border-top-0"> Counseling </li>
                                    <li class="list-group-item font-weight-light"> No Meditation </li>
                                    <li class="list-group-item font-weight-light border-bottom-0"> No Listening </li>
                                </ul>
                                <p><a class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modal_start"> Buy Now </a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card pricing-card">
                            <div class="card-body text-center px-5 py-4">
                                <span class="pricing-card-icon rounded-circle mb-4">
                                    <i class="mdi mdi-ring"></i>
                                </span>
                                <p class="mb-2"><span class="h2"> Rp 500.000 </span>/3 Month</p>
                                <p class="h5 mb-4"> Medium Plan</p>
                                <ul class="list-group list-group-flush mb-4">
                                    <li class="list-group-item font-weight-light border-top-0"> Counseling </li>
                                    <li class="list-group-item font-weight-light"> Meditation </li>
                                    <li class="list-group-item font-weight-light border-bottom-0"> No Listening </li>
                                </ul>
                                <p><a class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modal_medium"> Buy Now </a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card pricing-card">
                            <div class="card-body text-center px-5 py-4">
                                <span class="pricing-card-icon rounded-circle mb-4">
                                    <i class="mdi mdi-ring"></i>
                                </span>
                                <p class="mb-2"><span class="h2">Rp 1.000.000 </span>/ 1 Year </p>
                                <p class="h5 mb-4"> Pro Plan</p>
                                <ul class="list-group list-group-flush mb-4">
                                    <li class="list-group-item font-weight-light border-top-0"> Counseling </li>
                                    <li class="list-group-item font-weight-light">Meditation</li>
                                    <li class="list-group-item font-weight-light border-bottom-0"> Listening </li>
                                </ul>
                                <p><a class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modal_pro"> Buy Now </a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div><br><br>
    </section>


    <!-- modal buy  -->
    <style>
        .modal-edit {
            max-width: 70%;
        }
    </style>
    <div class="modal fade" id="modal_start" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog modal-edit">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Product </h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="buy_process.php" method="POST" role="form" class="php-email-form aos-init aos-animate" data-aos="fade-up">
                    <input type="hidden" name="user_id" class="form-control" value="<?= $_SESSION['id'] ?>">
                    <input type="hidden" name="produk" class="form-control" value="Starter Plan">
                    <input type="hidden" name="harga" class="form-control" value="80000">
                    <div class="modal-body">
                        <p>Are you sure you want to buy this product?</p>
                    </div><br>

                    <div class="modal-footer">
                        <button id="btnClose" type="button" class="btn btn-secondary" data-dismiss="modal"> Close </button>
                        <button id="btnShowStart" type="submit" class="btn btn-primary" name="buy"> Buy </button>
                    </div>
                </form><br><br>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_medium" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog modal-edit">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Product </h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="buy_process.php" method="POST" role="form" class="php-email-form aos-init aos-animate" data-aos="fade-up">
                    <input type="hidden" name="user_id" class="form-control" value="<?= $_SESSION['id'] ?>">
                    <input type="hidden" name="produk" class="form-control" value="Medium Plan">
                    <input type="hidden" name="harga" class="form-control" value="500000">
                    <div class="modal-body">
                        <p>Are you sure you want to buy this product?</p>
                    </div><br>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Close </button>
                        <button id="btnShowMedium" type="submit" class="btn btn-primary" name="buy"> Buy </button>
                    </div>
                </form><br><br>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_pro" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog modal-edit">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Product </h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="buy_process.php" method="POST" role="form" class="php-email-form aos-init aos-animate" data-aos="fade-up">
                    <input type="hidden" name="user_id" class="form-control" value="<?= $_SESSION['id'] ?>">
                    <input type="hidden" name="produk" class="form-control" value="Pro Plan">
                    <input type="hidden" name="harga" class="form-control" value="1000000">
                    <div class="modal-body">
                        <p>Are you sure you want to buy this product?</p>
                    </div><br>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Close </button>
                        <button id="btnShowPro" type="submit" class="btn btn-primary" name="buy"> Buy </button>
                    </div>
                </form><br><br>
            </div>
        </div>
    </div>

    <script>
        const containerStart = document.getElementById("modal_start");
        const modalStart = new bootstrap.Modal(containerStart);

        document.getElementById("btnShowStart").addEventListener("click", function() {
            modalStart.show();
        });

        const containerMedium = document.getElementById("modal_medium");
        const modalMedium = new bootstrap.Modal(containerMedium);

        document.getElementById("btnShowMedium").addEventListener("click", function() {
            modalMedium.show();
        });

        const containerPro = document.getElementById("modal_pro");
        const modalPro = new bootstrap.Modal(containerPro);

        document.getElementById("btnShowPro").addEventListener("click", function() {
            modalPro.show();
        });
    </script>

    <!-- modal details  -->
    <style>
        .modal-edit {
            max-width: 40%;
        }
    </style>
    <div class="modal fade" tabindex="-1" id="modal_counsel" tabindex="-1">
        <div class="modal-dialog modal-edit">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Details </h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="content">

                    </div>

                </div>
                <br><br>
            </div>
        </div>
    </div>

    <script>
        function getdetails(description) {
            const containerCounselling = document.getElementById("modal_counsel");
            const modalCounselling = new bootstrap.Modal(containerCounselling);
            modalCounselling.show();
            document.getElementById("content").innerHTML = description;
        }
    </script>

    <section id="contact" class="contact"> <br><br>
        <div class="container aos-init aos-animate" data-aos="fade-up">
            <div class="section-title">
                <h2>Contact Us</h2>
            </div><br>

            <div class="row">
                <div class="col-lg-6">
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=550&amp;height=400&amp;hl=en&amp;q=gema pesona depok&amp;t=&amp;z=16&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
                            </iframe>
                            <a href="https://www.fnfgo.com/">FNF Online Mods</a>
                        </div>
                        <style>
                            .mapouter {
                                position: relative;
                                text-align: right;
                                width: 550px;
                                height: 400px;
                            }

                            .gmap_canvas {
                                overflow: hidden;
                                background: none !important;
                                width: 550px;
                                height: 400px;
                            }

                            .gmap_iframe {
                                width: 550px !important;
                                height: 400px !important;
                            }
                        </style>
                    </div>
                </div>

                <div class="col-lg-6">
                    <form action="#" method="post" role="form" class="php-email-form aos-init aos-animate" data-aos="fade-up">
                        <div class="form-group">
                            <input placeholder="Your Name" type="text" name="name" class="form-control" id="name" required="">
                        </div>
                        <div class="form-group mt-3">
                            <input placeholder="Your Email" type="email" class="form-control" name="email" id="email" required="">
                        </div>
                        <div class="form-group mt-3">
                            <input placeholder="Subject" type="text" class="form-control" name="subject" id="subject" required="">
                        </div>
                        <div class="form-group mt-3">
                            <textarea placeholder="Message" class="form-control" name="message" rows="5" required=""></textarea>
                        </div><br>
                        <div class="text-center">
                            <a href="#" type="button" class="btn btn-secondary"> Submit </a>
                        </div>
                    </form>
                </div>
            </div>
    </section>

    <section>
        <div class="container">
            <footer class="my-5 pt-5 text-muted text-center text-small py-3 my-4 border-top">
                <p class="mb-1"> © 2021 Mindy Company, Inc </p>
            </footer>
        </div>
    </section>

</body>

</html>