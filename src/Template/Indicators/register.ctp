<?php $this->assign('title', 'Indicadores') ?>

<ul class="breadcrumb breadcrumb-lead mb0">
    <li><a href="/dashboard">Início</a></li>
    <li class="active"><span>Indicadores</span></li>
</ul>

<div class="container-fluid indicators-page" ng-controller="indicatorsCtrl">
    
    <div class="card">
        <div class="card-heading">
            <div class="card-title">
                Preenchimento dos Indicadores de Sustentabilidade
                <span class="label label-primary"><?= $settings['month'] ?> / <?= $settings['year'] ?></span>

            </div>
            <div class="text-muted">Prazo limite para preenchimento: <?= $settings['limitP'] ?></div>
        </div>
    </div>


    <div class="panel" ng-repeat="category in categories">
        <div class="panel-heading">{{category.title}}</div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width:5%">#</th>
                            <th style="width:25%">Indicador</th>
                            <th style="width:5%"></th>
                            <th style="width:15%">Resultado alcançado</th>
                            <th style="width:15%">Meta</th>
                            <th style="width:30%">Observações</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    <tr ng-repeat="item in category.indicators">
                        <td>{{item.id}}</td>
                        <td title="{{item.name}}">{{item.name | limitTo : 40}}{{item.name.length > 40 ? '...' : ''}}</td>
                        <td><i class="ion-information-circled icon-fw" tooltip-append-to-body="true" uib-tooltip="{{item.formula}}"></i></td>
                        <td><a href="#" editable-text="item.current_month.indicator_value" onaftersave="updateMonth(item)">{{ item.current_month.indicator_value || 'vazio'}}</a></td>
                        <td>{{item.goal}}</td>
                        <td><a href="#" editable-text="item.current_month.obs" onaftersave="updateMonth(item)">{{ item.current_month.obs || 'vazio' }}</a></td>
                    </tr>
                    </tbody>
                </table>
            </div>        
        </div>
    </div>
</div>