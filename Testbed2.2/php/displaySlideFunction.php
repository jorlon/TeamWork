
<?php

function displaySlide($slideNum, $jsonString) {
    if ($slideNum == '1') {
        echo "<div class='item active'>";
    } else {
        echo "<div class='item'>";
    }
    echo"<div id='game'>";
    echo "<canvas id='can" . $slideNum . "' class='can' width='1400' height='900' ></canvas>";


    echo "</div></div>";
    ?>

    <script>
        $(document).ready(function () {
            var canvasName = <?php echo "can" . $slideNum; ?>;
            var JsonStr = <?php echo $jsonString; ?>;
            var newCanvas = new fabric.StaticCanvas(canvasName);
            newCanvas.loadFromJSON(JsonStr);
        });

    </script>
<?php } ?>

