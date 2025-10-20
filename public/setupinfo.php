<?php
require_once("../conn.php");

$sql = "CREATE TABLE IF NOT EXISTS info (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(50) NOT NULL,
    info VARCHAR(300) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'info' created successfully.<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "INSERT INTO info (type, info) VALUES ('Image', '')";
if ($conn->query($sql) != TRUE) {
    echo "Error: " . $conn->error;
}

$sql = "INSERT INTO info (type, info) VALUES ('Öppetider', '')";
if ($conn->query($sql) != TRUE) {
    echo "Error: " . $conn->error;
}

$sql = "INSERT INTO info (type, info) VALUES ('Kontakt', '')";
if ($conn->query($sql) != TRUE) {
    echo "Error: " . $conn->error;
}

$conn->close();
?>