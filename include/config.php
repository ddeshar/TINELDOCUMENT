<?php
    session_start();

    $host = "localhost"; /* Host name */
    $user = "root"; /* User */
    $password = "mysql"; /* Password */
    $dbname = "php_manual_tinel"; /* Database name */

    $con = mysqli_connect($host, $user, $password,$dbname);
    
    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    mysqli_set_charset( $con, 'utf8');