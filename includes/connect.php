<?php

//$con = mysqli_connect($hostname, $username, $password, $database);

    $con = mysqli_connect('localhost', 'root', '', 'mystore');


// checking database connection
    if($con){
        echo "Connected";
    }
    else{
        echo "No connection to database";
    } 

    
    // if(!$con){
    //     echo "No connection to database";
    //     } 
?>