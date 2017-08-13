<?php require_once("includes/db_connection.php");?>
<?php require_once("includes/functions.php");?>

<?php
    if ($_POST['data']!="") {
        $data = $_POST['data']; 
        $dataex = explode(" ", $data);
        $data = implode("_", $dataex);
        $query = "UPDATE listenData set data = '{$data}', state = 1";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $response = array();
            $response["success"] = true;  
            echo json_encode($response);     
        } 
    }
?>