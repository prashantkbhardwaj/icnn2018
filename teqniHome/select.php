<?php require_once("includes/db_connection.php");?>
<?php require_once("includes/functions.php");?>

<?php
	$query = "SELECT DISTINCT(qrcode) FROM volleyupload";
	$result = mysqli_query($conn, $query);
	confirm_query($result);
    
	while ($notification = mysqli_fetch_assoc($result)) {
		echo "<div class='col-lg-3'><img src='".$notification['qrcode']."'></div>";
		echo "<br><h4>hello ji</h4>";
	}		 
?>