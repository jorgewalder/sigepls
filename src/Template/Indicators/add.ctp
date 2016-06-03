<?php $this->assign('title', 'Indicadores - Novo indicador') ?>

<ul class="breadcrumb breadcrumb-lead mb0">
    <li><a href="/dashboard">Início</a></li>
    <li class="active"><span>Configurações</span></li>
    <li><?= $this->Html->link('Indicadores', ['controller' => 'Indicadores', 'action' => 'index']) ?></li>
    <li class="active"><span>Novo indicador</span></li>
</ul>

<div class="container-fluid">

    <div class="card">
        <div class="card-heading bg-light-blue-500 ">
            <div class="card-title">
                Novo Indicador de Sustentabilidade
            </div>
        </div>
        <div class="card-body">
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
                        <?= $this->Form->select('type',['estrategico'=>'Estratégico','operacional'=>'Operacional'],['class'=>'form-control','label'=>false]); ?>
                    </div>
                </div>
            </fieldset>
            <?php if($zones):?>
            <fieldset>
                <h5 style="margin:0">Metas:</h5><small>somente indicadores tipo operacional</small>
                <?php foreach($zones as $zone): ?>
                <div class="form-group mb-sm">
                    <label for="input-id-1" class="col-sm-2 control-label"><?= $zone->name ?></label>
                    <div class="col-md-3">
                        <?= $this->Form->hidden('zones.'.$zone->id.'.id',['value'=>$zone->id]) ?>
                        <?= $this->Form->input('zones.'.$zone->id.'._joinData.goal',['class'=>'form-control','label'=>false]); ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </fieldset>
            <?php endif;?>
            <?= $this->Form->button('Enviar',['class'=>'ml20 btn btn-danger']) ?>
            <?= $this->Form->end() ?>
        </div>

    </div>
</div>
