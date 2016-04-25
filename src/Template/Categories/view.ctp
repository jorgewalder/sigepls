<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Indicators'), ['controller' => 'Indicators', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Indicator'), ['controller' => 'Indicators', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categories view large-9 medium-8 columns content">
    <h3><?= h($category->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($category->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($category->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Indicators') ?></h4>
        <?php if (!empty($category->indicators)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Category Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Formula') ?></th>
                <th><?= __('Source') ?></th>
                <th><?= __('Goal') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($category->indicators as $indicators): ?>
            <tr>
                <td><?= h($indicators->id) ?></td>
                <td><?= h($indicators->category_id) ?></td>
                <td><?= h($indicators->name) ?></td>
                <td><?= h($indicators->formula) ?></td>
                <td><?= h($indicators->source) ?></td>
                <td><?= h($indicators->goal) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Indicators', 'action' => 'view', $indicators->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Indicators', 'action' => 'edit', $indicators->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Indicators', 'action' => 'delete', $indicators->id], ['confirm' => __('Are you sure you want to delete # {0}?', $indicators->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
