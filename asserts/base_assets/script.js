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
<<<<<<< HEAD
/*$('.masonry-container').masonry({
  itemSelector: '.grid_element',
  columnWidth: 100,
  isAnimated: true
});*/
=======

		objArray.detach().appendTo(container);
	});


	$('body').on('click','#search.btn',function(){
		var searchTxt = $("#searchTxt").val().toLowerCase();
		if(searchTxt == "" || typeof searchTxt == "undefined"){
			$('.sorting').removeClass('cusHide');
			return;
		}
		console.log('[data-title*="'+searchTxt+'"]');
		$('.sorting').removeClass('cusHide').not('[data-title*="'+searchTxt+'"]').addClass('cusHide');
	});

});
>>>>>>> 347693e4c016b70e2f655301d8c1c8c5115a3831
