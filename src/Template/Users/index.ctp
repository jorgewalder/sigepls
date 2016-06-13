<?php $this->assign('title', 'Usuários') ?>

<ul class="breadcrumb breadcrumb-lead mb0">
    <li><a href="/dashboard">Início</a></li>
    <li class="active"><span>Configurações</span></li>
    <li class="active"><span>Usuários</span></li>
</ul>

<div class="container-fluid">

    <div class="card">
        <div class="card-heading bg-light-blue-500 ">
            <div class="card-title">
                Usuários
            </div>
        </div>
        <div class="card-offset">
            <div class="card-offset-item text-right">
                <?= $this->Html->link('<em class="ion-android-add"></em>', ['action' => 'add'], ['class'=> 'btn-raised btn btn-danger btn-circle btn-lg', 'escape' => false, "tooltip-append-to-body"=>"true", "uib-tooltip"=>"Novo usuário"]) ?>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                      <th>ID</th>
                      <th><?= $this->Paginator->sort('username','Usuário') ?></th>
                      <th><?= $this->Paginator->sort('zone_id','Local') ?></th>
                      <th>Tipo</th>
                      <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $this->Number->format($user->id) ?></td>
                        <td><?= h($user->username) ?></td>
                        <td><?= h($user->zone->name) ?></td>
                        <td><?= h($user->role) ?></td>
                        <td class="actions">
                            <?= $this->Form->postLink('<em class="ion-trash-b"></em>', ['action' => 'delete', $user->id], ['confirm' => __('Deseja excluir o usuário "{0}"?', $user->username),'class'=>'btn btn-xs btn-danger ripple','escape'=>false, "tooltip-append-to-body"=>"true", "uib-tooltip"=>"Excluir"]) ?>
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
