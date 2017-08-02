<?php require_once("includes/db_connection.php");?>
<?php require_once("includes/functions.php");?>

<?php
    if ($_POST['username']!=""&&$_POST['name']!=""&&$_POST['password']!="") {
        $username = mysql_prep($_POST['username']); 
        $name = $_POST['name']; 
        $hashed_password = password_encrypt($_POST['password']);
        $branch = $_POST['branch'];
        if ($_POST['year']=="1st Year") {
            $year = "1stYear";
        } elseif ($_POST['year']=="2nd Year") {
            $year = "2ndYear";
        } elseif ($_POST['year']=="3rd Year") {
            $year = "3rdYear";
        } elseif ($_POST['year']=="4th Year") {
            $year = "4thYear";
        }
        
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