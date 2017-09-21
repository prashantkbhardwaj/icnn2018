<?php
$data = $_GET['data'];
$file = fopen("fa.txt","w");
echo fwrite($file, $data);
fclose($file);
?>