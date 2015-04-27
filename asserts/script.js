$(".grid-container").mouseenter(function(){
	$(this).find(".grid_detail").css("position","absolute");
	$(this).find(".grid_detail p").slideDown("slow");
	$(this).find(".grid_detail a").slideDown("slow",function(){
		$(this).css("display","block");
	});
	$(this).find(".hover_content").fadeIn();
	$(this).find(".overlay").css("display","block");
})
.mouseleave(function(){
	/*$(this).find(".grid_detail").css("position","relative");*/
	$(this).find(".grid_detail p").slideUp("slow");
	$(this).find(".grid_detail a").slideUp("slow");
	$(this).find(".hover_content").fadeOut();
	$(this).find(".overlay").css("display","none");
});