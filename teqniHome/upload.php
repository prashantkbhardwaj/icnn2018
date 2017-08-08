<?php
 	if($_SERVER['REQUEST_METHOD']=='POST'){
 
	 	$image = $_POST['image'];
	    $uploader = $_POST['uploader'];
	    $folder = $_POST['folder'];
	    $branch = $_POST['branch'];
	    $year = $_POST['year'];
	    $sessionName = $_POST['sessionName'];
	  	require_once("includes/db_connection.php");
	 	$id = date("Ymdhis");
	 	$path = "uploads/$folder/$id.png";
	 	$actualpath = "http://192.168.1.101/fileTransfers/teqniHome/$path";
	 	$sql = "INSERT INTO volleyupload (imgPath, uploader, branch, year, sessionName) VALUES ('{$actualpath}','{$uploader}', '{$branch}', '{$year}', '{$sessionName}')";
		if(mysqli_query($conn,$sql)){
		 	file_put_contents($path,base64_decode($image));
		 	echo "Successfully Uploaded";
		}
	 	mysqli_close($conn);
	}else{
	 	echo "Error";
	}
?>