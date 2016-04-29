<?php $this->assign('title', 'Categorias - Atualizar Categoria') ?>

<ul class="breadcrumb breadcrumb-lead mb0">
    <li><a href="/dashboard">Início</a></li>
    <li class="active"><span>Configurações</span></li>
    <li><?= $this->Html->link('Categorias', ['controller' => 'Categories', 'action' => 'index']) ?></li>
    <li class="active"><span>Atualizar categoria</span></li>
</ul>

<div class="container-fluid">
    
    <div class="card">
        <div class="card-heading bg-light-blue-500 ">
            <div class="card-title">
                Atualizar Categoria
            </div>
        </div>
        <div class="card-body">
            <?= $this->Form->create($category,['class'=>'form-horizontal']) ?>    
            <fieldset>
                <div class="form-group">
                    <label for="input-id-1" class="col-sm-2 control-label">Categoria</label>
                    <div class="col-sm-5">       
                        <?= $this->Form->input('title',['class'=>'form-control','label'=>false]); ?>
                    </div>
                </div>
            </fieldset>
            <?= $this->Form->button('Enviar',['class'=>'ml20 btn btn-danger']) ?>
            <?= $this->Form->end() ?>
        </div>
                    
    </div>
</div>