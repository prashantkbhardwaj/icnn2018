<?php
 	if($_SERVER['REQUEST_METHOD']=='POST'){
 
	 	$image = $_POST['qrcode'];
	    $data = $_POST['data'];
	  	require_once("db_connection.php");

	  	$dataex = explode("_", $data);

	  	$acct = $dataex[0];
	  	$name = $dataex[1];
	  	$email = $dataex[2];
	  	$phone = $dataex[3];
	  	$address = $dataex[4];
	  	$bill = $dataex[5];
	 	
	 	$path = "uploads/$acct.png";
	 	$actualpath = "http://13.126.120.123/$path";
	 	$sql = "INSERT INTO dataTable (imgPath, acct, name, email, phone, address, bill) VALUES ('{$actualpath}','{$acct}', '{$name}', '{$email}', '{$phone}', '{$address}', '{$bill}')";
		if(mysqli_query($conn,$sql)){
		 	file_put_contents($path,base64_decode($image));
		 	echo "Successfully Uploaded";
		}
	 	mysqli_close($conn);
	}else{
	 	echo "Error";
	}
?>