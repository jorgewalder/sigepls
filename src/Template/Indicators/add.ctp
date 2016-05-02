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
                    <label for="input-id-1" class="col-sm-2 control-label">Meta</label>
                    <div class="col-sm-5">       
                        <?= $this->Form->input('goal',['class'=>'form-control','label'=>false]); ?>
                    </div>
                </div>     
            </fieldset>
            <?= $this->Form->button('Enviar',['class'=>'ml20 btn btn-danger']) ?>
            <?= $this->Form->end() ?>
        </div>
                    
    </div>
</div>
