var pageNum = 1;
var canvasNum = 1;
function reNumberPages() {
    pageNum = 1;
    var tabCount = $('#tabAdd > li').length;
    $('#tabAdd > li').each(function() {
        var pageId = $(this).children('a').attr('href');
        if (pageId == "#page1") {
            return true;
        }
        pageNum++;
        
        $(this).children('a').html('Page ' + pageNum +
            '<button class="close" type="button" ' +
            'title="Remove this page"><span class="glyphicon glyphicon-trash"></span></button>');
//	pageNum++;
    });
}
function getCanvasNum(){
var activeTab = $('.nav-tabs > li.active > a').attr('href');
console.log(activeTab);
var numReg = /[0-9]+/g;
var canNum = activeTab.match(numReg);
return canNum;
}



var links = document.getElementsByTagName('canvas');

for (var i = 0; i < links.length; i++) {
 	links[i].onmouseover = function() {
        	console.log('hovered');
		canvas1.calcOffset();

	};
};

//$(document).ready(
function setFilename(){
//$('#fileNameButton').click(function(){
$('#saveModal').modal('toggle');

loadJSON($('#formExpName').val());


}
function saveRun(){
$('#saveModalRun').modal('toggle');
var fileName= $('#formExpNameRun').val();
loadJSON(fileName);

url="http://54.79.30.44/Testbed2/Testbed/sliderFileName.php?fileName=www.json";
$(location).attr("href",url);

}


function loadJSON(fileName){
var canvasCount = 0
var links = document.getElementsByTagName('canvas');
var timeInterval = $('#slideInterval').val();
var pagesData = {};
pagesData['slideInterval']=timeInterval;
console.log(links.length);
for (var i =0 ; i < links.length; i++) {
if (links[i].hasAttribute('id')){
        canvasCount++;
        var canvasName = links[i].id;
        var numReg = /[0-9]+/g;
        var canNum = canvasName.match(numReg);

console.log(canvasName);
console.log(canNum);
//var canvasName="canvas"+i;

eval("var newPage =JSON.stringify(canvas"+canNum+");");
console.log(newPage);
pagesData[canvasCount]=newPage;
}

};
        console.log(JSON.stringify(pagesData));
        var JsonString = JSON.stringify(pagesData);
        $.ajax
        ({
                type: "POST",
                dataType : 'json',
                async: false,
                url: '/Testbed2/Testbed/php/loadJSON.php',
                data: {'data':JsonString,'fileName':fileName},
                success: function () {alert("Thanks!"); },
                failure: function() {alert("Error!");}
        });

}

function loadJSON2(){
var canvasCount = 0
var links = document.getElementsByTagName('canvas');
var pagesData = {}; 
console.log(links.length);
for (var i =0 ; i < links.length; i++) {
if (links[i].hasAttribute('id')){
	canvasCount++;
	var canvasName = links[i].id;	
	var numReg = /[0-9]+/g;
	var canNum = canvasName.match(numReg);

console.log(canvasName);
console.log(canNum);
//var canvasName="canvas"+i;

eval("var newPage =JSON.stringify(canvas"+canNum+");");
console.log(newPage);
pagesData[canvasCount]=newPage;
}


// var page1Json = JSON.stringify(canvas1);
 //       var page2Json = JSON.stringify(canvas2);
 //       var page3Json = JSON.stringify(canvas3);
 //       var page4Json = JSON.stringify(canvas4);
 //       var page5Json = JSON.stringify(canvas5);
};
        console.log(JSON.stringify(pagesData));
	var JsonString = JSON.stringify(pagesData);
	$.ajax
        ({
                type: "POST",
                dataType : 'json',
                async: false,
                url: '/Testbed2/Testbed/php/loadJSON.php',
                data: {'data':JsonString},
                success: function () {alert("Thanks!"); },
                failure: function() {alert("Error!");}
        });
}


function loadAndRunJSON(){
	loadJSON2();
	window.location="slider.php";
}

function addPage(){
canvasNum++;
pageNum++;

var tabText = "<li><a data-toggle='tab' href='#page"+canvasNum+"'>Page "+pageNum+"<button class='close' title='Remove this page' type='button'><span class='glyphicon glyphicon-trash'></span></button> </a></li>";
$('#tabAdd').append(tabText);
//pageNum++;
$.ajax({

	type: "POST",
	url: "/Testbed2/Testbed/php/canvasPages.php",
	data: {"pageNum":canvasNum},
	success:function(response){
		console.log(response);
		$('#pages').append(" "+response+" ");}
,	failure:function() {alert("Error!");}
}
);
}


//function deletePage(){
//$(".tab-pane ade in active").remove();
//$("li.active").remove();
//}
//Var newSlideData:
//$.get('http://54.79.30.44/Testbed2/Testbed/php/addCanvas.php', function(data) {
//  newSlideData = data;

//});

$('#tabAdd').on('click', ' li a .close', function() {
var tabId = $(this).parents('li').children('a').attr('href');
$(this).parents('li').remove('li');
$(tabId).remove();
reNumberPages();
$('#tabAdd a:first').tab('show');
});

$(document).ajaxStart(function(){
	
	$('#myModal').modal('show');
});

$(document).ajaxComplete(function(){
	$('#myModal').modal('toggle');
});

$(document).ready(function(){
$('#sideImageAdd').click(function(){
					var canNum = getCanvasNum();
					var imgLoadName = "#imgLoader"+canNum;
					$(imgLoadName).trigger('click');
			});
});

