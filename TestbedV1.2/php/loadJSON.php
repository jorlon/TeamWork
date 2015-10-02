<?php
$myFile1 = "../experiments/page1.json";
$fh = fopen($myFile1, 'w') or die("Could not load");
$stringData = $_POST["page1"];
fwrite($fh, $stringData);
fclose($fh);

$myFile2 = "../experiments/page2.json";
$fh2 = fopen($myFile2, 'w') or die("Could not load");
$stringData2 = $_POST["page2"];
fwrite($fh2, $stringData2);
fclose($fh2);

$myFile3 = "../experiments/page3.json";
$fh3 = fopen($myFile3, 'w') or die("Could not load");
$stringData3 = $_POST["page3"];
fwrite($fh3, $stringData3);
fclose($fh3);


$myFile4 = "../experiments/page4.json";
$fh4 = fopen($myFile4, 'w') or die("Could not load");
$stringData4 = $_POST["page4"];
fwrite($fh4, $stringData4);
fclose($fh4);

$myFile5 = "../experiments/page5.json";
$fh5 = fopen($myFile5, 'w') or die("Could not load");
$stringData5 = $_POST["page5"];
fwrite($fh5, $stringData5);
fclose($fh5);

?>
