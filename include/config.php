<?php
    session_start();

    function dbconnect(){
        $host = "localhost"; /* Host name */
        $user = "root"; /* User */
        $password = "mysql"; /* Password */
        $dbname = "php_manual_tinel"; /* Database name */

        $con = new mysqli($host, $user, $password,$dbname);
        mysqli_set_charset($con, 'utf8');

        if($conn->connect_error){
            die("Connection failed: ".$conn->connect_error);
        }
        
        return $con;
    }