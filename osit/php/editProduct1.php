<?php
include "database.php";
$productID = $_POST['productID'];
$productName = $_POST['productName'];
$productPrice = $_POST['productPrice'];
$productGender = $_POST['productGender'];
$productCategory = $_POST['productCategory'];

$ro = new database();

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["productPhoto"]["name"]);

$ro->editNow("product","productName",$productName,"productID",$productID);
$ro->editNow("product","price",$productPrice,"productID",$productID);
$ro->editNow("product","gender",$productGender,"productID",$productID);
$ro->editNow("product","catID",$productCategory,"productID",$productID);

if($_FILES['productPhoto']['name'] != "") {
	echo "has value";
unlink("uploads/".$ro->selectNow("product","image","productID",$productID));
$ro->editNow("product","image",$_FILES['productPhoto']['name'],"productID",$productID);
move_uploaded_file($_FILES["productPhoto"]["tmp_name"], $target_file);
}else {
	echo "no value";
}

?>