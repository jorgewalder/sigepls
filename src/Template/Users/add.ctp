<?php $this->assign('title', 'Usuários - Novo usuário') ?>

<ul class="breadcrumb breadcrumb-lead mb0">
    <li><a href="/dashboard">Início</a></li>
    <li class="active"><span>Configurações</span></li>
    <li><?= $this->Html->link('Usuários', ['controller' => 'Users', 'action' => 'index']) ?></li>
    <li class="active"><span>Novo usuário</span></li>
</ul>

<div class="container-fluid">

    <div class="card">
        <div class="card-heading bg-light-blue-500 ">
            <div class="card-title">
                Novo usuário
            </div>
        </div>
        <div class="card-body">
            <?= $this->Form->create($user,['class'=>'form-horizontal']) ?>
            <fieldset>
                <div class="form-group mb-sm">
                    <label for="input-id-1" class="col-sm-2 control-label">Local</label>
                    <div class="col-sm-5">
                        <?= $this->Form->input('zone_id',['class'=>'form-control','label'=>false,'empty'=>'Selecione o local do usuário']); ?>
                    </div>
                </div>

                <div class="form-group mb-sm">
                    <label for="input-id-1" class="col-sm-2 control-label">Novo usuário</label>
                    <div class="col-sm-5">
                        <?= $this->Form->input('username',['class'=>'form-control','label'=>false]); ?>
                    </div>
                </div>
                <div class="form-group mb-sm">
                    <label for="input-id-1" class="col-sm-2 control-label">Senha</label>
                    <div class="col-sm-5">
                        <?= $this->Form->input('password',['class'=>'form-control','label'=>false]); ?>
                    </div>
                </div>
                <div class="form-group mb-sm">
                    <label for="input-id-1" class="col-sm-2 control-label">Tipo</label>
                    <div class="col-sm-5">
                        <?= $this->Form->input('role',['class'=>'form-control','label'=>false,'options' => ['user' => 'Normal','admin' => 'Admin', ]]); ?>
                    </div>
                </div>
            </fieldset>
            <?= $this->Form->button('Enviar',['class'=>'ml20 btn btn-danger']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
