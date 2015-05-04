grids.app.service('gridService',['$resource','$http','site_url',function($resource,$http,site_url){

	this.getGrids = function(success,error){
		$http.get(site_url+'grid/getAllGrids').success(success).error(error);
	};

	this.deleteGrid = function(id,success,error){
		$http.get(site_url+'grid/delete/'+id).success(success).error(error);
	};

}]);


grids.app.service('gridEditService',['$resource','$http','site_url','$rootScope',function($resource,$http,site_url,$rootScope){

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

	this.addCard = function(data, success, error){
		$http.post(site_url+'card/add_card', data, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
            }).success(success).error(error);
	}

	this.updateCard = function(data, success, error){
		$http.post(site_url+'card/add_card/update', data, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
            }).success(success).error(error);
	}

}]);

grids.app.service('navService',['$resource','$http','site_url',function($resource,$http,site_url){

	this.publish = function(data,success,error){
		$http.post(site_url+'grid/publish/',data,{
            headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=utf-8;'},
            transformRequest: function(obj) {
		        var str = [];
		        for(var p in obj)
		        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
		        return str.join("&");
		    }
		}).success(success).error(error);
	};
}]);