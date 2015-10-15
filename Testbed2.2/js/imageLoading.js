var pageNum = 1; //set canvas number. Added on initial editExperiment page load
var canvasNum = 1; //set page number. Added on initial editExperiment page load

//Re number page tabs when a page is deleted. eg if you have pages 1,2,3,4,
// and you delete page 2 pages must be renumbers to 1,2,3
function reNumberPages() {
    pageNum = 0;
    var tabCount = $('#tabAdd > li').length;
    $('#tabAdd > li').each(function () {
        var pageId = $(this).children('a').attr('href');
      //  if (pageId == "#page1") {
      //      return true;
     //   }
        
        pageNum++;
        $(this).children('a').html('Page ' + pageNum +
                '<button class="close" type="button" ' +
                'title="Remove this page"><span class="glyphicon glyphicon-trash"></span></button>');
	        

//	pageNum++;
    });
    
}

// used to get the currently active tab and its canvas number.  
function getCanvasNum() {
    var activeTab = $('.nav-tabs > li.active > a').attr('href');
    
    var numReg = /[0-9]+/g;
    var canNum = activeTab.match(numReg);
    return canNum;
}





// open file modal on save button click
function setFilename() {

    $('#saveModal').modal('toggle');

    loadJSON($('#formExpName').val());


}
function saveRun() {
    $('#saveModalRun').modal('toggle');
    var fileName = $('#formExpNameRun').val();
    loadJSON(fileName);

    url = "http://54.79.30.44/Testbed2/Testbed/sliderFileName.php?fileName=www.json";
    $(location).attr("href", url);

}


function loadJSON(fileName) {
    var canvasCount = 0
    var links = document.getElementsByTagName('canvas');
    var timeInterval = $('#slideInterval').val();
    var pagesData = {};
    pagesData['slideInterval'] = timeInterval;
    console.log(links.length);
    for (var i = 0; i < links.length; i++) {
        if (links[i].hasAttribute('id')) {
            canvasCount++;
            var canvasName = links[i].id;
            var numReg = /[0-9]+/g;
            var canNum = canvasName.match(numReg);

            console.log(canvasName);
            console.log(canNum);
//var canvasName="canvas"+i;

            eval("var newPage =JSON.stringify(canvas" + canNum + ");");
            console.log(newPage);
            pagesData[canvasCount] = newPage;
        }

    }
    ;
    console.log(JSON.stringify(pagesData));
    var JsonString = JSON.stringify(pagesData);
    $.ajax
            ({
                type: "POST",
                dataType: 'json',
                async: false,
                url: '/Testbed2/Testbed2.2/php/loadJSON.php',
                data: {'data': JsonString, 'fileName': fileName},
                success: function () {
                    alert("Thanks!");
                },
                failure: function () {
                    alert("Error!");
                }
            });

}

// not currently being used due to redirect not working with parameters
function loadAndRunJSON() {
    loadJSON();
    window.location = "slider.php";
}

// Add Page function used to add a new page to an experiment. Activated on add page button click
function addPage() {
    canvasNum++;
    pageNum++;

    var tabText = "<li><a data-toggle='tab' href='#page" + canvasNum + "'>Page " + pageNum + "<button class='close' title='Remove this page' type='button'><span class='glyphicon glyphicon-trash'></span></button> </a></li>";
    $('#tabAdd').append(tabText);
    
    $.ajax({
        type: "POST",
        url: "/Testbed2/Testbed/php/canvasPages.php",
        data: {"pageNum": canvasNum},
        success: function (response) {
            console.log(response);
            $('#pages').append(" " + response + " ");
        }
        , failure: function () {
            alert("Error!");
        }
    }
    );
}




// Delete button on the slides.

$('#tabAdd').on('click', ' li a .close', function () {
    var tabId = $(this).parents('li').children('a').attr('href');
    $(this).parents('li').remove('li');
    $(tabId).remove();
    reNumberPages();
    $('#tabAdd a:first').tab('show');
});

// Showing and closeing loading gif while ajax is loading something eg saving.
$(document).ajaxStart(function () {

    $('#myModal').modal('show');
});

$(document).ajaxComplete(function () {
    $('#myModal').modal('toggle');
});


// Add image button in the sidebar. Triggers a hidden file input for 
// The currently showing canvas.
$(document).ready(function () {
    $('#sideImageAdd').click(function () {
        var canNum = getCanvasNum(); //get canvas number
        var imgLoadName = "#imgLoader" + canNum; // the hidden imageLoader
        $(imgLoadName).trigger('click'); // trigger image loader
    });
});

// add background button, used to trigger bhidden background input

function backgroundColour(){

    $("#backColour").trigger('click');
}
// eval("canvas"+canNum+".setBackgroundColor('rgba(255, 73, 64, 0.6)', canvas"+canNum+".renderAll.bind(canvas"+canNum+"));");

//}
//);

// listener for the hidden background input. On change set background colour to selected colour. 
fabric.util.addListener(document.getElementById('backColour'), 'change', function () {
    var canNum = getCanvasNum();
    var inputColor = $('#backColour').val()//get canvas number
    eval("canvas" + canNum + ".setBackgroundColor('" + inputColor + "', canvas" + canNum + ".renderAll.bind(canvas" + canNum + "));");
});


// Add text to canvas. Activated on text button.
function addCustomText() {
    var canNum = getCanvasNum();
    eval("canvas" + canNum + ".add(new fabric.IText('Tap and Type', {fontFamily: 'arial black',left: 100, top: 100,}));");
}

//Delete Item. Item must be select(activeObject). If no object is selected then nothing happens.
// Activated on Delete item button click.
function deleteItem(){
        var canNum = getCanvasNum();
        
    eval("var activeObject = canvas"+canNum+".getActiveObject();");

    eval("if(activeObject){canvas"+canNum+".remove(activeObject);}");

}