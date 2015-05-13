$(document).ready(function(){
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

    var content_height= function(){
            var ht=window.innerHeight;
            console.log(ht);
            var nav= $('.header-container').outerHeight();
            console.log(nav);
            var filter_ht= $('.grid_land_sort').outerHeight();
            console.log(filter_ht);
            var container_ht=$('.grid_landing_content').outerHeight();
            console.log(container_ht);
            var foot_ht=$('.footer_container').outerHeight();
            console.log(foot_ht);
            var min_container_ht= ht-nav-foot_ht-filter_ht;
            console.log(min_container_ht);
            $('.grid_landing_content').css("min-height", min_container_ht);
        };
    $(window).load(function(){
        content_height();
    });
    $(window).resize(function(){
        content_height();
    });
});