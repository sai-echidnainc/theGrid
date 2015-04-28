grids.app.service('gridService',['$resource','$http','site_url',function($resource,$http,site_url){

	this.getGrids = function(success,error){
		$http.get(site_url+'grid/getAllGrids').success(success).error(error);
	};

	this.deleteGrid = function(id,success,error){
		$http.get(site_url+'grid/delete/'+id).success(success).error(error);
	};

}]);