<?php

    $serverName = "localhost:3306";
    $userName = "root";
    $password = "Prasad@321";
    $dbName = "ContactData";

    //create connection
    $conn = mysqli_connect($serverName, $userName, $password, $dbName);

    //Die if connection was not successful
    if(!$conn){
        die("Sorry, We failed to connect :" . mysqli_connect_error());
    }
    else{
        //echo "Connection is successful \n";
    }
?>