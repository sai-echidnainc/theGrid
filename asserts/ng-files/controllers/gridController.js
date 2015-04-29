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
	var defimage = 'asserts/img/preview.png';
	$scope.gridArrOptions = [
		{ name:'Select Grid Arrangement' , value :'0'},
		{ name:'Random' , value :'random'},
		{ name:'Date' , value :'date'},
	];

	$scope.cardTypeOpt = [
		{ name:'Select Type' , value :'0'},
		{ name:'Text' , value :'text'},
		{ name:'Image' , value :'image'},
	];

	$scope.cardSizeOpt =[
		{ name:'1 * 1' , value :'one-by-one'},
		{ name:'1 * 2' , value :'one-by-two'},
		{ name:'2 * 1' , value :'two-by-one'},
		{ name:'2 * 2' , value :'two-by-two'},
		{ name:'2 * 3' , value :'two-by-three'},
		{ name:'3 * 2' , value :'three-by-two'},
		{ name:'3 * 3' , value :'three-by-three'},
	];

	$scope.cardType = $scope.cardTypeOpt[0].value;

	$scope.$watch('cardType', function() {
    	$scope.newcartType = $scope.cardType;
  	});

  	$scope.$watch('grid.imageThumbnail', function() {
    	$scope.grid.imageThumbnail = ($scope.grid.imageThumbnail == '') ? site_path+defimage : $scope.grid.imageThumbnail;
  	});

  	$scope.$watch('card.imageThumbnail', function() {
    	$scope.card.imageThumbnail = ($scope.grid.imageThumbnail == '') ? site_path+defimage : $scope.card.imageThumbnail;
  	});

	$scope.grid = {
		gridId : false,
		title : '',
		bgcolor : '#000000',
		arrangement : 'random',
		font : 'roboto',
	};

	$scope.cardData = {
		cardId : false,
		title : '',
		bgcolor : '#000000',
		fgcolor : '#ffffff',
		url : '',
		description :'',
		size : $scope.cardSizeOpt[0].value
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
			//console.log($scope.grid.imageThumbnail.indexOf(site_path));
			if($scope.grid.imageThumbnail.indexOf(site_path) >= 0){
				formData.append('gImageThumbnail',$scope.grid.imageThumbnail.replace(site_path, ""));
				console.log('Yes')				;
			}
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

	$scope.deleteCard = function(index){
		var cnf = confirm("Do you want to delete the card?");
		if(!cnf)
			return;
		var card_id = $scope.cardsData[index]['card_id'];
		gridEditService.deleteCard(card_id,function(data){
			if(data['status'] == "ok"){
				$scope.cardsData.splice(index,1);
			}else{
				alert(data['message']);
			}
		},function(error){

		});
	};

	$scope.imageUpload = function(element){
    	$scope.grid.imageThumbnail = false;
		var reader = new FileReader();
		reader.onload = function (e) {
        	$scope.grid.imageThumbnail =  e.target.result;
    	 	$scope.$digest();
    	};
    	reader.readAsDataURL(element.files[0]);
    };

	$scope.cardImageUpload = function(element){
    	$scope.card.imageThumbnail = false;
		var reader = new FileReader();
		reader.onload = function (e) {
        	$scope.card.imageThumbnail =  e.target.result;
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
							$scope.cardsData = data['data'];
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