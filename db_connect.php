<?php
    // Access the database
    $dbdrive = "dbMysql";
    $servername = "localhost";
    $username = "root";
    $password = "a1GiLH@6J8Eu";
    $db_name = "cash";

    $connect = mysqli_connect($servername, $username, $password, $db_name);
    mysqli_set_charset($connect, "utf8");
