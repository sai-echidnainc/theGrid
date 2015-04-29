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

grids.app.controller('gridEditController',['gridEditService','$scope','site_path',function(gridEditService,$scope,site_path){

	//Default options
	$scope.gridArrOptions = [
		{ name:'Select Grid Arrangement' , value :'0'},
		{ name:'Random' , value :'random'},
		{ name:'Date' , value :'date'},
	];

	$scope.grid = {
		gridId : false,
		title : '',
		bgcolor : '#000000',
		arrangement : 'random',
		font : 'roboto',
	};

	$scope.defGrid = angular.copy($scope.grid);
	var formReset = function(){
		$scope.grid = angular.copy($scope.defGrid);
		$scope.upLoadFile = '';
	};

	var cardJQUpdate = function() {
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
	};

	$scope.saveGrid = function(){
		var formData = new FormData();
		formData.append('gTitle', $scope.grid['title']);
		formData.append('BGColor', $scope.grid['bgcolor']);
		formData.append('gType', $scope.grid['arrangement']);
		formData.append('gFont', $scope.grid['font']);
		formData.append('gImage', $scope.grid.image);
		if($scope.grid.gridId == '' || !$scope.grid.gridId){
			gridEditService.addGrid(formData,function(data){
				if(data['status'] == 'ok' ){				
					$scope.grid.gridId = data['grid_id'];
					alert('Grid Saved Successfully');
					//formReset();
				}else{
					alert(data['message']);
				}
			},function(error){

			});
		}else{
			formData.append('gId',$scope.grid['gridId']);
			gridEditService.updateGrid(formData,function(data){
				if(data['status'] == 'ok' ){			
					alert('Grid updated Successfully');
					//formReset();
				}else{
					alert(data['message']);
				}
			},function(error){

			});
		}
	}


	$scope.imageUpload = function(element){
    	$scope.grid.imageThumbnail = false;
		var reader = new FileReader();
		reader.onload = function (e) {
        	$scope.grid.imageThumbnail =  e.target.result;
    	 	$scope.$digest();
    	};
    	reader.readAsDataURL(element.files[0]);
    };

	$scope.init = function(){
		//alert("create grid check");
	};
	$scope.editInit = function(Grid_id){
		//alert("Edit grid check" + Grid_id);
		gridEditService.getGridData(Grid_id,function(data){
			if(data['status'] == 'ok'){
				//console.log(data['data']);
				$scope.grid = {
					gridId : data['data']['grid_id'],
					title : data['data']['grid_name'],
					bgcolor : data['data']['grid_color'],
					arrangement : data['data']['grid_arrangement'],
					font : data['data']['grid_font'],
					imageThumbnail : site_path + data['data']['grid_image']
				};
				// Calling the another ajax to get the cards data				

					gridEditService.getAllCards($scope.grid.gridId, function(data){
						if(data['status'] == 'ok'){
							$scope.cards = data['data'];
							setTimeout(cardJQUpdate,200);
						}
					},function(error){

					});

				//End of the cards

			}else{
				alert(data['message']);
			}
		},function(error){

		});

	};
}]);