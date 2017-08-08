<?php require_once("includes/db_connection.php");?>
<?php require_once("includes/functions.php");?>

<?php
    if ($_POST['level1']!=""&&$_POST['level2']!=""&&$_POST['level3']!="") {
        $level1 = $_POST['level1']; 
        $level2 = $_POST['level2'];
        $level3 = $_POST['level3'];
        
        $query = "UPDATE levelNames SET level1 = '{$level1}', level2 = '{$level2}', level3 = '{$level3}' ";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $response = array();
            $response["success"] = true;  
            echo json_encode($response);     
        } 
    }
?>