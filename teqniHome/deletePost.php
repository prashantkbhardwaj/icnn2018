<?php require_once("includes/db_connection.php");?>
<?php require_once("includes/functions.php");?>

<?php
    if ($_POST['postid']!="") {
        $postid = $_POST['postid'];
        
        $query = "DELETE FROM volleyupload WHERE id = '{$postid}' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $response = array();
            $response["success"] = true;  
            echo json_encode($response);     
        } 
    }
?>