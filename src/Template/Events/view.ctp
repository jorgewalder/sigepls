<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Event'), ['action' => 'edit', $event->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Event'), ['action' => 'delete', $event->id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Zones'), ['controller' => 'Zones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Zone'), ['controller' => 'Zones', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="events view large-9 medium-8 columns content">
    <h3><?= h($event->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Zone') ?></th>
            <td><?= $event->has('zone') ? $this->Html->link($event->zone->name, ['controller' => 'Zones', 'action' => 'view', $event->zone->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($event->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Event') ?></h4>
        <?= $this->Text->autoParagraph(h($event->event)); ?>
    </div>
</div>
