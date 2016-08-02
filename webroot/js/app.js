/* ANGULARJS */
var app = angular.module('sustentavel', [
    "xeditable",
    'ui.bootstrap',
    'ngSanitize',
    'ngCsv'
]);

/* controllers angularjs */
app.controller('mainCtrl', function($http, $scope, config) {
    $scope.indicator = [];
    $scope.indicator.type = indicatorType;
});

app.controller('indicatorsCtrl', function($http, $scope, config) {

    var zone;

    // pega os indicadores
    var getIndicators = function() {

        $http.get(config.baseUrl + "indicators/register.json")
            .then(function(response) {
                console.log(response);
                $scope.categories = response.data.categories;
                zone = response.data.zone;
            }, function(response) {
                console.log(response);
            });
    };

    //update month
    $scope.updateMonth = function(item) {
        //return $http.post('/updateUser', {id: $scope.user.id, name: data});
        //console.log(data);
        console.log(item);

        //criando objeto month


        if (!item.current_month.id) {
            console.log("insert\n");

            var newObj = {
                indicator_id: item.id,
                zone_id: zone,
                indicator_value: item.current_month.indicator_value,
                obs: item.current_month.obs
            };

            $http.post(config.baseUrl + "months/ajax_add", newObj)
                .then(function(response) {
                    item.current_month = response.data;
                }, function() {});

        } else {
            console.log("update\n");

            //deletando as datas
            delete item.current_month.created;
            delete item.current_month.modified;
            delete item.current_month.moment;

            $http.put(config.baseUrl + "months/ajax_edit", item.current_month)
                .then(function(response) {
                    item.current_month = response.data;
                }, function() {});

        }

    }

    getIndicators();

});

app.controller('relatoriesCtrl', function($http, $scope, config) {

    $scope.relatorioGerado = !true;

    $scope.selectedZone = 'PROINFRA';

    $scope.date = {
        de: new Date(),
        ate: new Date()
    };

    $scope.config = config;
    $scope.config.minDate = new Date(2016, 0);

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

    $scope.changeMinDateOptAte = function() {
        //var ateMinDate = angular.copy($scope.date.de);
        //ateMinDate.setMonth(ateMinDate.getMonth());
        $scope.datepickerOptAte.minDate = $scope.date.de;
        if ($scope.date.de != undefined && $scope.date.ate != undefined) {
            if ($scope.date.de > $scope.date.ate) {
                alert("A data inicial deve ser antes da data final");
                return;
            }
        }
    }

    $scope.opende = function() {
        $scope.openedde = true;
    };

    $scope.openate = function() {
        $scope.openedate = true;
    };

    $scope.closeRelatorio = function() {
        $scope.relatorioGerado = false;
    }

    // GENERATE RELATORIES
    var printRelatorio = function(data) {
        console.log(data);
        $scope.categories = data;
        $scope.relatorioGerado = true;
    }
    function nextChar(c) {
        return String.fromCharCode(c.charCodeAt(0) + 1);
    }

    var exportData = function () {

        $scope.getArray = [];


        var obj = {};
        var column = 'a';

        function selectZones(element, index, array) {
            //criando um objeto para add na linha do csv
            obj[column] = element.name + '(R.A)';
            column = nextChar(column);
            obj[column] = element.name + '(Meta)';
            column = nextChar(column);
        }

        function selectZoneValues(element, index, array) {
                obj[column] = (element.ra != null) ? element.ra.soma : 'vazio';
                column = nextChar(column);
                obj[column] = (element.ra != null) ? element._joinData.goal * element.ra.qtd : element._joinData.goal;
                column = nextChar(column);
        }

        function selectIndicators(element, index, array) {
            //criando um objeto para add na linha do csv
            obj = {};
            obj['a'] = element.name;

            // aqui precisa pegar os values de [Local R.A | Local META | ...] ou não
            if($scope.zones != 'GERAL'){
                obj['b'] = (element.months[0] != undefined) ? element.months[0].soma : 'vazio';
                obj['c'] = (element.months[0] != undefined && element.months[0].qtd) ? element.zones[0]._joinData.goal * element.months[0].qtd : element.zones[0]._joinData.goal;
            }else{
                column = 'b';
                element.zones.forEach(selectZoneValues);
            }

            $scope.getArray.push(obj);
        }

        function printing(element, index, array) {

            if(element.indicators.length > 0){
                obj = {};

                //colocar categoria
                $scope.getArray.push({a: element.title});
                $scope.getArray.push({a: " "});

                //colocar headers: Indicador | [Local R.A | Local META | ...]
                obj['a'] = 'Indicador';
                column = 'b';
                element.indicators[0].zones.forEach(selectZones);
                $scope.getArray.push(obj);

                //colocar nome dos indicadores e os valores
                element.indicators.forEach(selectIndicators);
                $scope.getArray.push({a: " "});

            }

        }

        $scope.categories.forEach(printing);
        console.log($scope.getArray);
    };

    $scope.generate = function() {

        if($scope.selectedZone == 'PROINFRA'){
            $scope.zones = 'PROINFRA';
        }else {
            $scope.zones = 'GERAL';
        }

        //$scope.zones = 'GERAL';

        $http.get(config.baseUrl + "indicators/ajax_get_report.json", {
                params: {
                    de: $scope.date.de,
                    ate: $scope.date.ate,
                    zones: $scope.zones
                }
            })
            .then(function(response) {
                printRelatorio(response.data);
                exportData();
            }, function() {});
    };







































});

app.run(function(editableOptions) {
    editableOptions.theme = 'bs3'; // bootstrap3 theme. Can be also 'bs2', 'default'
});
