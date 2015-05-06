
$(document).ready(function(){
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



	$(".grid_element").mouseenter(function(){
		$(this).find(".descp").css("position","absolute");
		$(this).find(".descp").stop().fadeIn("slow");
	})
	.mouseleave(function(){
		$(this).find(".descp").stop().fadeOut("slow");
	});


	$('body').on('change','#sortBy', function(){
		var sortVal = $(this).val();
		if(sortVal=='0')
			return;
		var objArray = $('.sorting');
		var container = $('#gridContainer');

		objArray.sort(function(a,b){
			var an = a.getAttribute('data-' + sortVal),
				bn = b.getAttribute('data-' + sortVal);

			if(an > bn) {
				return 1;
			}
			if(an < bn) {
				return -1;
			}
			return 0;
		});

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


	/*----------------------------content min-height---------------------------*/

	var content_height= function(){
		var ht= window.innerHeight;
		var nav= $('.header-container').outerHeight();
		var filter_ht= $('.search_sort_div').outerHeight();
		var container_ht=$('.grid_view_section').outerHeight();
		var foot_ht=$('.footer_container').outerHeight();
		var min_container_ht= ht-nav-filter_ht-foot_ht;
		$('.grid_view_section').css("min-height", min_container_ht);
	};
	var content_height1= function(){
		var ht= window.innerHeight;
		var nav= $('.header-container').outerHeight();
		var container_ht=$('.grid_msnry').outerHeight();
		var foot_ht=$('.footer_container').outerHeight();
		var min_container_ht= ht-nav-foot_ht;
		$('.grid_msnry').css("min-height", min_container_ht);
	};
	var content_height2= function(){
		var ht= window.innerHeight;
		var nav= $('.header-container').outerHeight();
		var filter_ht= $('.grid_land_sort').outerHeight();
		var container_ht=$('.grid_landing_content').outerHeight();
		var foot_ht=$('.footer_container').outerHeight();
		var min_container_ht= ht-nav-foot_ht;
		$('.grid_landing_content').css("min-height", min_container_ht);
	};

	var masFunc = function(){
			jQuery('.masonry-container').masonry({
				itemSelector: '.grid_element',
				columnWidth: 1,
				isAnimated: true,
				gutter : 0
				// columnWidth: 152
			});
		};
	$(window).resize(function(){
		setTimeout(function(){
			masFunc();
		},200);
		content_height();
		content_height1();
	});
	jQuery(window).load(function() {;
			masFunc();
			jQuery(window).trigger('resize');
	});

});