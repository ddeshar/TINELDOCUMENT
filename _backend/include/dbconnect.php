<?php
  include('./../include/db_config.php');

  $conn = mysqli_connect($host, $user, $password,$dbname);

  if (mysqli_connect_errno()) {
    echo "ไม่สามารถติดต่อฐานข้อมูล mysql ได้". mysqli_connect_error();
  }
  mysqli_set_charset($conn, 'utf8');
