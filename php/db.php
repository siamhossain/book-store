<?php 

function Createdb(){
    $servername = "localhost";
    $username = "root";
    $password = "2693";
    $dbname = "bookstore";

    $con = mysqli_connect($servername, $username, $password);

    if(!$con){
        die("Connection Failed:".mysqli_connect_error());
    }

    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

    if(mysqli_query($con, $sql)){
        echo "Database Created....!";
    }else{
        echo "Error while creating Database".mysqli_error($con);
    }
}