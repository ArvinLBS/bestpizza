<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div id="DivBody">

    <div id="Title">
        <h1>GYO'S PIZZA<h1>
</div>
    <?php include("../conn.php");


?>


<?php

    

// $ReulstRow = $resultMeny->fetch_assoc()



    ?>
    <img>


<div>

</div>

<div id="MenyDiv">
    <h1>MENY:</h1>

    <?php
    
    $sqlMeny = "SELECT namn, pris, ingredienser FROM meny";
    $resultMeny = $conn->query($sqlMeny);
    if ($resultMeny->num_rows > 0 ) {
        
        while($rowMeny = $resultMeny->fetch_assoc()) { ?>
            <h3 class="MenySelection"><?php echo $rowMeny["namn"];?></h3>
            <p>
                <?php echo $rowMeny["ingredienser"]; ?>
                
            </p>
<p>

            <span>
                    <?php echo $rowMeny["pris"]; ?>
                </span>
                <img>
</p>
            <?php

        }

    }
    ?>

</div>
</body>
</div>
<footer>
<div>

<h1>KONTAKT</h1>

<h1>ÖPPENTIDER</h1>

<img id="FoodoraImg" src="assets./food.png">

<!-- <?php include("../conn.php");

$sqlinfo = "SELECT info, meddelande FROM info ORDER BY id DESC LIMIT 1";
    $resultinfo = $conn->query($sqlinfo);
    if ($resultinfo->num_rows > 0 ) {
        $row = mysqli_fetch_assoc($resultinfo);
        if (!$row) {} 
        else { ?>

      
        
                
            <h3><?php echo $row["info"];?></h3>
            <p>
                <?php echo $row ["meddelande"]; ?>
                
            </p>

              

            <?php
}

}
?>
 -->

</div>
</footer>
</html>

<!-- <VirtualHost *:8080>
    ServerName default.local
    ServerAlias *.local
    VirtualDocumentRoot "C:/xampp/htdocs/%1/public"
    <Directory "C:/xampp/htdocs">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>



<VirtualHost *:8080>
    ServerName localhost
    DocumentRoot "C:/xampp/htdocs"
    <Directory "C:/xampp/htdocs">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost> -->