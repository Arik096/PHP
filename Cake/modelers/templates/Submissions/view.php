<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Submission $submission
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Submission'), ['action' => 'edit', $submission->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Submission'), ['action' => 'delete', $submission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $submission->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Submissions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Submission'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="submissions view content">
            <h3><?= h($submission->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $submission->has('user') ? $this->Html->link($submission->user->name, ['controller' => 'Users', 'action' => 'view', $submission->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Subject') ?></th>
                    <td><?= h($submission->subject) ?></td>
                </tr>
                <tr>
                    <th><?= __('Model Type') ?></th>
                    <td><?= $submission->has('model_type') ? $this->Html->link($submission->model_type->title, ['controller' => 'ModelTypes', 'action' => 'view', $submission->model_type->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Submission Category') ?></th>
                    <td><?= $submission->has('submission_category') ? $this->Html->link($submission->submission_category->title, ['controller' => 'SubmissionCategories', 'action' => 'view', $submission->submission_category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Manufacturer') ?></th>
                    <td><?= $submission->has('manufacturer') ? $this->Html->link($submission->manufacturer->name, ['controller' => 'Manufacturers', 'action' => 'view', $submission->manufacturer->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Scale') ?></th>
                    <td><?= $submission->has('scale') ? $this->Html->link($submission->scale->id, ['controller' => 'Scales', 'action' => 'view', $submission->scale->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $submission->has('status') ? $this->Html->link($submission->status->title, ['controller' => 'Statuses', 'action' => 'view', $submission->status->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($submission->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Main Image') ?></th>
                    <td><?= $this->Number->format($submission->main_image) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($submission->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Approved') ?></th>
                    <td><?= h($submission->approved) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($submission->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($submission->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Images') ?></h4>
                <?php if (!empty($submission->images)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Original Filename') ?></th>
                            <th><?= __('Storage Filename') ?></th>
                            <th><?= __('Mime Type') ?></th>
                            <th><?= __('Filesize') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Submission Id') ?></th>
                            <th><?= __('Status Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($submission->images as $images) : ?>
                        <tr>
                            <td><?= h($images->id) ?></td>
                            <td><?= h($images->original_filename) ?></td>
                            <td><?= h($images->storage_filename) ?></td>
                            <td><?= h($images->mime_type) ?></td>
                            <td><?= h($images->filesize) ?></td>
                            <td><?= h($images->title) ?></td>
                            <td><?= h($images->description) ?></td>
                            <td><?= h($images->submission_id) ?></td>
                            <td><?= h($images->status_id) ?></td>
                            <td><?= h($images->created) ?></td>
                            <td><?= h($images->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Images', 'action' => 'view', $images->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Images', 'action' => 'edit', $images->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Images', 'action' => 'delete', $images->id], ['confirm' => __('Are you sure you want to delete # {0}?', $images->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Submission Field Values') ?></h4>
                <?php if (!empty($submission->submission_field_values)) : ?>
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
                        <?php foreach ($submission->submission_field_values as $submissionFieldValues) : ?>
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
