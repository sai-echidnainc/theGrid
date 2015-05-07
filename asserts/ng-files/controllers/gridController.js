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

grids.app.controller('gridEditController',['gridEditService','$scope','site_path','$rootScope',function(gridEditService,$scope,site_path,$rootScope){

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
		{ name:'1 * 1' , value :'onebyone'},
		{ name:'1 * 2' , value :'onebytwo'},
		{ name:'2 * 1' , value :'twobyone'},
		{ name:'2 * 2' , value :'twobytwo'},
		{ name:'2 * 3' , value :'twobythree'},
		{ name:'3 * 2' , value :'threebytwo'},
		{ name:'3 * 3' , value :'threebythree'},
	];

	$scope.cardAlignmentOpt = [
		{ name:'left align' , value :'left'},
		{ name:'center align' , value :'center'},
		{ name:'right align' , value :'right'},
	];

	$scope.loaders = {
		saveGrid : false,
		saveCard : false,
		deleteCard : false
	};

	$scope.cardType = $scope.cardTypeOpt[0].value;

	$scope.$watch('cardType', function() {
    	$scope.newcartType = $scope.cardType;
  	});

  	$scope.$watch('grid.imageThumbnail', function() {
    	$scope.grid.imageThumbnail = ($scope.grid.imageThumbnail == '') ? site_path+defimage : $scope.grid.imageThumbnail;
  	});

  	$scope.$watch('cardData.imageThumbnail', function() {
    	$scope.cardData.imageThumbnail = ($scope.cardData.imageThumbnail == '') ? site_path+defimage : $scope.cardData.imageThumbnail;
  	});

  	$scope.$watch('grid.gridId',function(){
  		if($scope.grid.gridId && $scope.grid.gridId != ""){
  			$rootScope.$broadcast('gridId', { gridData: $scope.grid });
  		}
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
		size : $scope.cardSizeOpt[0].value,
		align: $scope.cardAlignmentOpt[0].value
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
		$scope.loaders.saveGrid = true;
		var formData = new FormData();
		formData.append('gTitle', $scope.grid['title']);
		formData.append('BGColor', $scope.grid['bgcolor']);
		formData.append('gType', $scope.grid['arrangement']);
		formData.append('gFont', $scope.grid['font']);
		formData.append('gImage', $scope.grid.image);
		if($scope.grid.gridId == '' || !$scope.grid.gridId){
			gridEditService.addGrid(formData,function(data){
				$scope.loaders.saveGrid = false;
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
			}
			gridEditService.updateGrid(formData,function(data){
				$scope.loaders.saveGrid = false;
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

	$scope.saveCard = function(){
		if($scope.grid.gridId == "")
			return;
		$scope.loaders.saveCard = true;
		var formData = new FormData();
		formData.append('gId', $scope.grid.gridId);
		formData.append('cType', $scope.newcartType);
		formData.append('cName', $scope.cardData['title']);
		formData.append('cOverColor', $scope.cardData['bgcolor']);
		formData.append('cForeColor', $scope.cardData['fgcolor']);
		formData.append('cLink', $scope.cardData['url']);
		formData.append('cDesc', $scope.cardData['description']);
		formData.append('cSize', $scope.cardData['size']);
		formData.append('cImageAlign', $scope.cardData['align']);
		if($scope.newcartType == "image")		
			formData.append('cImage', $scope.cardData.image);
		if($scope.cardData.cardId == '' || !$scope.cardData.cardId){
			gridEditService.addCard(formData,function(data){
				$scope.loaders.saveCard = false;
				if(data['status'] == "ok"){
					$scope.cardData['cardId'] = data['card_id'];
					$scope.editInit($scope.grid.gridId);
					alert("Card Created Sucessfully");
				}else{
					alert(data['message']);
				}
			},function(error){

			});
		}else{
			formData.append('cId', $scope.cardData['cardId']);
			if($scope.cardData.imageThumbnail.indexOf(site_path) >= 0){
				formData.append('cImageThumbnail',$scope.cardData.imageThumbnail.replace(site_path, ""));
			}
			gridEditService.updateCard(formData,function(data){
				$scope.loaders.saveCard = false;
				if(data['status'] == "ok"){
					$scope.editInit($scope.grid.gridId);
					alert("Card Updated Sucessfully");
				}else{
					alert(data['message']);
				}
			},function(error){
				
			});
		}

	}

	$scope.editCard = function(index) {
		console.log(index);
		$scope.cardType = $scope.cardsData[index]['type'];
		$scope.cardData = {
			cardId : $scope.cardsData[index]['card_id'],
			title : $scope.cardsData[index]['title'],
			bgcolor : $scope.cardsData[index]['bgcolor'],
			fgcolor : $scope.cardsData[index]['fgcolor'],
			url : $scope.cardsData[index]['link'],
			description :$scope.cardsData[index]['description'],
			size : $scope.cardsData[index]['size'],
			imageThumbnail : site_path + $scope.cardsData[index]['image'],
			align : $scope.cardsData[index]['align'],
		};
	}

	$scope.cancelCard = function(){
		$scope.cardType = '0';
		$scope.cardData = {
			cardId : false,
			title : '',
			bgcolor : '#000000',
			fgcolor : '#ffffff',
			url : '',
			description :'',
			size : $scope.cardSizeOpt[0].value,
			imageThumbnail : '',
			align : $scope.cardAlignmentOpt[0].value
		};
	};

	$scope.deleteCard = function(index){
		var cnf = confirm("Do you want to delete the card?");
		if(!cnf)
			return;
		$scope.loaders.deleteCard = true;
		var card_id = $scope.cardsData[index]['card_id'];
		gridEditService.deleteCard(card_id,function(data){
			$scope.loaders.deleteCard = false;
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
    	$scope.cardData.imageThumbnail = false;
		var reader = new FileReader();
		reader.onload = function (e) {
        	$scope.cardData.imageThumbnail =  e.target.result;
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
					imageThumbnail : site_path + data['data']['grid_image'],
					isPublished : data['data']['is_published'],
					slug : data['data']['grid_slug']
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


grids.app.controller('navController',['$scope','site_path','$rootScope','navService',function($scope,site_path,$rootScope,navService){

	$scope.pBtnTxt = "Publish Grid";
	$scope.publishLoad = false;
	$scope.isPublished = false;
	$scope.slug = false;
	$scope.$watch('isPublished',function(){
		$scope.pBtnTxt = ($scope.isPublished) ? 'Unpublish Grid' : 'Publish Grid' ;
	});

	$rootScope.$on('gridId', function (event, args) {
		console.log(args);
		$scope.gridID = args.gridData.gridId;
		$scope.slug = args.gridData.slug;
		if(!args.gridData.isPublished || args.gridData.isPublished == 'N'){
			$scope.isPublished = false;
		}else{
			$scope.isPublished = true;
		}
	});

	$scope.publish = function(){
		$scope.publishLoad = true;
		var data = {
			gridID : $scope.gridID,
			publishStatus : ($scope.isPublished) ? 'N' : 'Y'
		};
		navService.publish(data,function(data){			
			$scope.publishLoad = false;
			if(data['status'] == 'ok'){
				$scope.isPublished = !$scope.isPublished;
			}
		},function(error){

		});
	};

}]);
