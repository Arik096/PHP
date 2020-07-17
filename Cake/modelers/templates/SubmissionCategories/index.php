<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SubmissionCategory[]|\Cake\Collection\CollectionInterface $submissionCategories
 */
?>
<div class="submissionCategories index content">
    <?= $this->Html->link(__('New Submission Category'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Submission Categories') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('parent_id') ?></th>
                    <th><?= $this->Paginator->sort('model_type_id') ?></th>
                    <th><?= $this->Paginator->sort('code') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('status_id') ?></th>
                    <th><?= $this->Paginator->sort('approved_yn') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($submissionCategories as $submissionCategory): ?>
                <tr>
                    <td><?= $this->Number->format($submissionCategory->id) ?></td>
                    <td><?= $submissionCategory->has('parent_submission_category') ? $this->Html->link($submissionCategory->parent_submission_category->title, ['controller' => 'SubmissionCategories', 'action' => 'view', $submissionCategory->parent_submission_category->id]) : '' ?></td>
                    <td><?= $submissionCategory->has('model_type') ? $this->Html->link($submissionCategory->model_type->title, ['controller' => 'ModelTypes', 'action' => 'view', $submissionCategory->model_type->id]) : '' ?></td>
                    <td><?= h($submissionCategory->code) ?></td>
                    <td><?= h($submissionCategory->title) ?></td>
                    <td><?= $submissionCategory->has('status') ? $this->Html->link($submissionCategory->status->title, ['controller' => 'Statuses', 'action' => 'view', $submissionCategory->status->id]) : '' ?></td>
                    <td><?= h($submissionCategory->approved_yn) ?></td>
                    <td><?= h($submissionCategory->created) ?></td>
                    <td><?= h($submissionCategory->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $submissionCategory->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $submissionCategory->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $submissionCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $submissionCategory->id)]) ?>
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
