<?php
$_ENV = parse_ini_file(__DIR__.'/.env');
$server = $_ENV["DB_HOST"];
$user = $_ENV["DB_USER"];
$pass = $_ENV["DB_PASSWORD"];
$dbname = $_ENV["DB_DATABASE"];


$conn = mysqli_connect($server, $user, $pass);

if ($conn->connect_error) {
    die("Failed Connection". $conn->connect_error);
}

$sql = "CREATE DATABASE $dbname";

if ($conn->query($sql) === TRUE) {
    echo"Created table Sucessfuly";
} else {
    echo"Failed to create table". $conn->error;
}

if (!$conn) {
    echo "database info incorrect!";
    die("Connection Failed". mysqli_connect_error());
} else {
    echo "Connection Found!";
$result = $conn->query( "SHOW TABLES LIKE 'meny'");
if ($result == true) {
    echo "Table already exists!";
} else {
 echo "Table:";

$conn->select_db("{$dbname}");

   $sql = "CREATE TABLE IF NOT EXISTS meny (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    namn VARCHAR(25) NOT NULL,
    ingredienser VARCHAR(65) NOT NULL,
    pris VARCHAR(25) NOT NULL
    )
";


   $sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(25) NOT NULL,
    pass VARCHAR(65) NOT NULL
    )
";


if ($conn->query($sql) === TRUE) {
    echo"Created table Sucessfuly";
} else {
    echo"Failed to create table". $conn->error;
}


$sql = "INSERT INTO meny (namn,ingredienser,pris) VALUES ('Kebab', 'Kebab, pommes och mildsås', '110kr') ";
if ($conn->query($sql) != TRUE) {
    echo "Error: " . $conn->error;
}


}}

$conn->close();

?>