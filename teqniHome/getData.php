<?php require_once("includes/db_connection.php");?>
<?php require_once("includes/functions.php");?>
<?php
	$user = $_POST['user'];
	$sessionName = $_POST['session'];
	$query = "SELECT * FROM volleyupload WHERE uploader = '{$user}' AND sessionName = '{$sessionName}' ORDER BY pos DESC";
	$result = mysqli_query($conn, $query);
	$i = 0;
	$response = array();
	while ($list = mysqli_fetch_assoc($result)) {
		if ($list['imgPath']!="") {
			if ($list['timeDuration']=='0') {
				$response[$i]['image'] = "http://www.vit5icnn2018.com/teqniHome/uploads/video.png";
			} else {
				$response[$i]['image'] = $list['imgPath'];
			}
			$response[$i]['date'] = $list['dateUpload'];
			$response[$i]['timeDuration'] = $list['timeDuration'];
			$response[$i]['postid'] = $list['id'];
			$response[$i]['pos'] = $list['pos'];
			$i = $i+1;
		}
	}
	echo json_encode($response);
?>