<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Submission[]|\Cake\Collection\CollectionInterface $submissions
 */
?>
<div class="submissions index content">
    <?= $this->Html->link(__('New Submission'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Submissions') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('subject') ?></th>
                    <th><?= $this->Paginator->sort('model_type_id') ?></th>
                    <th><?= $this->Paginator->sort('submission_category_id') ?></th>
                    <th><?= $this->Paginator->sort('manufacturer_id') ?></th>
                    <th><?= $this->Paginator->sort('scale_id') ?></th>
                    <th><?= $this->Paginator->sort('main_image') ?></th>
                    <th><?= $this->Paginator->sort('status_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('approved') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($submissions as $submission): ?>
                <tr>
                    <td><?= $this->Number->format($submission->id) ?></td>
                    <td><?= $submission->has('user') ? $this->Html->link($submission->user->name, ['controller' => 'Users', 'action' => 'view', $submission->user->id]) : '' ?></td>
                    <td><?= h($submission->subject) ?></td>
                    <td><?= $submission->has('model_type') ? $this->Html->link($submission->model_type->title, ['controller' => 'ModelTypes', 'action' => 'view', $submission->model_type->id]) : '' ?></td>
                    <td><?= $submission->has('submission_category') ? $this->Html->link($submission->submission_category->title, ['controller' => 'SubmissionCategories', 'action' => 'view', $submission->submission_category->id]) : '' ?></td>
                    <td><?= $submission->has('manufacturer') ? $this->Html->link($submission->manufacturer->name, ['controller' => 'Manufacturers', 'action' => 'view', $submission->manufacturer->id]) : '' ?></td>
                    <td><?= $submission->has('scale') ? $this->Html->link($submission->scale->id, ['controller' => 'Scales', 'action' => 'view', $submission->scale->id]) : '' ?></td>
                    <td><?= $this->Number->format($submission->main_image) ?></td>
                    <td><?= $submission->has('status') ? $this->Html->link($submission->status->title, ['controller' => 'Statuses', 'action' => 'view', $submission->status->id]) : '' ?></td>
                    <td><?= h($submission->created) ?></td>
                    <td><?= h($submission->approved) ?></td>
                    <td><?= h($submission->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $submission->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $submission->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $submission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $submission->id)]) ?>
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
