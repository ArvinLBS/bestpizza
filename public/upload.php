<?php
include("../conn.php");
var_dump($_FILES);
if (empty($_FILES)) {echo "Empty";} 

if (isset($_POST["submitUpload"])) {

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
echo "<br />";
echo $target_file;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$UploadOk = 1;


    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    echo "<br />";
    var_dump($check);
    if ($check !== false) {

        echo "file is an image - " . $check["mime"] . ".";
        $UploadOk = 1;
    } else {
        echo "file is not an image ";
        $UploadOk = 0;
    }

    if (file_exists($target_file)) {
        echo "File already exists";
        $UploadOk = 0;
    }

    if($_FILES["fileToUpload"]["size"] > 800000) {
        echo  "File size is too large!";
        $UploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry only supported file types are: jpg, png, jpeg and gif";
        $UploadOk = 0;
    }

    if ($UploadOk == 1) {

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "File has been uploaded!";
            echo $_FILES["fileToUpload"]["name"];
            $Image = "Image";
            $stmt = $conn -> prepare("UPDATE info SET info=? WHERE type =?");
            $stmt->bind_param("ss", $_FILES["fileToUpload"]["name"], $Image);

            $stmt->execute();
            $stmt->close();
            echo "Updated";


        }
    } else {
        echo "Error uploading file";
    }

}



?>