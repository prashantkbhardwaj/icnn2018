<?php require_once("includes/db_connection.php");?>
<?php require_once("includes/functions.php");?>

<?php
    if ($_POST['username']!=""&&$_POST['name']!=""&&$_POST['password']!="") {
        $username = mysql_prep($_POST['username']); 
        $name = $_POST['name']; 
        $hashed_password = password_encrypt($_POST['password']);
        $branch = $_POST['branch'];
        $year = $_POST['year'];
        
        $query = "INSERT INTO users (username, name, hashed_password, branch, year)";
        $query .= " VALUES ('{$username}', '{$name}', '{$hashed_password}', '{$branch}', '{$year}')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $response = array();
            $response["success"] = true;  
            echo json_encode($response);     
        } 
    }
?>