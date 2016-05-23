/* ANGULARJS */
var app = angular.module('sustentavel', [
    "xeditable",
    'ui.bootstrap'
    ]);

/* controllers angularjs */
app.controller('indicatorsCtrl', function($http,$scope, config){

    var zone;

	// pega os indicadores
	var getIndicators = function() {

		$http.get(config.baseUrl + "indicators/register.json")
			.then(function(response){
                console.log(response);
					$scope.categories = response.data.categories;
                    zone = response.data.zone;
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
    			zone_id: zone,
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

app.controller('relatoriesCtrl', function($http,$scope, config){

    $scope.date = [];
    $scope.config = config;
    $scope.config.minDate = new Date(2016,0);

    $scope.datepickerOptDe = {
        datepickerMode: 'month',
        minMode: 'month',
        minDate: config.minDate
    };

    $scope.datepickerOptAte = {
        datepickerMode: 'month',
        minMode: 'month', 
        minDate: config.minDate
    };

    $scope.changeMinDateOptAte = function(){
        //var ateMinDate = angular.copy($scope.date.de);
        //ateMinDate.setMonth(ateMinDate.getMonth());
        $scope.datepickerOptAte.minDate = $scope.date.de;
        if($scope.date.de != undefined && $scope.date.ate != undefined){
            $scope.generate();
        }
    }

    $scope.opende = function() {
        $scope.openedde = true;
    };

    $scope.openate = function() {
        $scope.openedate = true;
    };

    // GENERATE RELATORIES
    $scope.generate = function(){

        if($scope.date.de > $scope.date.ate){alert("A data inicial deve ser antes da data final"); return;} 
        console.log($scope.date.de);
        console.log($scope.date.ate);

        
    }

});

app.run(function(editableOptions) {
	editableOptions.theme = 'bs3'; // bootstrap3 theme. Can be also 'bs2', 'default'
});


