<?php

$FileId =  $_POST["FileId"];

require "connection.php";

$rs = Database::search("SELECT * FROM `resource` INNER JOIN `location` 
            ON resource.resource_id = location.resource_resouce_id WHERE `resource_id` = '".$FileId."'");
$data = $rs->fetch_assoc();

$filePath = $data["path"];

// header('Content-type: application/pdf');

// header('Content-Disposition: inline; filename="' . $filename . '"');

// header('Content-Transfer-Encoding: binary');

// header('Accept-Ranges: bytes');

// // header('Content-Type: application/pdf');
// // header('Content-Disposition: inline; filename="file.pdf"');
// header('Content-Length: ' . strlen($pdf_data));

// Read the file
// @readfile($file);

echo($filePath);

?>