<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SubmissionField $submissionField
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Submission Field'), ['action' => 'edit', $submissionField->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Submission Field'), ['action' => 'delete', $submissionField->id], ['confirm' => __('Are you sure you want to delete # {0}?', $submissionField->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Submission Fields'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Submission Field'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="submissionFields view content">
            <h3><?= h($submissionField->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Model Type') ?></th>
                    <td><?= $submissionField->has('model_type') ? $this->Html->link($submissionField->model_type->title, ['controller' => 'ModelTypes', 'action' => 'view', $submissionField->model_type->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Field Name') ?></th>
                    <td><?= h($submissionField->field_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Element Type') ?></th>
                    <td><?= h($submissionField->element_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $submissionField->has('status') ? $this->Html->link($submissionField->status->title, ['controller' => 'Statuses', 'action' => 'view', $submissionField->status->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($submissionField->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($submissionField->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($submissionField->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Required Yn') ?></th>
                    <td><?= $submissionField->required_yn ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Admin Yn') ?></th>
                    <td><?= $submissionField->admin_yn ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Label') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($submissionField->label)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Enum Options') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($submissionField->enum_options)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Submission Field Values') ?></h4>
                <?php if (!empty($submissionField->submission_field_values)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Submission Id') ?></th>
                            <th><?= __('Submission Field Id') ?></th>
                            <th><?= __('Value') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($submissionField->submission_field_values as $submissionFieldValues) : ?>
                        <tr>
                            <td><?= h($submissionFieldValues->id) ?></td>
                            <td><?= h($submissionFieldValues->submission_id) ?></td>
                            <td><?= h($submissionFieldValues->submission_field_id) ?></td>
                            <td><?= h($submissionFieldValues->value) ?></td>
                            <td><?= h($submissionFieldValues->created) ?></td>
                            <td><?= h($submissionFieldValues->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'SubmissionFieldValues', 'action' => 'view', $submissionFieldValues->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'SubmissionFieldValues', 'action' => 'edit', $submissionFieldValues->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'SubmissionFieldValues', 'action' => 'delete', $submissionFieldValues->id], ['confirm' => __('Are you sure you want to delete # {0}?', $submissionFieldValues->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
