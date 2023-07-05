<?php

$fileId = $_POST["fileId"];

require "connection.php";

$rs = Database::search("SELECT * FROM `resource` INNER JOIN `location` 
            ON resource.resource_id = location.resource_resouce_id WHERE `resource_id` = '".$fileId."'");
$data = $rs->fetch_assoc();

// $file = $data["path"];

// // $file = $_GET["file"] .".pdf";
// header('Content-Type: application/pdf');
// header('Content-Disposition: attachment; filename="tkpdf.pdf"');
// $imagpdf = file_put_contents($image, file_get_contents($file));
// echo $imagepdf;


// header("Content-Type: application/octet-stream");
// // $file = $_GET["file"] . ".pdf";
// header("Content-Disposition: attachment; filename=" . urlencode($file));
// header("Content-Type: application/download");
// header("Content-Description: File Transfer");
// header("Content-Length: " . filesize($file));
// flush(); // Not a must.
// $fp = fopen($file, "r");
// while (!feof($fp)) {
// echo fread($fp, 65536);
// flush(); // This is essential for large downloads
// }
// fclose($fp);


$getURL = $data["path"];
$dataExt = substr(strrchr($getURL,'.'),1);
$save_name = 'files/'.time().".".$dataExt;
 
$fp = fopen($save_name, 'wb');
$content = file_get_contents($getURL);
fwrite($fp, $content);
fclose($fp);

?>