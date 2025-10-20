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
session_start();

if ($_SESSION["Gio"] != True) {
		header("Location: http://localhost:8080/bestpizza/login.php");
		exit;
	}


$id =0;

if(empty($_POST)) {}
    else {
        if (isset($_POST["SaveButton"])) {

        ?>
            <h2><?php echo $_POST["SaveButton"]?></h2>
            <h2><?php echo $_POST["SaveButton"]?></h2>

            <?php
            $ChangeID = $_POST["SaveButton"];

            $stmtMeny = $conn->prepare("UPDATE meny SET namn=?,pris=?,ingredienser=? WHERE id = $ChangeID ");
            


           
        }

         if (isset($_POST["RemoveButton"])) {
       

            ?>

            
            <?php
            $removeId = $_POST["RemoveButton"];

             $stmtMeny = $conn->prepare("DELETE FROM meny WHERE id = $removeId");
             $stmtMeny->execute();

                ?>
            <?php

        }

    if(empty($_POST["namn"]) or empty($_POST["pris"]) or empty($_POST["ingredienser"])) { }
        else {
 
        var_dump($_POST);

        $stmtMeny = $conn->prepare("INSERT INTO meny(namn,pris,ingredienser) VALUES(?,?,?)");
        $stmtMeny->bind_param("sss", $_POST["namn"], $_POST["pris"], $_POST["ingredienser"]);

          $stmtMeny->execute();
        $stmtMeny->close();

        }

        
                if (empty($_POST["Image"]) or empty($_POST["Öppetider"]) or empty($_POST["Kontakt"])) {} 

                else {
                   

        $stmtInfo = $conn->prepare("INSERT INTO info(Image,Öppetider,Kontakt) VALUES(?,?,?)");
        $stmtInfo->bind_param("sss", $_POST["Image"], $_POST["Öppetider"], $_POST["Kontakt"]);

         $stmtInfo->execute();
        $stmtInfo->close();         
       
      
 }
  $conn->close();
        echo  '<a href="http://localhost:8080/bestpizza/public/add.php">Go Back</a> <br />';
         
          
    
    
    }?>
    <form action="" method="POST">
        <h2>Lägg till Pizza: </h2>
        <input type="text" name="namn">
        <input type="text" name="pris">
        <input type="text" name="ingredienser">
        <input type="submit" value="Lägg till">
    </form>




<form>
        <h2>Information: </h2>
        <input type="text" name="info">
        <h2>Meddelande:</h2>
        <input type="text" name="meddelande">
        <input type="submit" value="Spara">
</form>


 <form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload for background:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submitUpload">
</form>


<div>
     <?php include("../conn.php");

 $sqlMeny = "SELECT id, namn, pris, ingredienser FROM meny";
    $resultMeny = $conn->query($sqlMeny);
    if ($resultMeny->num_rows > 0 ) {
        
        while($rowMeny = $resultMeny->fetch_assoc()) { ?>
        
            <h3><?php echo $rowMeny["namn"];?></h3>
            <p><?php echo $rowMeny["id"] ?></p>
            <?php $idPizza = $rowMeny["id"] ?>



    <form action="" method="POST">
            
<input type="text" placeholder="<?php echo $rowMeny["namn"]?>" name="namn">
            <input type="text" placeholder="<?php echo $rowMeny["pris"]?>" name="pris">
            <input type="text" placeholder="<?php echo $rowMeny["ingredienser"]?>" name="ingredienser">

            <button name="SaveButton" type="submit" value="<?= $idPizza ?>"><?php echo "Spara Ändringar";?></button>
            <button name="RemoveButton" type="submit" value="<?= $idPizza ?>"> <?php echo "Ta Bort";?></button>
            <input type="hidden" value=".$rowMeny['id']" name="DeleteInput">
            </form>
            

            <?php
            

        }

    }
    ?>

</div>

</body>
</html>