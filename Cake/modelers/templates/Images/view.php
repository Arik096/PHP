<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Image $image
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Image'), ['action' => 'edit', $image->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Image'), ['action' => 'delete', $image->id], ['confirm' => __('Are you sure you want to delete # {0}?', $image->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Images'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Image'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="images view content">
            <h3><?= h($image->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Original Filename') ?></th>
                    <td><?= h($image->original_filename) ?></td>
                </tr>
                <tr>
                    <th><?= __('Storage Filename') ?></th>
                    <td><?= h($image->storage_filename) ?></td>
                </tr>
                <tr>
                    <th><?= __('Mime Type') ?></th>
                    <td><?= h($image->mime_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($image->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Submission') ?></th>
                    <td><?= $image->has('submission') ? $this->Html->link($image->submission->id, ['controller' => 'Submissions', 'action' => 'view', $image->submission->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $image->has('status') ? $this->Html->link($image->status->title, ['controller' => 'Statuses', 'action' => 'view', $image->status->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($image->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Filesize') ?></th>
                    <td><?= $this->Number->format($image->filesize) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($image->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($image->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($image->description)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
