<?php require_once("includes/db_connection.php");?>
<?php require_once("includes/functions.php");?>

<?php
	$query = "SELECT DISTINCT(qrcode) FROM volleyupload";
	$result = mysqli_query($conn, $query);
	confirm_query($result);
    
	while ($notification = mysqli_fetch_assoc($result)) {
		$dataex = explode("data=", $notification['qrcode']);
		$dataPart = $dataex[1];
		$dataPartex = explode("_", $dataPart);
		$sessionName = $dataPartex[3];
		echo "<div class='col-lg-3'><img src='".$notification['qrcode']."'><br><h4>".$sessionName."</h4></div>";
	}		 
?>