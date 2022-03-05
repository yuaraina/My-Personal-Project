<?php
session_start();
include_once("koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="login.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title> Welcome to Mindy </title>
</head>

<body>

  <?php if (isset($_SESSION['message'])) :  ?>
    <div class="alert alert-danger alert-dismissible fade show fade in" role="alert">
      <?= $_SESSION['message']; ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php
    unset($_SESSION['message']);
  endif;
  ?>

  <?php if (isset($_SESSION['register'])) :  ?>
    <div class="alert alert-success alert-dismissible fade show fade in" role="alert">
      <?= $_SESSION['register']; ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php
    unset($_SESSION['register']);
  endif;
  ?>

  <div class="container-fluid ps-md-0">
    <div class="row g-0">
      <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
      <div class="col-md-8 col-lg-6">
        <div class="login d-flex align-items-center py-5">
          <div class="container">
            <div class="row">
              <div class="col-md-9 col-lg-8 mx-auto">
                <h1 class="login-heading mb-3">Welcome back to Mindy!</h1><br>

                <!-- Sign In Form -->
                <form action="login_proses.php" enctype="multipart/form-data" method="POST" role="form" class="php-email-form aos-init aos-animate" data-aos="fade-up">
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                    <label for="email">Email address</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <label for="password">Password</label>
                  </div>
                  <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="" id="remember_pass">
                    <label class="form-check-label" for="remember_pass">
                      Remember password
                    </label>
                  </div>
                  <div class="d-grid">
                    <button type="submit" class="btn btn-lg btn-info btn-login fw-normal mb-2"> Sign in</button>
                    <div class="text-center">
                      <a class="small" href="#">Forgot password?</a>
                    </div><br>
                    <div class="text-center ">
                      <a class="small" href="register.php">Don't have account? Register Now!</a>
                    </div>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>