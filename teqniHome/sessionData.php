<?php require_once("includes/db_connection.php");?>
<?php require_once("includes/functions.php");?>

<?php
    
    $username = $_POST["username"];
    $sessionName = $_POST["sessionName"];
    $response = array();
    $response["success"] = false; 

    $query = "SELECT * FROM volleyupload WHERE uploader = '{$username}' AND sessionName = '{$sessionName}' LIMIT 1";
    $result = mysqli_query($conn, $query);
    confirm_query($result);
    $list = mysqli_fetch_assoc($result);

    $response["success"] = true;  
    $response["level1"] = $list['level1'];
    $response["level2"] = $list['level2'];
    $response["level3"] = $list['level3'];
    $response["description"] = $list['description'];
    echo json_encode($response);
?>