$(".grid-container").mouseenter(function(){
	$(this).find(".grid_detail").css("position","absolute");
	$(this).find(".grid_detail p").stop().slideDown("slow");
	$(this).find(".grid_detail a").stop().slideDown("slow",function(){
		$(this).css("display","block");
	});
	$(this).find(".hover_content").fadeIn();
	$(this).find(".overlay").css("display","block");
})
.mouseleave(function(){
	/*$(this).find(".grid_detail").css("position","relative");*/
	$(this).find(".grid_detail p").stop().slideUp("slow");
	$(this).find(".grid_detail a").stop().slideUp("slow");
	$(this).find(".hover_content").fadeOut();
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
