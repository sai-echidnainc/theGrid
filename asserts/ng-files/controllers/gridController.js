grids.app.controller('gridController',['gridService','$scope',function(gridService,$scope){
	

	$scope.gridOrderBy = 0;
	
	$scope.deleteGrid = function(grid_id,index){
		var cnf = confirm("Do you want to delete the the whole grid?");
		if(!cnf)
			return;
		gridService.deleteGrid(grid_id,function(data){
			if(data['status'] == "ok"){
				$scope.gridData.splice(index,1);
			}else{
				alert(data['message']);
			}
		},function(error){

		});
	};


	var init = function(){
		gridService.getGrids(function(data){
			$scope.gridData = data;
			setTimeout(function(){				
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
			},200);
		},function(error){

		});
	};

	init();

}]);