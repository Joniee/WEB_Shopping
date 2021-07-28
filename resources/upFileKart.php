<?php


$target_dir = $GLOBALS['dir']."/uploads/products/";
$target_name = hash('sha256', basename($_FILES["fileToUpload"]["name"]));
$target_file = $target_dir . $target_name . '.' . strtolower(pathinfo(basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION));
$directory = '/uploads/products/' . $target_name . '.' . strtolower(pathinfo(basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION));
$upload = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
if(file_exists($target_file)){
    echo "Sorry, file already exists.";
    $upload = 0;
}

if($_FILES["fileToUpload"]["size"] > 500000){
    echo "Your file is too large.";
    $upload = 0;
}
if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false){
        echo "File is an image - " . $check["mime"] . ".";
        $upload = 1;
    }
    else{
        echo "File is not an image.";
        $upload = 0;
    }
}
if($upload == 0){
    echo "Your file was not uploaded.";
}
else{
    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
        echo "<script>
    alert(File" . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.)
     </script>";
    }
    else{
        echo "There was an error uploading your file.";
    }
}