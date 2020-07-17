<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Scale[]|\Cake\Collection\CollectionInterface $scales
 */
?>
<div class="scales index content">
    <?= $this->Html->link(__('New Scale'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Scales') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('model_type_id') ?></th>
                    <th><?= $this->Paginator->sort('scale') ?></th>
                    <th><?= $this->Paginator->sort('approved_yn') ?></th>
                    <th><?= $this->Paginator->sort('sort_order') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($scales as $scale): ?>
                <tr>
                    <td><?= $this->Number->format($scale->id) ?></td>
                    <td><?= $scale->has('model_type') ? $this->Html->link($scale->model_type->title, ['controller' => 'ModelTypes', 'action' => 'view', $scale->model_type->id]) : '' ?></td>
                    <td><?= h($scale->scale) ?></td>
                    <td><?= h($scale->approved_yn) ?></td>
                    <td><?= $this->Number->format($scale->sort_order) ?></td>
                    <td><?= h($scale->created) ?></td>
                    <td><?= h($scale->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $scale->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $scale->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $scale->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scale->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
