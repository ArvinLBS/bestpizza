

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<?php
    require("conn.php");


if(empty($_POST)) {} else { if (empty($_POST["Username"]) or empty($_POST["Password"])) {
} else{
var_dump($_POST);
$EncPassword = password_hash( $_POST["Password"], PASSWORD_BCRYPT);

$StmtAccount = $conn->prepare("INSERT INTO users(username,pass) VALUES(?,?)");
        $StmtAccount->bind_param("ss", $_POST["Username"], $EncPassword);

          $StmtAccount->execute();
        $StmtAccount->close();

}

}


?>


<body>
    <h2>Skapa Konto</h2>
    <form action="" method="POST">
    <label>Namn:</label>
    <input type="text" name="Username">
    <label>Lösenord:</label>
    <input type="password" name="Password">

    <input type="submit" value="Login">
        </form>

</body>
</html>