<?php require_once("includes/db_connection.php");?>
<?php require_once("includes/functions.php");?>

<?php
	$query = "SELECT * FROM listenData";
	$result = mysqli_query($conn, $query);
	confirm_query($result);
    $list = mysqli_fetch_assoc($result);

	if ($list['state']==2) {
		echo "<script>window.location.href = 'http://www.vit5icnn2018.com/fileTransfers/teqniHome/qrDisplay.html';</script>";
	}		 
?>