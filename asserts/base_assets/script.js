
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

});