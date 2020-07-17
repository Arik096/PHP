<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SubmissionField[]|\Cake\Collection\CollectionInterface $submissionFields
 */
?>
<div class="submissionFields index content">
    <?= $this->Html->link(__('New Submission Field'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Submission Fields') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('model_type_id') ?></th>
                    <th><?= $this->Paginator->sort('field_name') ?></th>
                    <th><?= $this->Paginator->sort('element_type') ?></th>
                    <th><?= $this->Paginator->sort('required_yn') ?></th>
                    <th><?= $this->Paginator->sort('admin_yn') ?></th>
                    <th><?= $this->Paginator->sort('status_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($submissionFields as $submissionField): ?>
                <tr>
                    <td><?= $this->Number->format($submissionField->id) ?></td>
                    <td><?= $submissionField->has('model_type') ? $this->Html->link($submissionField->model_type->title, ['controller' => 'ModelTypes', 'action' => 'view', $submissionField->model_type->id]) : '' ?></td>
                    <td><?= h($submissionField->field_name) ?></td>
                    <td><?= h($submissionField->element_type) ?></td>
                    <td><?= h($submissionField->required_yn) ?></td>
                    <td><?= h($submissionField->admin_yn) ?></td>
                    <td><?= $submissionField->has('status') ? $this->Html->link($submissionField->status->title, ['controller' => 'Statuses', 'action' => 'view', $submissionField->status->id]) : '' ?></td>
                    <td><?= h($submissionField->created) ?></td>
                    <td><?= h($submissionField->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $submissionField->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $submissionField->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $submissionField->id], ['confirm' => __('Are you sure you want to delete # {0}?', $submissionField->id)]) ?>
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
