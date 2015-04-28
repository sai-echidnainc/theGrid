$(".grid-container").mouseenter(function(){
	$(this).find(".grid_detail").css("position","absolute");
	$(this).find(".grid_detail p").stop().slideDown("slow");
	$(this).find(".grid_detail a").stop().slideDown("slow",function(){
		$(this).css("display","block");
	});
	$(this).find(".hover_content").stop().fadeIn();
	$(this).find(".overlay").css("display","block");
})
.mouseleave(function(){
	/*$(this).find(".grid_detail").css("position","relative");*/
	$(this).find(".grid_detail p").stop().slideUp("slow");
	$(this).find(".grid_detail a").stop().slideUp("slow");
	$(this).find(".hover_content").stop().fadeOut();
	$(this).find(".overlay").css("display","none");
});
$('#picker').colpick({
	colorScheme:'dark',
	layout:'rgbhex',
	color:'ff8800',
	onSubmit:function(hsb,hex,rgb,el) {
		$("#gridBGColor").css('background-color', '#'+hex);
		$(el).colpickHide();
	}
});

$(".crd").mouseenter(function(){
    $(this).find(".card_title").css("position","absolute");
    $(this).find(".card_title").stop().slideDown("slow");
    $(this).find(".preview_hover").stop().fadeIn();
    /*$(this).find(".overlay").css("display","block");*/
})
.mouseleave(function(){
    /*$(this).find(".grid_detail").css("position","relative");*/
    $(this).find(".card_title").stop().slideUp("slow");   
    $(this).find(".preview_hover").stop().fadeOut();
    /*$(this).find(".overlay").css("display","none");*/
});


$('.card_type_select').change(function(){
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

/*--------------------------File Upload---------------------------*/
