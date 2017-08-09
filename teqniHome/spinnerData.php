<?php require_once("includes/db_connection.php");?>
<?php require_once("includes/functions.php");?>
<?php
	$query = "SELECT * FROM levelNames";
	$result = mysqli_query($conn, $query);
	$response = array();
	$list = mysqli_fetch_assoc($result);
	$response['level1'] = $list['level1'];
	$response['level2'] = $list['level2'];
	$response['level3'] = $list['level3'];
	$response['level1opt'] = $list['level1opt'];
	$response['level2opt'] = $list['level2opt'];
	$response['level3opt'] = $list['level3opt'];
	
	echo json_encode($response);
?>