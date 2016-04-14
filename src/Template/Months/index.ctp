<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Month'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Indicators'), ['controller' => 'Indicators', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Indicator'), ['controller' => 'Indicators', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Zones'), ['controller' => 'Zones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Zone'), ['controller' => 'Zones', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="months index large-9 medium-8 columns content">
    <h3><?= __('Months') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('indicator_id') ?></th>
                <th><?= $this->Paginator->sort('zone_id') ?></th>
                <th><?= $this->Paginator->sort('month') ?></th>
                <th><?= $this->Paginator->sort('year') ?></th>
                <th><?= $this->Paginator->sort('indicator_value') ?></th>
                <th><?= $this->Paginator->sort('indicator_goal') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('monthscol') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($months as $month): ?>
            <tr>
                <td><?= $this->Number->format($month->id) ?></td>
                <td><?= $month->has('indicator') ? $this->Html->link($month->indicator->name, ['controller' => 'Indicators', 'action' => 'view', $month->indicator->id]) : '' ?></td>
                <td><?= $month->has('zone') ? $this->Html->link($month->zone->name, ['controller' => 'Zones', 'action' => 'view', $month->zone->id]) : '' ?></td>
                <td><?= h($month->month) ?></td>
                <td><?= $this->Number->format($month->year) ?></td>
                <td><?= h($month->indicator_value) ?></td>
                <td><?= h($month->indicator_goal) ?></td>
                <td><?= h($month->modified) ?></td>
                <td><?= h($month->created) ?></td>
                <td><?= h($month->monthscol) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $month->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $month->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $month->id], ['confirm' => __('Are you sure you want to delete # {0}?', $month->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
