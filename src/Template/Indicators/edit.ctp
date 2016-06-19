<?php $this->assign('title', 'Indicadores - Editar indicador') ?>

<ul class="breadcrumb breadcrumb-lead mb0">
    <li><a href="/dashboard">Início</a></li>
    <li class="active"><span>Configurações</span></li>
    <li><?= $this->Html->link('Indicadores', ['controller' => 'Indicators', 'action' => 'index']) ?></li>
    <li class="active"><span>Editar indicador</span></li>
</ul>

<div class="container-fluid">

    <div class="card">
        <div class="card-heading bg-light-blue-500 ">
            <div class="card-title">
                Editar Indicador de Sustentabilidade
            </div>
        </div>
        <div class="card-body" ng-controller="mainCtrl">
            <?= $this->Form->create($indicator,['class'=>'form-horizontal']) ?>
            <fieldset>
                <div class="form-group mb-sm">
                    <label for="input-id-1" class="col-sm-2 control-label">Categoria</label>
                    <div class="col-sm-5">
                        <?= $this->Form->input('category_id',['class'=>'form-control','label'=>false,'empty'=>'Selecione a categoria']); ?>
                    </div>
                </div>
                <div class="form-group mb-sm">
                    <label for="input-id-1" class="col-sm-2 control-label">Título</label>
                    <div class="col-sm-5">
                        <?= $this->Form->input('name',['class'=>'form-control','label'=>false]); ?>
                    </div>
                </div>
                <div class="form-group mb-sm">
                    <label for="input-id-1" class="col-sm-2 control-label">Fórmula</label>
                    <div class="col-sm-5">
                        <?= $this->Form->input('formula',['class'=>'form-control','label'=>false]); ?>
                    </div>
                </div>
                <div class="form-group mb-sm">
                    <label for="input-id-1" class="col-sm-2 control-label">Tipo</label>
                    <div class="col-sm-5">
                        <?= $this->Form->select('type',['estrategico'=>'Estratégico','operacional'=>'Operacional'],['ng-model'=>'indicator.type','class'=>'form-control','label'=>false]); ?>
                    </div>
                </div>
            </fieldset>
            <?php if($indicator->has('zones')):?>
            <fieldset ng-show="indicator.type == 'operacional'">
                <?php foreach($indicator->zones as $key => $zone): ?>
                <div class="form-group mb-sm">
                    <label for="input-id-1" class="col-sm-2 control-label"><?= $zone->name ?></label>
                    <div class="col-md-3">
                        <?= $this->Form->hidden('zones.'.$key.'.id',['value'=>$zone->id]) ?>
                        <?= $this->Form->input('zones.'.$key.'._joinData.goal',['class'=>'form-control','label'=>false]); ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </fieldset>
            <?php endif;?>

            <?php if($indicator->has('zones')):?>
            <fieldset ng-show="indicator.type == 'estrategico'">
                <?php foreach($indicator->zones as $key => $zone): ?>
                <?php if(!empty($zone->users)): ?>
                <div class="form-group mb-sm">
                    <label for="input-id-1" class="col-sm-2 control-label"><?= $zone->name ?></label>
                    <div class="col-md-3">
                        <?= $this->Form->hidden('zones.'.$key.'.id',['value'=>$zone->id]) ?>
                        <?= $this->Form->input('zones.'.$key.'._joinData.goal',['class'=>'form-control','label'=>false]); ?>
                    </div>
                </div>
                <?php endif;?>
                <?php endforeach; ?>
            </fieldset>
            <?php endif;?>

            <?= $this->Form->button('Enviar',['class'=>'ml20 btn btn-danger']) ?>
            <?= $this->Form->end() ?>
        </div>

    </div>
</div>

<script>var indicatorType = '<?= $indicator->type ?>';</script>
