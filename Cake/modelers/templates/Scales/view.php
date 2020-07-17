<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Scale $scale
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Scale'), ['action' => 'edit', $scale->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Scale'), ['action' => 'delete', $scale->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scale->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Scales'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Scale'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="scales view content">
            <h3><?= h($scale->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Model Type') ?></th>
                    <td><?= $scale->has('model_type') ? $this->Html->link($scale->model_type->title, ['controller' => 'ModelTypes', 'action' => 'view', $scale->model_type->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Scale') ?></th>
                    <td><?= h($scale->scale) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($scale->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sort Order') ?></th>
                    <td><?= $this->Number->format($scale->sort_order) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($scale->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($scale->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Approved Yn') ?></th>
                    <td><?= $scale->approved_yn ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Submissions') ?></h4>
                <?php if (!empty($scale->submissions)) : ?>
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
                        <?php foreach ($scale->submissions as $submissions) : ?>
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
