<?php
session_start();

if(empty($_POST)) {} else { if (empty($_POST["Username"]) or empty($_POST["Password"])) {
} else{
var_dump($_POST);
    $PasswordHash = password_hash( $_POST["Password"], PASSWORD_BCRYPT);
echo $PasswordHash;

$verify = password_verify($_POST["Password"], $PasswordHash);
if($PasswordHash == $PasswordHash) {
		$_SESSION["Gio"] = True;
        echo"Hello gio!";
}
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
    <label>Name:</label>
    <input type="text" name="Username">
    <label>Password:</label>
    <input type="password" name="Password">

    <input type="submit" value="Login">
        </form>

</body>
</html>