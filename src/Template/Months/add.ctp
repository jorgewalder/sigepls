<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Months'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Indicators'), ['controller' => 'Indicators', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Indicator'), ['controller' => 'Indicators', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Zones'), ['controller' => 'Zones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Zone'), ['controller' => 'Zones', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="months form large-9 medium-8 columns content">
    <?= $this->Form->create($month) ?>
    <fieldset>
        <legend><?= __('Add Month') ?></legend>
        <?php
            echo $this->Form->input('indicator_id', ['options' => $indicators, 'empty' => true]);
            echo $this->Form->input('zone_id', ['options' => $zones, 'empty' => true]);
            echo $this->Form->input('month');
            echo $this->Form->input('year');
            echo $this->Form->input('indicator_value');
            echo $this->Form->input('indicator_goal');
            echo $this->Form->input('monthscol');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
