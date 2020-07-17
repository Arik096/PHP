<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SubmissionFieldValue $submissionFieldValue
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Submission Field Value'), ['action' => 'edit', $submissionFieldValue->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Submission Field Value'), ['action' => 'delete', $submissionFieldValue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $submissionFieldValue->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Submission Field Values'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Submission Field Value'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="submissionFieldValues view content">
            <h3><?= h($submissionFieldValue->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Submission') ?></th>
                    <td><?= $submissionFieldValue->has('submission') ? $this->Html->link($submissionFieldValue->submission->id, ['controller' => 'Submissions', 'action' => 'view', $submissionFieldValue->submission->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Submission Field') ?></th>
                    <td><?= $submissionFieldValue->has('submission_field') ? $this->Html->link($submissionFieldValue->submission_field->id, ['controller' => 'SubmissionFields', 'action' => 'view', $submissionFieldValue->submission_field->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($submissionFieldValue->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($submissionFieldValue->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($submissionFieldValue->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Value') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($submissionFieldValue->value)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
