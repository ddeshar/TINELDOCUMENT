<?php
    session_start();

    function dbconnect(){
        include('db_config.php');
        $con = new mysqli($host, $user, $password,$dbname);
        mysqli_set_charset($con,"utf8");

        if($con->connect_error){
            die("Connection failed: ".$con->connect_error);
        }
        
        return $con;
    }