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
            <?= $this->Html->link(__('List Submissions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="submissions form content">
            <?= $this->Form->create($submission) ?>
            <fieldset>
                <legend><?= __('Add Submission') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('subject');
                    echo $this->Form->control('model_type_id', ['options' => $modelTypes]);
                    echo $this->Form->control('submission_category_id', ['options' => $submissionCategories, 'empty' => true]);
                    echo $this->Form->control('manufacturer_id', ['options' => $manufacturers, 'empty' => true]);
                    echo $this->Form->control('description');
                    echo $this->Form->control('scale_id', ['options' => $scales]);
                    echo $this->Form->control('main_image');
                    echo $this->Form->control('status_id', ['options' => $statuses]);
                    echo $this->Form->control('approved', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
