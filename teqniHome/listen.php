<?php require_once("includes/db_connection.php");?>
<?php require_once("includes/functions.php");?>

<?php
	$query = "SELECT * FROM listenData";
	$result = mysqli_query($conn, $query);
	confirm_query($result);
    $list = mysqli_fetch_assoc($result);

	if ($list['state']==1) {
		echo "<script>window.location.href = 'http://www.vit5icnn2018.com/teqniHome/show.php?data=".$list['data']."';</script>";
	}		 
?>