<?php require_once("includes/db_connection.php");?>
<?php require_once("includes/functions.php");?>
<?php
	$query = "SELECT imgPath FROM volleyupload";
	$result = mysqli_query($conn, $query);
	$i = 0;
	while ($list = mysqli_fetch_assoc()) {
		$response[$i]['url'] = $list['imgPath'];
		$i = $i+1;
	}
	for ($f=0; $f < $i; $f++) { 
		echo json_encode($response[$i]);
	}
?>