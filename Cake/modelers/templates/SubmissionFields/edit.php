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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $submissionField->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $submissionField->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Submission Fields'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="submissionFields form content">
            <?= $this->Form->create($submissionField) ?>
            <fieldset>
                <legend><?= __('Edit Submission Field') ?></legend>
                <?php
                    echo $this->Form->control('model_type_id', ['options' => $modelTypes]);
                    echo $this->Form->control('field_name');
                    echo $this->Form->control('label');
                    echo $this->Form->control('element_type');
                    echo $this->Form->control('enum_options');
                    echo $this->Form->control('required_yn');
                    echo $this->Form->control('admin_yn');
                    echo $this->Form->control('status_id', ['options' => $statuses]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
