<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "mindy";

$db_con = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

if (!$db_con) {
  echo "<script>
            alert('failed connect into database')
          </script>";
}
