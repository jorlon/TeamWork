
var links = document.getElementsByTagName('canvas');

for (var i = 0; i < links.length; i++) {
 	links[i].onmouseover = function() {
        	console.log('hovered');
		canvas1.calcOffset();
		canvas2.calcOffset();
		canvas3.calcOffset();
		canvas4.calcOffset();
		canvas5.calcOffset();
	};
};


function loadJSON(){
	var page1Json = JSON.stringify(canvas1);
	var page2Json = JSON.stringify(canvas2);
	var page3Json = JSON.stringify(canvas3);
	var page4Json = JSON.stringify(canvas4);
	var page5Json = JSON.stringify(canvas5);

	$.ajax
    	({
        	type: "POST",
        	dataType : 'json',
        	async: false,
        	url: '/Testbed/php/loadJSON.php',
        	data: {'page1':page1Json,
                	'page2':page2Json,
                	'page3':page3Json,
                	'page4':page4Json,
                	'page5':page5Json},
        	success: function () {alert("Thanks!"); },
        	failure: function() {alert("Error!");}
    	});
}

function loadAndRunJSON(){
	loadJSON();
	window.location="slider.php";
}

$(document).ajaxStart(function(){
	
	$('#myModal').modal('show');
});

$(document).ajaxComplete(function(){
	$('#myModal').modal('toggle');
});


