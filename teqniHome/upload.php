<?php
 	if($_SERVER['REQUEST_METHOD']=='POST'){
 
	 	$image = $_POST['image'];
	    $uploader = $_POST['uploader'];
	    $level1 = $_POST['level1'];
	  	require_once("includes/db_connection.php");
	 	$id = date("Ymdhis");
	 	$path = "uploads/$id.png";
	 	$actualpath = "http://www.vit5icnn2018.com/teqniHome/$path";
	 	$sql = "INSERT INTO volleyupload (imgPath, uploader, level1) VALUES ('{$actualpath}','{$uploader}', '{$level1}')";
		if(mysqli_query($conn,$sql)){
		 	file_put_contents($path,base64_decode($image));
		 	echo "Successfully Uploaded";
		}
	 	mysqli_close($conn);
	}else{
	 	echo "Error";
	}
?>