<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SubmissionFieldValue[]|\Cake\Collection\CollectionInterface $submissionFieldValues
 */
?>
<div class="submissionFieldValues index content">
    <?= $this->Html->link(__('New Submission Field Value'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Submission Field Values') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('submission_id') ?></th>
                    <th><?= $this->Paginator->sort('submission_field_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($submissionFieldValues as $submissionFieldValue): ?>
                <tr>
                    <td><?= $this->Number->format($submissionFieldValue->id) ?></td>
                    <td><?= $submissionFieldValue->has('submission') ? $this->Html->link($submissionFieldValue->submission->id, ['controller' => 'Submissions', 'action' => 'view', $submissionFieldValue->submission->id]) : '' ?></td>
                    <td><?= $submissionFieldValue->has('submission_field') ? $this->Html->link($submissionFieldValue->submission_field->id, ['controller' => 'SubmissionFields', 'action' => 'view', $submissionFieldValue->submission_field->id]) : '' ?></td>
                    <td><?= h($submissionFieldValue->created) ?></td>
                    <td><?= h($submissionFieldValue->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $submissionFieldValue->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $submissionFieldValue->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $submissionFieldValue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $submissionFieldValue->id)]) ?>
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
