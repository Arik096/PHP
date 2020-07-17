<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ModelType $modelType
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $modelType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $modelType->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Model Types'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="modelTypes form content">
            <?= $this->Form->create($modelType) ?>
            <fieldset>
                <legend><?= __('Edit Model Type') ?></legend>
                <?php
                    echo $this->Form->control('code');
                    echo $this->Form->control('title');
                    echo $this->Form->control('description');
                    echo $this->Form->control('status_id', ['options' => $statuses]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
