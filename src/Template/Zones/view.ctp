<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Zone'), ['action' => 'edit', $zone->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Zone'), ['action' => 'delete', $zone->id], ['confirm' => __('Are you sure you want to delete # {0}?', $zone->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Zones'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Zone'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Months'), ['controller' => 'Months', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Month'), ['controller' => 'Months', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="zones view large-9 medium-8 columns content">
    <h3><?= h($zone->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($zone->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($zone->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Months') ?></h4>
        <?php if (!empty($zone->months)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Indicator Id') ?></th>
                <th><?= __('Zone Id') ?></th>
                <th><?= __('Month') ?></th>
                <th><?= __('Year') ?></th>
                <th><?= __('Indicator Value') ?></th>
                <th><?= __('Indicator Goal') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Monthscol') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($zone->months as $months): ?>
            <tr>
                <td><?= h($months->id) ?></td>
                <td><?= h($months->indicator_id) ?></td>
                <td><?= h($months->zone_id) ?></td>
                <td><?= h($months->month) ?></td>
                <td><?= h($months->year) ?></td>
                <td><?= h($months->indicator_value) ?></td>
                <td><?= h($months->indicator_goal) ?></td>
                <td><?= h($months->modified) ?></td>
                <td><?= h($months->created) ?></td>
                <td><?= h($months->monthscol) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Months', 'action' => 'view', $months->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Months', 'action' => 'edit', $months->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Months', 'action' => 'delete', $months->id], ['confirm' => __('Are you sure you want to delete # {0}?', $months->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
