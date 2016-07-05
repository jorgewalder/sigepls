<?php $this->assign('title', 'Ocorrências') ?>

<ul class="breadcrumb breadcrumb-lead mb0">
    <li><a href="/dashboard">Início</a></li>
    <li class="active"><span>Indicadores</span></li>
    <li class="active"><span>Ocorrências</span></li>
</ul>

<div class="container-fluid">

    <div class="card">
        <div class="card-heading bg-light-blue-500 ">
            <div class="card-title">
                Ocorrências do <?= $zone->name; ?>
            </div>
        </div>
        <div class="card-body" ng-controller="mainCtrl">
            <?= $this->Form->create($event,['class'=>'form-horizontal']) ?>
            <fieldset>
                <div class="form-group mb-sm summernote-theme">
                    <label for="input-id-1" class="col-sm-2 control-label">Ocorrências</label>
                    <div class="col-sm-10">
                        <?php
                        echo $this->Form->textarea('event', array(
                            'label' => false,
                            'id' => 'smallbody',
                            'class' => 'form-control summernote'
                        ));
                        ?>
                    </div>
                </div>
            </fieldset>
            <?= $this->Form->button('Enviar',['class'=>'ml20 btn btn-danger']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<?= $this->Html->scriptStart(['block' => 'afterscripts']); ?>
    jQuery(document).ready(function () {
        App.summernote();
    });
<?= $this->Html->scriptEnd(); ?>
