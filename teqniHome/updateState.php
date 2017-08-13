<?php require_once("includes/db_connection.php");?>
<?php require_once("includes/functions.php");?>

<?php
    if ($_POST['data']!="") {
        $data = $_POST['data']; 
        $data = implode("_", $data);
        $query = "INSERT INTO listenData (data, state)";
        $query .= " VALUES ('{$data}', '1')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $response = array();
            $response["success"] = true;  
            echo json_encode($response);     
        } 
    }
?>