grids.app.service('gridService',['$resource','$http','site_url',function($resource,$http,site_url){

	this.getGrids = function(success,error){
		$http.get(site_url+'grid/getAllGrids').success(success).error(error);
	};

	this.deleteGrid = function(id,success,error){
		$http.get(site_url+'grid/delete/'+id).success(success).error(error);
	};

}]);


grids.app.service('gridEditService',['$resource','$http','site_url',function($resource,$http,site_url){

	this.addGrid = function(data, success, error){
		$http.post(site_url+'grid/add_grid', data, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
            }).success(success).error(error);
	}

	this.updateGrid = function(data, success, error){
		$http.post(site_url+'grid/add_grid/update', data, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
            }).success(success).error(error);
	}

	this.getGridData = function(grid_id,success,error){
		$http.get(site_url+'grid/getGrid/'+grid_id).success(success).error(error);
	};
	this.getAllCards = function(grid_id,success,error){
		$http.get(site_url+'card/getCards/'+grid_id).success(success).error(error);
	};
	this.deleteCard = function(card_id,success,error){
		$http.get(site_url+'card/delete/'+card_id).success(success).error(error);
	};
}]);	