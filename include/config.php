<?php
    session_start();

    function dbconnect(){
        include('db_config.php');
        $con = new mysqli($host, $user, $password,$dbname);
        mysqli_set_charset($con, 'utf8');

        if($conn->connect_error){
            die("Connection failed: ".$conn->connect_error);
        }
        
        return $con;
    }