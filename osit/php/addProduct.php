<?php
include "database.php";
include "session.php";
$productName = $_POST['productName'];
$productPrice = $_POST['productPrice'];
$productGender = $_POST['productGender'];
$productCategory = $_POST['productCategory'];

$ro = new database();

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$ro->addProduct($productName,$productPrice,$productGender,$productCategory,$_FILES["fileToUpload"]["name"]);

move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
echo "inserted";

?>