<?php
	require_once("includes/db_connection.php");
 
    $uploader = $_POST['uploader'];
    $level1 = $_POST['level1'];
    $level2 = $_POST['level2'];
    $level3 = $_POST['level3'];
    $description = $_POST['description'];
    $sessionName = $_POST['sessionName'];
  
 	$query = "INSERT INTO volleyupload (uploader, level1, level2, level3, sessionName, description) VALUES ('{$uploader}', '{$level1}', '{$level2}', '{$level3}', '{$sessionName}', '{$description}')";
 	$result = mysqli_query($conn, $query);
 	if ($result) {
 		echo "Successfully Created";
 	}else {
 		echo "Error";
 	}
	
 	mysqli_close($conn);
?>