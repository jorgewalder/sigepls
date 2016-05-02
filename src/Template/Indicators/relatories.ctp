<?php $this->assign('title', 'Relatórios') ?>

<ul class="breadcrumb breadcrumb-lead mb0">
    <li><a href="/dashboard">Início</a></li>
    <li class="active"><span>Relatórios</span></li>
</ul>

<div class="container-fluid indicators-page" ng-controller="relatoriesCtrl">
    
    <div class="card">
        <div class="card-heading">
            <div class="card-title">
                Dados do relatório
            </div>
        </div>
        <div class="card-body">
	        <div class="form-horizontal">
	        
         		<div class="form-group mb-sm">
                    <label class="col-sm-1 col-sm-offset-1 control-label">De</label>

                    <div class="col-sm-4">       
                    <div class="ui-datepicker-responsive">
						<uib-datepicker class="ui-datepicker dp-head-primary dp-table-primary" ng-model="date.de" ng-change="changeMinDateOptAte()" datepicker-options="datepickerOptDe"></uib-datepicker>
		            </div>       
                    </div>
                
                    <label class="col-sm-1 control-label">Até</label>
                    <div class="col-sm-4">   
                    <div class="ui-datepicker-responsive">
                    <uib-datepicker class="ui-datepicker dp-head-primary dp-table-primary" ng-model="date.ate" ng-change="changeMinDateOptAte()" datepicker-options="datepickerOptAte"></uib-datepicker>    
                    </div>
                    </div>
                </div>
	        </div>
        </div>
    </div>

   
</div>