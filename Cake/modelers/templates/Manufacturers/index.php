<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Manufacturer[]|\Cake\Collection\CollectionInterface $manufacturers
 */
?>
<div class="manufacturers index content">
    <?= $this->Html->link(__('New Manufacturer'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Manufacturers') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('status_id') ?></th>
                    <th><?= $this->Paginator->sort('approved_yn') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($manufacturers as $manufacturer): ?>
                <tr>
                    <td><?= $this->Number->format($manufacturer->id) ?></td>
                    <td><?= h($manufacturer->name) ?></td>
                    <td><?= $manufacturer->has('status') ? $this->Html->link($manufacturer->status->title, ['controller' => 'Statuses', 'action' => 'view', $manufacturer->status->id]) : '' ?></td>
                    <td><?= h($manufacturer->approved_yn) ?></td>
                    <td><?= h($manufacturer->created) ?></td>
                    <td><?= h($manufacturer->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $manufacturer->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $manufacturer->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $manufacturer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $manufacturer->id)]) ?>
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
