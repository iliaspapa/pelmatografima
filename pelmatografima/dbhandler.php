<?php
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = '';
    $dbName ="pelmatografima";
    $connection = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName); 
    $query = "SET NAMES 'UTF8';";
    mysqli_query($connection,$query);       