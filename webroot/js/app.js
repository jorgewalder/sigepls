/* ANGULARJS */
var app = angular.module('sustentavel', [
    "xeditable",
    'ui.bootstrap'
    ]);

/* controllers angularjs */
app.controller('indicatorsCtrl', function($http,$scope, config){

	// pega os indicadores
	var getIndicators = function() {

		$http.get(config.baseUrl + "indicators/register.json")
			.then(function(response){
					$scope.categories = response.data.categories;
				}, function(response){
					console.log(response);
				});
	};

	//update month
	$scope.updateMonth = function(item) {
    	//return $http.post('/updateUser', {id: $scope.user.id, name: data});
    	//console.log(data);
    	console.log(item);

    	//criando objeto month


    	if(!item.current_month.id){
    		console.log("insert\n");

    		var newObj = {
    			indicator_id: item.id,
    			zone_id: 1,
    			indicator_value: item.current_month.indicator_value,
    			obs: item.current_month.obs
    		};

			$http.post(config.baseUrl + "months/ajax_add",newObj)
				.then(function(response){
					item.current_month = response.data;
				},function(){});

    	}
    	else{
    		console.log("update\n");

    		//deletando as datas
    		delete item.current_month.created;
    		delete item.current_month.modified;

    		$http.put(config.baseUrl + "months/ajax_edit",item.current_month)
				.then(function(response){
					item.current_month = response.data;
				},function(){});
			
    	}

	}

	getIndicators();

});

app.run(function(editableOptions) {
	editableOptions.theme = 'bs3'; // bootstrap3 theme. Can be also 'bs2', 'default'
});


