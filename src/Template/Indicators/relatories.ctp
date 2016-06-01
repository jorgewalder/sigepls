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
                <button ng-show="relatorioGerado" class="btn btn-primary pull-right" ng-click="closeRelatorio()">Gerar outro relatório</button>
            </div>

        </div>
        <div class="card-body" ng-show="!relatorioGerado">
	        <div class="form-horizontal">

         		<div class="form-group mb-sm">
                    <label class="col-md-1 control-label">De</label>

                    <div class="col-md-4">
                    <div class="ui-datepicker-responsive">
						<uib-datepicker class="ui-datepicker dp-head-primary dp-table-primary" ng-model="date.de" ng-change="changeMinDateOptAte()" datepicker-options="datepickerOptDe"></uib-datepicker>
		            </div>
                    </div>

                    <label class="col-md-1 control-label">Até</label>
                    <div class="col-md-4">
                    <div class="ui-datepicker-responsive">
                    <uib-datepicker class="ui-datepicker dp-head-primary dp-table-primary" ng-model="date.ate" ng-change="changeMinDateOptAte()" datepicker-options="datepickerOptAte"></uib-datepicker>
                    </div>
                    </div>
                </div>

                <fieldset style="border-top: 1px dashed rgba(162,162,162,.25);padding-top: 15px;" ng-show="'<?= $this->request->session()->read('Auth.User.role')?>' == 'PROGEP'">
                    <div class="form-group">
                      <label class="col-md-2 control-label">Tipo de relatório</label>
                      <div class="col-md-10">
                        <label class="radio-inline c-radio">
                          <input type="radio" value="PROGEP" ng-model="selectedZone"><span class="ion-record"></span> PROGEP
                        </label>
                        <label class="radio-inline c-radio">
                          <input type="radio" value="GERAL" ng-model="selectedZone"><span class="ion-record"></span> GERAL
                        </label>
                      </div>
                    </div>
                  </fieldset>

                <div class="form-group mb-sm mt">
                    <div class="col-sm-4">
                        <button ng-click="generate()" class="btn btn-primary">Gerar relatório</button>
                    </div>
                </div>
	        </div>
        </div>
        <div ng-repeat="category in categories" ng-show="relatorioGerado">
            <div ng-if="category.indicators.length > 0" class="panel">
                <div class="panel-heading">{{category.title}}</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width:25%">Indicador</th>
                                    <th style="width:5%"></th>
                                    <th style="width:15%" ng-repeat-start="item in category.indicators[0].zones">{{item.name}} (R.A)</th>
                                    <th style="width:15%" ng-repeat-end>{{item.name}} Meta</th>
                                    <th style="width:30%" ng-show="selectedZone != 'GERAL'">Observações</th>
                                </tr>
                            </thead>
                            <tbody>

                            <tr ng-repeat="indicator in category.indicators">
                                <td title="{{indicator.name}}">
                                    {{indicator.name | limitTo : 40}}{{indicator.name.length > 40 ? '...' : ''}}
                                </td>
                                <td>
                                    <i class="ion-information-circled icon-fw" tooltip-append-to-body="true" uib-tooltip="{{indicator.formula}}"></i>
                                </td>
                                <td ng-repeat-start="item in indicator.zones">
                                    {{indicator.months[0].soma}}
                                </td>
                                <td ng-repeat-end>
                                    {{indicator.zones[0]._joinData.goal * indicator.months[0].qtd}}
                                </td>
                                <td ng-show="selectedZone != 'GERAL'">
                                    {{indicator.months[0].obs || 'vazio' }}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
