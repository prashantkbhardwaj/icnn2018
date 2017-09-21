<?php require_once("includes/db_connection.php");?>
<?php require_once("includes/functions.php");?>

<?php
    if ($_POST['sessionName']!="") {
        $sessionName = $_POST['sessionName'];
        
        $query = "DELETE FROM volleyupload WHERE sessionName = '{$sessionName}'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $response = array();
            $response["success"] = true;  
            echo json_encode($response);     
        } 
    }
?>