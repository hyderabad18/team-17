<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$uploadOk = 1;
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

if($_FILES["fileToUpload"]["size"] > 50000000 and $uploadOk ==1 ){
    echo "sorry file size exceeds 50MB";
    $uploadOk = 0;
}

if($uploadOk == 1){
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
} else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>