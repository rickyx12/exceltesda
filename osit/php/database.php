<?php
class database {
	
	private $host = "localhost";
	private $username = "root";
	private $password = "cebu01";
	private $database = "shoppingCart";

public function selectNow($table,$cols,$data,$data1) {
	$connection = mysqli_connect($this->host,$this->username,$this->password,$this->database);      
	$result = mysqli_query($connection, "SELECT (".$cols.") as result FROM ".$table." WHERE ".$data." = ".$data1." ") or die("Query fail: " . mysqli_error()); 
	while($row = mysqli_fetch_array($result)) {
	return $row['result'];
}
}

public function doubleSelectNow($table,$cols,$data,$data1,$dataz,$dataz1) {
	$connection = mysqli_connect($this->host,$this->username,$this->password,$this->database);      
	$result = mysqli_query($connection, "SELECT ($cols) as result FROM ".$table." WHERE $data = '$data1' AND $dataz = '$dataz1' ") or die("Query fail: " . mysqli_error()); 
	while($row = mysqli_fetch_array($result)) {
	return $row['result'];
}
}

private $insertNow_lastID;

public function insertNow_lastID() {
	return $this->insertNow_lastID;
}

public function insertNow($table,$data) {

	$this->insertNow_totalArray = count($data);
	$this->insertNow_a = 0;
	$this->insertNow_cols=""; //pra sa looping alisin ung last value nea n gling s huling loop. 
	$this->insertNow_data="";
	/* make your connection */
	$sql = new mysqli($this->host,$this->username,$this->password,$this->database);
 	
 	$table = "insert into ".$table;
 	foreach($data as $c => $d) {
		
 		if(++$this->insertNow_a == $this->insertNow_totalArray) { //knuha q ung last array pra matanggal ung comma sa $d
 			$this->insertNow_cols .= $c;
 			$this->insertNow_data .= "'".$d."'";
 		}else {
 			$this->insertNow_cols .= $c.",";
 			$this->insertNow_data .= "'".$d."',";
 		}
	} 
	$query = $table."(".$this->insertNow_cols.") values(".$this->insertNow_data.")";
	if ( $sql->query($query) ) {
   		$this->insertNow_lastID = mysqli_insert_id($sql);
	} else {
    	echo "There was a problem:<br />$query<br />{$sql->error}";
	}	
	/* close our connection */
	$sql->close();
}

public function editNow($table,$cols,$colsData,$data,$data1) {
	$connection = mysqli_connect($this->host,$this->username,$this->password,$this->database);      
	$result = mysqli_query($connection, "UPDATE $table SET $cols = '$colsData' WHERE $data = '$data1' ") or die("Query fail: " . mysqli_error()); 
}

public function deleteNow($table,$cols,$colsData) {
	$connection = mysqli_connect($this->host,$this->username,$this->password,$this->database);      
	$result = mysqli_query($connection, "DELETE FROM $table WHERE $cols = '$colsData' ") or die("Query fail: " . mysqli_error()); 
}


function addProduct($prodName,$prodPrice,$prodGender,$prodCategory,$photo) {

	$product = [
		"productName" => $prodName,
		"price" => $prodPrice,
		"gender" => $prodGender,
		"catID" => $prodCategory,
		"image" => $photo
	];

	$this->insertNow("product",$product);

}



public function getCategory() {
	$connection = mysqli_connect($this->host,$this->username,$this->password,$this->database);      
	$result = mysqli_query($connection, "SELECT catID,catName FROM category ORDER BY catName ASC ") or die("Query fail: " . mysqli_error()); 
	while($row = mysqli_fetch_array($result)) {
	echo "<option value='$row[catID]'>".$row['catName']."</option>";
}
}


private $getProductList_productID;
private $getProductList_productName;
private $getProductList_price;
private $getProductList_gender;
private $getProductList_catID;
private $getProductList_image;

public function getProductList_productID() { 
	return $this->getProductList_productID;
}
public function getProductList_productName() {
	return $this->getProductList_productName;
}
public function getProductList_price() {
	return $this->getProductList_price;
}
public function  getProductList_gender() {
	return $this->getProductList_gender;
}
public function getProductList_catID() {
	return $this->getProductList_catID;
}
public function getProductList_image() {
	return $this->getProductList_image;
}

public function getProductList() {
	$connection = mysqli_connect($this->host,$this->username,$this->password,$this->database);      
	$result = mysqli_query($connection, "SELECT productID,productName,price,gender,catID,image FROM product order by productName ASC ") or die("Query fail: " . mysqli_error()); 
	while($row = mysqli_fetch_array($result)) {
	$this->getProductList_productID[] = $row['productID'];
	$this->getProductList_productName[] = $row['productName'];
	$this->getProductList_price[] = $row['price'];
	$this->getProductList_gender[] = $row['gender'];
	$this->getProductList_catID[] = $row['catID'];
	$this->getProductList_image[] = $row['image'];
}
}

private $getCustomerOrder_orderID;
private $getCustomerOrder_productName;
private $getCustomerOrder_productPhoto;

public function getCustomerOrder_orderID() {
	return $this->getCustomerOrder_orderID;
}

public function getCustomerOrder_productName() {
	return $this->getCustomerOrder_productName;
}

public function getCustomerOrder_productPhoto() {
	return $this->getCustomerOrder_productPhoto;
}

public function getCustomerOrder($id) {
	$connection = mysqli_connect($this->host,$this->username,$this->password,$this->database);      
	$result = mysqli_query($connection, "SELECT co.orderID,p.productName,p.price,p.image FROM customerOrder co,product p WHERE co.productID = p.productID and co.custID ='$id' ") or die("Query fail: " . mysqli_error()); 
	while($row = mysqli_fetch_array($result)) {
		$this->getCustomerOrder_orderID[] = $row['orderID'];
		$this->getCustomerOrder_productName[] = $row['productName'];
		$this->getCustomerOrder_productPhoto[] = $row['image'];
}
}




}
?>