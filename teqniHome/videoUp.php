<?php

$result = array("success" => $_FILES["video"]["name"]);
$file_path = basename( $_FILES['video']['name']);
if(move_uploaded_file($_FILES['video']['tmp_name'], $file_path)) {
    $result = array("success" => "File successfully uploaded");
} else{
    $result = array("success" => "error uploading file");
}
echo json_encode($result, JSON_PRETTY_PRINT);

?>