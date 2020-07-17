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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $submissionFieldValue->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $submissionFieldValue->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Submission Field Values'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="submissionFieldValues form content">
            <?= $this->Form->create($submissionFieldValue) ?>
            <fieldset>
                <legend><?= __('Edit Submission Field Value') ?></legend>
                <?php
                    echo $this->Form->control('submission_id', ['options' => $submissions]);
                    echo $this->Form->control('submission_field_id', ['options' => $submissionFields]);
                    echo $this->Form->control('value');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
