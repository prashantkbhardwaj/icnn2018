<?php require_once("includes/db_connection.php");?>
<?php require_once("includes/functions.php");?>
<?php
	$user = $_POST['username'];
	$query = "SELECT * FROM volleyupload WHERE uploader = '{$user}'";
	$result = mysqli_query($conn, $query);
	$response = array();
	$response["success"] = true; 
	$response['sessionData'] = "";
	while ($list = mysqli_fetch_assoc($result)) {
		$response['sessionData'] .= $list['sessionName'].",";
	}
	echo json_encode($response);
?>