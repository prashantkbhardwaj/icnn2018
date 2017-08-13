<?php require_once("includes/db_connection.php");?>
<?php require_once("includes/functions.php");?>
<?php
	$query = "SELECT * FROM volleyupload ORDER BY id DESC";
	$result = mysqli_query($conn, $query);
	$i = 0;
	$response = array();
	while ($list = mysqli_fetch_assoc($result)) {
		$response[$i]['image'] = $list['imgPath'];
		$response[$i]['name'] = $list['pictureName'];
		$response[$i]['date'] = $list['dateUpload'];
		$response[$i]['timeDuration'] = $list['timeDuration'];
		$response[$i]['tag'] = $list['level1']."-".$list['level2']."-".$list['level3']."-".$list['sessionName'];
		$i = $i+1;
	}
	echo json_encode($response);
?>