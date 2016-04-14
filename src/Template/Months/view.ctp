<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Month'), ['action' => 'edit', $month->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Month'), ['action' => 'delete', $month->id], ['confirm' => __('Are you sure you want to delete # {0}?', $month->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Months'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Month'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Indicators'), ['controller' => 'Indicators', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Indicator'), ['controller' => 'Indicators', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Zones'), ['controller' => 'Zones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Zone'), ['controller' => 'Zones', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="months view large-9 medium-8 columns content">
    <h3><?= h($month->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Indicator') ?></th>
            <td><?= $month->has('indicator') ? $this->Html->link($month->indicator->name, ['controller' => 'Indicators', 'action' => 'view', $month->indicator->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Zone') ?></th>
            <td><?= $month->has('zone') ? $this->Html->link($month->zone->name, ['controller' => 'Zones', 'action' => 'view', $month->zone->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Month') ?></th>
            <td><?= h($month->month) ?></td>
        </tr>
        <tr>
            <th><?= __('Indicator Value') ?></th>
            <td><?= h($month->indicator_value) ?></td>
        </tr>
        <tr>
            <th><?= __('Indicator Goal') ?></th>
            <td><?= h($month->indicator_goal) ?></td>
        </tr>
        <tr>
            <th><?= __('Monthscol') ?></th>
            <td><?= h($month->monthscol) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($month->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Year') ?></th>
            <td><?= $this->Number->format($month->year) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($month->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($month->created) ?></td>
        </tr>
    </table>
</div>
