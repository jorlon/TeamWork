<?php

require_once("displaySlideFunction.php");
require_once("canvasPages.php");

function loadSliderFromJsonFileName($fileName) {


    $JsonPath = "experiments/" . $fileName;
    $pagesJson = file_get_contents($JsonPath);
    $pagesArray = json_decode($pagesJson, true);


    if (array_key_exists('slideInterval', $pagesArray)) {
        echo "<div class='container'><div id='myCarousel' class='carousel-fade' data-ride='carousel' data-interval='" . $pagesArray['slideInterval'] . "' data-pause='false'><div class='carousel-inner' role='listbox'>";
    } else {
        echo "<div class='container'>
<div id='myCarousel' class='carousel-fade' data-ride='carousel' data-interval='2000' data-pause='false'>
<div class='carousel-inner' role='listbox'>";
    }
    foreach ($pagesArray as $pageNum => $jsonString) {
        if ($pageNum == 'slideInterval') {
            
        } else {
            displaySlide($pageNum, $jsonString);
        }
    }

    echo "</div>
</div>
</div>";
}

function loadExperimentFromJson($fileName) {
    if (isset($fileName)) {

        $JsonPath = "experiments/" . $fileName;
        $pagesJson = file_get_contents($JsonPath);
        $pagesArray = json_decode($pagesJson, true);
        echo "<h2>Edit Experiment '" . $fileName . "' </h2>
    <ul class='nav nav-tabs' id='tabAdd'>";
        foreach ($pagesArray as $pageNum => $jsonString) {
            if ($pageNum == 'slideInterval') {
                
            } elseif ($pageNum == 1) {
                echo "<li class='active' ><a data-toggle='tab' href='#page" . $pageNum . "'>Page " . $pageNum . "  <button class='close' type='button' title='Remove this page'><span class='glyphicon glyphicon-trash'></span></button></a></li>";
            } else {
                //echo "<li><a data-toggle='tab' href='#page" . $pageNum . "'>Page " . $pageNum . " <button class='close' type='button' title='Remove this page'><span class='glyphicon glyphicon-trash'></span></button></a></li>";
                addTab($pageNum);
            }
        }
        echo " </ul><div class='tab-content' id='pages'>";
        foreach ($pagesArray as $pageNum => $jsonString) {
            if ($pageNum == 'slideInterval') {
                
            } else {
                addNewEditSlide($pageNum, $jsonString);
            }
        }
        echo "</div><script>
                    $(document).ready(function(){
                        var editCanvasNum = document.getElementsByTagName('canvas').length;
                        canvasNum = (editCanvasNum/2);
                        pageNum = (editCanvasNum/2);
                    });
                </script>";
    } else {
        echo "<h2>Create New Experiment </h2><ul class='nav nav-tabs' id='tabAdd'>";
        echo "<li class='active' ><a data-toggle='tab' href='#page1'>Page 1  <button class='close' type='button' title='Remove this page'><span class='glyphicon glyphicon-trash'></span></button></a></li>";
        echo " </ul><div class='tab-content' id='pages'>";

        addNewEditSlide(1, null);


        echo "</div><script>
                    $(document).ready(function(){
                        var editCanvasNum = document.getElementsByTagName('canvas').length;
                        canvasNum = (editCanvasNum/2);
                        pageNum = (editCanvasNum/2);
                    });
                </script>";
    }
}

function addTab($pageNum) {
    echo "<li><a data-toggle='tab' href='#page" . $pageNum . "'>Page " . $pageNum . " <button class='close' type='button' title='Remove this page'><span class='glyphicon glyphicon-trash'></span></button></a></li>";
}
?>