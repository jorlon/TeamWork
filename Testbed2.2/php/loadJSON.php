<?php


$data = $_POST['data'];

$myFileTot = "../experiments/".$_POST['fileName'].".json";
$fh = fopen($myFileTot, 'w') or die("Could not load");
fwrite($fh, $data);
fclose($fh);
?>
