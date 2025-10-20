<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
require("../conn.php");


if(empty($_POST)) {}
    else {

        if (empty($_POST["dbname"] or empty($_POST["host"] or empty($_POST["user"]) or empty($_POST["password"])))) {} else {
        var_dump($_POST);

        $content = "";
        $env = [
            'DB_HOST'=>$_POST["host"],
            'DB_PORT'=>'3306',
            'DB_DATABASE'=>$_POST["dbname"],
            'DB_USER'=>$_POST["user"],
            'DB_PASSWORD'=>$_POST["password"],
        ];

        foreach ($env as $key => $value) { 
            $content .= "{$key}={$value}\n";
        }

        $file= __DIR__.'/.env';
        if (file_put_contents($file, $content)) {
            echo ".env file created sucessfully at {$file}";
            echo "Test: {$content}";
        } else {
            echo "Error creating .env file";
        }


        }
    }
?>


 <form action="" method="POST">
        <h2>Databas: </h2>
        <p>DB Name</p>
        <input type="text" name="dbname">
        <p>Host</p>

        <input type="text" name="host">
        <p>User</p>

        <input type="text" name="user">
        <p>pass</p>

        <input type="text" name="password">

         <p>username</p>

        <input type="text" name="username">
        <p>Password</p>

        <input type="password" name="userpassword">

        <input type="submit" value="Skapa">
    </form>



</body>
</html>