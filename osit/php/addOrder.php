<?
include "database.php";

$name = $_POST["name"];
$id = $_POST["id"];
$prodID = $_POST["prodID"];
$quantity = $_POST["quantity"];

$ro = new database();

//echo $name." - ".$id."-".$_POST["prodID"];

$myData = array(
"orderDate" => date("Y-m-d"),
"custID" => $id,
"productID" => $prodID,
"quantity" => $quantity
);

$ro->insertNow("customerOrder",$myData);

?>