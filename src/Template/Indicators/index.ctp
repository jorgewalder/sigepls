<?php $this->assign('title', 'Indicadores') ?>

<ul class="breadcrumb breadcrumb-lead">
    <li><a href="/dashboard">Início</a></li>
    <li class="active"><span>Indicadores</span></li>
</ul>

<div class="container-fluid indicators-page">
    <div class="card">
        <div class="card-heading">
            <div class="card-title">
                Preenchimento dos Indicadores de Sustentabilidade
                <span class="label label-primary"><?= $settings['month'] ?> / <?= $settings['year'] ?></span>

            </div>
            <div class="text-muted">Prazo limite para preenchimento: 10/05</div>
        </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width:5%">#</th>
                            <th style="width:25%">Indicador</th>
                            <th style="width:5%"></th>
                            <th style="width:25%">Fonte de dados</th>
                            <th style="width:20%">Resultado alcançado</th>
                            <th style="width:20%">Meta</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($indicators as $indicator): ?>
                        <tr>
                            <td><?= $indicator->id ?></td>
                            <td><?= $indicator->name ?></td>
                            <td>
                            <i class="ion-information-circled icon-fw" data-toggle="tooltip" data-placement="top" title="<?= $indicator->formula ?>"></i>
                            </td>
                            <td><?= $indicator->source ?></td>
                            <td><?= ($indicator->current_month) ? $indicator->current_month->indicator_value : "" ?></td>
                            <td><?= $indicator->goal ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
    </div>
</div>

<div ng-controller="ajaxCtrl">
    {{teste}}
</div>
