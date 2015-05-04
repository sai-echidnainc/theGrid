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
		
		jQuery(window).load(function() {
			 jQuery('.flexslider').flexslider({ directionNav: false });
			jQuery(function(){
				jQuery('.masonry-container').masonry({
					itemSelector: '.grid_element',
					columnWidth: 1,
					isAnimated: true,
					gutter : 0
					// columnWidth: 152
				});
			});
			jQuery(window).trigger('resize');
		});
/*$('.masonry-container').masonry({
  itemSelector: '.grid_element',
  columnWidth: 100,
  isAnimated: true
});*/