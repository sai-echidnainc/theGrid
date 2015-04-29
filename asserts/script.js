$('#picker').colpick({
	colorScheme:'dark',
	layout:'rgbhex',
	color:'ff8800',
	onSubmit:function(hsb,hex,rgb,el) {
		/*$("#gridBGColor").css('background-color', '#'+hex);*/
        $("#gridBGColor").val('#'+hex).css({'color':'#'+hex,"border-color":'#'+hex});
		$(el).colpickHide();
	}
});
$('#picker1').colpick({
    colorScheme:'dark',
    layout:'rgbhex',
    color:'ff8800',
    onSubmit:function(hsb,hex,rgb,el) {
        /*$("#gridBGColor").css('background-color', '#'+hex);*/
        $("#gridBGColor1").val('#'+hex).css({'color':'#'+hex,"border-color":'#'+hex});
        $(el).colpickHide();
    }
});
$('#picker2').colpick({
    colorScheme:'dark',
    layout:'rgbhex',
    color:'ff8800',
    onSubmit:function(hsb,hex,rgb,el) {
        /*$("#gridBGColor").css('background-color', '#'+hex);*/
        $("#gridBGColor2").val('#'+hex).css({'color':'#'+hex,"border-color":'#'+hex});
        $(el).colpickHide();
    }
});

$(".crd").mouseenter(function(){
    $(this).find(".card_title").css("position","absolute");
    $(this).find(".card_title").stop().slideDown("slow");
    $(this).find(".preview_hover").fadeIn();
    /*$(this).find(".overlay").css("display","block");*/
})
.mouseleave(function(){
    /*$(this).find(".grid_detail").css("position","relative");*/
    $(this).find(".card_title").stop().slideUp("slow");   
    $(this).find(".preview_hover").fadeOut();
    /*$(this).find(".overlay").css("display","none");*/
});


/*$('.card_type_select').change(function(){
    var val=$(this).val();
    switch (val) {
    case "1":
        var disp=$(".img_div").css("display");
        var disp1=$(".text_div").css("display");
        if(disp=="block" || disp1=="block"){
            $(".text_div").slideUp(1000);
            $(".img_div").slideUp(1000);
        }
        else{
            $(".text_div").css("display","none");
            $(".img_div").css("display","none");
        } 
       
        console.log(val);
        break;
    case "2":
        var disp=$(".img_div").css("display");
        $(".new_card_head").find(".h2").fadeOut("slow");
        $(".new_card_head").find(".h2.card_options_heading").fadeIn("slow");
        if(disp=="block"){
            $(".text_div").css("display","block");
            $(".img_div").css("display","none");
        }
        else{
            $(".text_div").stop().slideDown(1000);
        }        
        $(".img_div").css("display","none");
        console.log(val);
        break;
    case "3":
        var disp=$(".text_div").css("display");
        $(".new_card_head").find(".h2").fadeOut("slow");
        $(".new_card_head").find(".h2.card_options_heading").fadeIn("slow");
        if(disp=="block"){
            $(".img_div").css("display","block");
            $(".text_div").css("display","none");
        }
        else{
            $(".img_div").stop().slideDown(1000);
        } 
        $(".text_div").css("display","none");
        console.log(val);
        break;
    }
})
*/
/*--------------------------File Upload---------------------------*/


function fileSetUploadPercent(percent, divID){

    var uploadString = "Uploaded " + percent + " %";

    $('#'.divID).text(uploadString);
}
function fileUploadStarted(index, file, files_count){

    var divID = getDivID(index, file);

    createFileUploadDiv(divID);     //create the div that will hold the upload status

    fileSetUploadPercent(0, divID); //set the upload status to be 0
}

function  fileUploadUpdate(index, file, currentProgress){

    //Logger.log("fileUploadUpdate(index, file, currentProgress)");

    var string = "index = " + index + " Uploading file " + file.fileName + " size is " + file.fileSize + " Progress = " + currentProgress;
    $('#status').text(string);

    var divID = getDivID(index, file);
    fileSetUploadPercent(currentProgress, divID);
}

function fileUploadFinished(index, file, json, timeDiff){

    var divID = getDivID(index, file);
    fileSetUploadPercent(100, divID);

    if(json.status == "OK"){
        createThumbnailDiv(index, file, json.url, json.thumbnailURL);
    }
}



function fileDocOver(event){
    $('#fileDropTarget').css('border', '2px dashed #000000').text("Drop files here");
}
$(".fileDrop").filedrop({

            fallback_id: 'fallbackFileDrop',
            url: '/api/upload.php',
            //    refresh: 1000,
            paramname: 'fileUpload',
            //    maxfiles: 25,           // Ignored if queuefiles is set > 0
            maxfilesize: 4,         // MB file size limit
            //    queuefiles: 0,          // Max files before queueing (for large volume uploads)
            //    queuewait: 200,         // Queue wait time if full
            //    data: {},
            //    headers: {},
            //    drop: empty,
            //    dragEnter: empty,
            //    dragOver: empty,
            //    dragLeave: empty,
            //    docEnter: empty,
            docOver: fileDocOver,
        //  docLeave: fileDocLeave,
            //  beforeEach: empty,
            //   afterAll: empty,
            //  rename: empty,
            //  error: function(err, file, i) {
            //    alert(err);
            //  },
            uploadStarted: fileUploadStarted,
            uploadFinished: fileUploadFinished,
            progressUpdated: fileUploadUpdate,
            //     speedUpdated
        });