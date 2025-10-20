<?php

$_ENV = parse_ini_file(__DIR__.'/public/.env');
$_SERVER = $_ENV["DB_HOST"];
$user = $_ENV["DB_USER"];
$pass = $_ENV["DB_PASSWORD"];
$dbname = $_ENV["DB_DATABASE"];

    $conn = mysqli_connect($_SERVER, $user, $pass, $dbname);

    if (!$conn)
        {
        die("Connection failed! " . mysqli_connect_error());

       

    }

     else {
            echo "";
        }
?>