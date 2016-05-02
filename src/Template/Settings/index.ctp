<?php $this->assign('title', 'Parâmetros do sistema') ?>

<ul class="breadcrumb breadcrumb-lead mb0">
    <li><a href="/dashboard">Início</a></li>
    <li class="active"><span>Configurações</span></li>
    <li class="active"><span>Parâmetros do sistema</span></li>
</ul>

<div class="container-fluid">
    
    <div class="card">
        <div class="card-heading bg-light-blue-500">
            <div class="card-title">
                Parâmetros do sistema
            </div>
        </div>
        <div class="card-body">
            <?= $this->Form->create('Settings',['class'=>'form-horizontal']) ?>    
            <fieldset>
                 <?php foreach ($settings as $chave => $setting): ?>
                    <div class="form-group mb-sm">
                        <label for="input-id-1" class="col-sm-2 control-label"><?= $setting->code ?></label>
                        <div class="col-sm-5">
                            <input type="hidden" name="<?= $chave ?>[id]" value="<?= $setting->id ?>">

                            <?php if($setting->type === "month" ): ?>
                                <?= $this->Form->select($chave . '[value]', $meses , ['label' => false, 'value' => $setting->value, 'class' => 'form-control']) ?> 
                            <?php elseif($setting->type === "year" ): ?>
                                <?= $this->Form->select($chave . '[value]', $anos , ['label' => false, 'value' => $setting->value, 'class' => 'form-control']) ?>
                            <?php else: ?>
                                <?= $this->Form->input($chave . '[value]', ['label' => false, 'value' => $setting->value, 'class' => 'form-control']) ?>
                            <?php endif; ?>  
                        </div>
                    </div>
                <?php endforeach; ?>
            </fieldset>
            <?= $this->Form->button('Enviar',['class'=>'ml20 btn btn-danger']) ?>
            <?= $this->Form->end() ?>
        </div>
                    
    </div>
</div>
