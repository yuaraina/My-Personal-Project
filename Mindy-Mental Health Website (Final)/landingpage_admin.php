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

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">
                <span data-feather="home"></span>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="landingpage_admin_product.php">
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

        <div class="container-fluid">
          <h3> Company Performance </h3>
          <div id="chart_div" style="width: 100%;height: 500px;"></div>
          <script type="text/javascript">
            google.charts.load('current', {
              'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
              var data = google.visualization.arrayToDataTable([
                ['Year', 'Sales', 'Expenses'],
                ['2018', 1000, 400],
                ['2019', 1170, 460],
                ['2020', 1500, 1120],
                ['2021', 1760, 1250]
              ]);

              var options = {
                hAxis: {
                  title: 'Year',
                  titleTextStyle: {
                    color: '#333'
                  }
                },
                vAxis: {
                  minValue: 0
                }
              };

              var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
              chart.draw(data, options);
            }
          </script>
          <br><br>
        </div>


        <div class="container-fluid">
          <h3> Transaction </h3><br>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">User ID</th>
                  <th scope="col">Product</th>
                  <th scope="col">Price</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $query = "SELECT * FROM buy";
                $hasil = mysqli_query($db_con, $query);
                while ($row = mysqli_fetch_array($hasil)) {
                ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['users_id']; ?></td>
                    <td><?php echo $row['produk']; ?></td>
                    <td><?php echo $row['harga']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td>
                      <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEdit<?php echo $row['id']; ?>"> Update </a>&nbsp;&nbsp;&nbsp;
                      <a href="buy_process.php?id=<?= $row['id'] ?>&action=delete" class="btn btn-danger" name="">
                        Delete
                      </a>
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
                          <h5 class="modal-title"> Update </h5>
                          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="buy_edit.php" method="POST">
                            <input type="text" name="id" value="<?= $row['id'] ?>" hidden>
                            <div class="form-group">
                              <label for="produk" class="form-label"> Product </label>
                              <input type="text" name="produk" class="form-control" id="produk" value="<?= $row['produk'] ?>" required>
                            </div><br>
                            <div class="form-group">
                              <label for="harga" class="form-label"> Price </label>
                              <input type="number" name="harga" class="form-control" id="harga" value="<?= $row['harga'] ?>" required>
                            </div><br>
                            <div class="form-group">
                              <label for="status" class="form-label"> Status </label>
                              <input type="text" name="status" class="form-control" id="status" value="<?= $row['status'] ?>" required>
                            </div><br>
                            <br><br>
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal"> Close </button>
                          <input type="submit" class="btn btn-primary" name="update" value="Update">
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
            <br> <br>
          </div>
      </main>
    </div>
  </div><br><br>
  </div>



  <section>
    <div class="container">
      <footer class="my-4 pt-2 text-muted text-small py-3 my-2">
        <p class="mb-1"> © 2021 Mindy Company, Inc </p>
      </footer>
    </div>
  </section>


</body>

</html>