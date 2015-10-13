<?php


//$stringData = $_POST["page1"];



//$page1json = json_decode($stringData);
//$newArray["1"]=$page1json;
//$newArray["1"]=$stringData;




//$stringData2 = $_POST["page2"];



//$page2json = json_decode($stringData2);
//$newArray["2"]=$stringData2;



//$stringData3 = $_POST["page3"];
//$page3json = json_decode($stringData3);
//$newArray["3"]=$stringData3;





//$stringData4 = $_POST["page4"];

//$newArray["4"]=$stringData4;


//$stringData5 = $_POST["page5"];
//$newArray["5"]=$stringData2;

//$totalString = json_encode($newArray);

$data = $_POST['data'];

$myFileTot = "../experiments/".$_POST['fileName'].".json";
$fh = fopen($myFileTot, 'w') or die("Could not load");
fwrite($fh, $data);
fclose($fh);
?>
