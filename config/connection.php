<?php
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "cetakin_id";

    $koneksi = mysqli_connect($serverName, $userName, $password, $dbName);

    if(!$koneksi){
        die ("koneksi gagal".mysqli_connect_error());
    }