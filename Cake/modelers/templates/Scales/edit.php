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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $scale->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $scale->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Scales'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="scales form content">
            <?= $this->Form->create($scale) ?>
            <fieldset>
                <legend><?= __('Edit Scale') ?></legend>
                <?php
                    echo $this->Form->control('model_type_id', ['options' => $modelTypes]);
                    echo $this->Form->control('scale');
                    echo $this->Form->control('approved_yn');
                    echo $this->Form->control('sort_order');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
