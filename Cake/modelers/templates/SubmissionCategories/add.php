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
            <?= $this->Html->link(__('List Submission Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="submissionCategories form content">
            <?= $this->Form->create($submissionCategory) ?>
            <fieldset>
                <legend><?= __('Add Submission Category') ?></legend>
                <?php
                    echo $this->Form->control('parent_id', ['options' => $parentSubmissionCategories, 'empty' => true]);
                    echo $this->Form->control('model_type_id', ['options' => $modelTypes]);
                    echo $this->Form->control('code');
                    echo $this->Form->control('title');
                    echo $this->Form->control('description');
                    echo $this->Form->control('status_id', ['options' => $statuses]);
                    echo $this->Form->control('approved_yn');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
