<?php

    $hostname = "localhost"; // Change this to your database server's hostname
    $username = "root"; // Change this to your database username
    $password = ""; // Change this to your database password
    $database = "mystore"; // Change this to your database name

    $con = mysqli_connect($hostname, $username, $password, $database);
    // if($con){
    //     echo "Success";
    // }
    // else{
    //     echo "Failed";
    // }
?>