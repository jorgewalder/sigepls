<?php $this->assign('name', 'Indicadores') ?>

<ul class="breadcrumb breadcrumb-lead mb0">
    <li><a href="/dashboard">Início</a></li>
    <li class="active"><span>Configurações</span></li>
    <li class="active"><span>Indicadores</span></li>
</ul>

<div class="container-fluid">

    <div class="card">
        <div class="card-heading bg-light-blue-500 ">
            <div class="card-title">
                Indicadores de Sustentabilidade
            </div>
        </div>
        <div class="card-offset">
            <div class="card-offset-item text-right">
                <?= $this->Html->link('<em class="ion-android-add"></em>', ['action' => 'add'], ['class'=> 'btn-raised btn btn-danger btn-circle btn-lg', 'escape' => false, "tooltip-append-to-body"=>"true", "uib-tooltip"=>"Novo indicador"]) ?>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                      <th>ID</th>
                      <th><?= $this->Paginator->sort('name','Indicador') ?></th>
                      <th>Categoria</th>
                      <th>Tipo</th>
                      <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($indicators as $indicator): ?>
                    <tr>
                        <td><?= $this->Number->format($indicator->id) ?></td>
                        <td><?= h($indicator->name) ?></td>
                        <td><?= h($indicator->category->title) ?></td>
                        <td><?= h($indicator->type) ?></td>
                        <td class="actions">
                            <?= $this->Html->link('<em class="ion-edit"></em>', ['action' => 'edit', $indicator->id], ['class'=>'btn btn-xs btn-success ripple','escape'=>false, "tooltip-append-to-body"=>"true", "uib-tooltip"=>"Alterar"]) ?>
                            <?= $this->Form->postLink('<em class="ion-trash-b"></em>', ['action' => 'delete', $indicator->id], ['confirm' => __('Deseja excluir a categoria "{0}"?', $indicator->name),'class'=>'btn btn-xs btn-danger ripple','escape'=>false, "tooltip-append-to-body"=>"true", "uib-tooltip"=>"Excluir"]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
        <nav class="text-center">
          <ul class="pagination">
            <?= $this->Paginator->prev('<span aria-hidden="true">«</span>', ['escape' => false]) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('<span aria-hidden="true">»</span>', ['escape' => false]) ?>
          </ul>
        </nav>
    </div>
</div>
