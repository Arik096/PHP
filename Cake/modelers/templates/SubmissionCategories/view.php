<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SubmissionCategory $submissionCategory
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Submission Category'), ['action' => 'edit', $submissionCategory->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Submission Category'), ['action' => 'delete', $submissionCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $submissionCategory->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Submission Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Submission Category'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="submissionCategories view content">
            <h3><?= h($submissionCategory->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Parent Submission Category') ?></th>
                    <td><?= $submissionCategory->has('parent_submission_category') ? $this->Html->link($submissionCategory->parent_submission_category->title, ['controller' => 'SubmissionCategories', 'action' => 'view', $submissionCategory->parent_submission_category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Model Type') ?></th>
                    <td><?= $submissionCategory->has('model_type') ? $this->Html->link($submissionCategory->model_type->title, ['controller' => 'ModelTypes', 'action' => 'view', $submissionCategory->model_type->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Code') ?></th>
                    <td><?= h($submissionCategory->code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($submissionCategory->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $submissionCategory->has('status') ? $this->Html->link($submissionCategory->status->title, ['controller' => 'Statuses', 'action' => 'view', $submissionCategory->status->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($submissionCategory->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($submissionCategory->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($submissionCategory->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Approved Yn') ?></th>
                    <td><?= $submissionCategory->approved_yn ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($submissionCategory->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Submission Categories') ?></h4>
                <?php if (!empty($submissionCategory->child_submission_categories)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Parent Id') ?></th>
                            <th><?= __('Model Type Id') ?></th>
                            <th><?= __('Code') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Status Id') ?></th>
                            <th><?= __('Approved Yn') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($submissionCategory->child_submission_categories as $childSubmissionCategories) : ?>
                        <tr>
                            <td><?= h($childSubmissionCategories->id) ?></td>
                            <td><?= h($childSubmissionCategories->parent_id) ?></td>
                            <td><?= h($childSubmissionCategories->model_type_id) ?></td>
                            <td><?= h($childSubmissionCategories->code) ?></td>
                            <td><?= h($childSubmissionCategories->title) ?></td>
                            <td><?= h($childSubmissionCategories->description) ?></td>
                            <td><?= h($childSubmissionCategories->status_id) ?></td>
                            <td><?= h($childSubmissionCategories->approved_yn) ?></td>
                            <td><?= h($childSubmissionCategories->created) ?></td>
                            <td><?= h($childSubmissionCategories->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'SubmissionCategories', 'action' => 'view', $childSubmissionCategories->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'SubmissionCategories', 'action' => 'edit', $childSubmissionCategories->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'SubmissionCategories', 'action' => 'delete', $childSubmissionCategories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childSubmissionCategories->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Submissions') ?></h4>
                <?php if (!empty($submissionCategory->submissions)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Subject') ?></th>
                            <th><?= __('Model Type Id') ?></th>
                            <th><?= __('Submission Category Id') ?></th>
                            <th><?= __('Manufacturer Id') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Scale Id') ?></th>
                            <th><?= __('Main Image') ?></th>
                            <th><?= __('Status Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Approved') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($submissionCategory->submissions as $submissions) : ?>
                        <tr>
                            <td><?= h($submissions->id) ?></td>
                            <td><?= h($submissions->user_id) ?></td>
                            <td><?= h($submissions->subject) ?></td>
                            <td><?= h($submissions->model_type_id) ?></td>
                            <td><?= h($submissions->submission_category_id) ?></td>
                            <td><?= h($submissions->manufacturer_id) ?></td>
                            <td><?= h($submissions->description) ?></td>
                            <td><?= h($submissions->scale_id) ?></td>
                            <td><?= h($submissions->main_image) ?></td>
                            <td><?= h($submissions->status_id) ?></td>
                            <td><?= h($submissions->created) ?></td>
                            <td><?= h($submissions->approved) ?></td>
                            <td><?= h($submissions->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Submissions', 'action' => 'view', $submissions->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Submissions', 'action' => 'edit', $submissions->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Submissions', 'action' => 'delete', $submissions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $submissions->id)]) ?>
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
