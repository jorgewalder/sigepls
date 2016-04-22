/* ANGULARJS */
var app = angular.module('sustentavel', ["xeditable"]);

/* controllers angularjs */
app.controller('indicatorsCtrl', function($http,$scope, config){

	// pega os indicadores
	var getIndicators = function() {

		$http.get(config.baseUrl + "indicators.json")
			.then(function(response){
					$scope.indicators = response.data.indicators;
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
    			indicator_value: item.current_month.indicator_value
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


/* JQUERY */
$(function () {
  $('[data-toggle="tooltip"]').tooltip({
    'selector': '',
    'placement': 'top',
    'container':'body'
  })
})
