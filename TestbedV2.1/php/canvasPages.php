<?php 
function addNewSlide($pageNum){
                if ($pageNum==1){
                echo "<div id='page".$pageNum."' class='tab-pane fade in active'>";}
                else {echo "<div id='page".$pageNum."' class='tab-pane fade'>";

}
               echo"<div class='form-group' hidden>
                                <label for='imgLoader".$pageNum."'>Add an Image</label>
                                 <input class='btn btn-default' id='imgLoader".$pageNum."' type='file'  >
                       </div>
                    <canvas id='canvasPage".$pageNum."' width='1100' height='600'></canvas>
                </div>
		<script>
			canvas".$pageNum." = new fabric.Canvas('canvasPage".$pageNum."');

			document.getElementById('imgLoader".$pageNum."').onchange = function handleImage(e) {
			var reader = new FileReader();
			reader.onload = function (event) { 
			var imgObj = new Image();
			imgObj.src = event.target.result;
			imgObj.onload = function () {
                        
			var image = new fabric.Image(imgObj);
			image.set({
			left: 250,
               		top: 250,
               		angle: 0,
                	padding: 10,
                	cornersize: 10
           	 });
           
           canvas".$pageNum.".add(image);
           canvas".$pageNum.".calcOffset();


           
        }
        
    }
    reader.readAsDataURL(e.target.files[0]);

    console.log(JSON.stringify(canvas".$pageNum."));



};






	</script>";

}
if (isset($_POST['pageNum'])){
echo addNewSlide($_POST['pageNum']);
}
?>

<?php
function addNewEditSlide($pageNum,$canvasJsonString){
                if ($pageNum==1){
                echo "<div id='page".$pageNum."' class='tab-pane fade in active'>";}
                else {echo "<div id='page".$pageNum."' class='tab-pane fade'>";

}
                echo "<div class='form-group' hidden>
                                <label for='imgLoader".$pageNum."'>Add an Image</label>
                                 <input class='btn btn-default' id='imgLoader".$pageNum."' type='file'  >
                        </div>
                        <canvas id='canvasPage".$pageNum."' width='1100' height='600'></canvas>
                </div>
                <script>
                        canvas".$pageNum." = new fabric.Canvas('canvasPage".$pageNum."');
			var JsonStr =".$canvasJsonString.";
			canvas".$pageNum.".loadFromJSON(JsonStr);		

                        document.getElementById('imgLoader".$pageNum."').onchange = function handleImage(e) {
                        var reader = new FileReader();
                        reader.onload = function (event) { 
                        var imgObj = new Image();
                        imgObj.src = event.target.result;
                        imgObj.onload = function () {
                        
                        var image = new fabric.Image(imgObj);
                        image.set({
                        left: 250,
                        top: 250,
                        angle: 0,
                        padding: 10,
                        cornersize: 10
                 });
           
           canvas".$pageNum.".add(image);
           canvas".$pageNum.".calcOffset();


           
        }
        
    }
    reader.readAsDataURL(e.target.files[0]);

    console.log(JSON.stringify(canvas".$pageNum."));



}

                </script>";

}

