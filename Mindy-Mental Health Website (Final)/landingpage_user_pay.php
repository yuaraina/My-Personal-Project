<?php
session_start();
include("koneksi.php");
?>

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

        <div class="container">
            <h3> My Transaction </h3><br>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query = "SELECT * FROM buy where users_id = '" . $_SESSION['id'] . "' ";
                        $hasil = mysqli_query($db_con, $query);
                        while ($row = mysqli_fetch_array($hasil)) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['produk']; ?></td>
                                <td><?php echo $row['harga']; ?></td>
                                <td><?php echo $row['status']; ?></td>
                                <td>
                                    <?php if ($row['status'] == "no") { ?>
                                        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEdit<?php echo $row['id']; ?>"> Pay </a>&nbsp;&nbsp;&nbsp;
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>

                        <!-- modal -->
                        <style>
                            .modal-edit {
                                max-width: 70%;
                            }
                        </style>

                        <?php
                        $no = 1;
                        $query = "SELECT * FROM buy";
                        $hasil = mysqli_query($db_con, $query);
                        while ($row = mysqli_fetch_array($hasil)) {
                        ?>
                            <div class="modal fade" id="modalEdit<?php echo $row['id']; ?>" tabindex="-1">
                                <div class="modal-dialog modal-edit">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"> Invoice </h5>
                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="payment_process.php" method="POST">
                                                <input type="text" name="id" value="<?= $row['id'] ?>" hidden>
                                                <div class="form-group">
                                                    <label for="produk" class="form-label"> Product </label>
                                                    <input type="text" name="produk" class="form-control" id="produk" value="<?= $row['produk'] ?>" readonly required>
                                                </div><br>
                                                <div class="form-group">
                                                    <label for="harga" class="form-label"> Price </label>
                                                    <input type="number" name="harga" class="form-control" id="harga" value="<?= $row['harga'] ?>" readonly required>
                                                </div><br>
                                                <br><br>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancel </button>
                                            <input type="submit" class="btn btn-primary" name="update" value="Pay">
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
                <br> <br><br><br>
            </div>
        </div>

        <section>
            <div class="container">
                <footer class="my-5 pt-5 text-muted text-center text-small py-3 my-4 border-top">
                    <p class="mb-1"> © 2021 Mindy Company, Inc </p>
                </footer>
            </div>
        </section>

</body>

</html>