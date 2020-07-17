<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Manufacturer $manufacturer
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Manufacturer'), ['action' => 'edit', $manufacturer->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Manufacturer'), ['action' => 'delete', $manufacturer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $manufacturer->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Manufacturers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Manufacturer'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="manufacturers view content">
            <h3><?= h($manufacturer->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($manufacturer->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $manufacturer->has('status') ? $this->Html->link($manufacturer->status->title, ['controller' => 'Statuses', 'action' => 'view', $manufacturer->status->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($manufacturer->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($manufacturer->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($manufacturer->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Approved Yn') ?></th>
                    <td><?= $manufacturer->approved_yn ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($manufacturer->description)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Website') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($manufacturer->website)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Submissions') ?></h4>
                <?php if (!empty($manufacturer->submissions)) : ?>
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
                        <?php foreach ($manufacturer->submissions as $submissions) : ?>
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
