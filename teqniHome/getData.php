<?php require_once("includes/db_connection.php");?>
<?php require_once("includes/functions.php");?>
<?php
	$query = "SELECT * FROM volleyupload";
	$result = mysqli_query($conn, $query);
	$i = 0;
	$response = array();
	while ($list = mysqli_fetch_assoc($result)) {
		$response[$i]['image'] = $list['imgPath'];
		$response[$i]['name'] = $list['pictureName'];
		$response[$i]['date'] = $list['dateUpload'];
		$response[$i]['timeDuration'] = $list['timeDuration'];
		$i = $i+1;
	}
	echo json_encode($response);
?>