<?php
    echo $this->Html->link(__('Logout'), ['action' => 'logout'], ['class' => 'ml-5 logout float-right btn btn-warning']); 
    echo $this->Html->link(__('Create Account'), ['action' => 'add'], ['class' => 'button float-right']);
?>
<h1 style="text-align: center;" class="mt-5">Users</h1>
<div class="table-responsive">
    <table class="table table-striped table-hover" id="user-table">
        <thead>
            <tr>
                <th style="display: none;"><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('forum_user') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('User Group') ?></th>
                <th><?= $this->Paginator->sort('status_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th style="display: none;"><?= $this->Paginator->sort('password') ?></th>
                <th class="actions"><?= __('View') ?></th>
                <th class="actions"><?= __('Edit') ?></th>
                <th class="actions"><?= __('Delete') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td style="display: none;"><?= $this->Number->format($user->id) ?></td>
                    <td><?= $this->Number->format($user->forum_user) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?= h($user->name) ?></td>
                    <td><?= h($user->UserGroupID) ?></td>
                    <td><?= $user->has('status') ? $this->Html->link($user->status->title, ['controller' => 'Statuses', 'action' => 'view', $user->status->id]) : '' ?></td>
                    <td><?= h($user->created) ?></td>
                    <td><?= h($user->modified) ?></td>
                    <td style="display: none;"><?= h($user->password) ?></td>
                    <td><?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?></td>
                    <td><?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?></td>
                    <td><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('first')) ?>
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
        <?= $this->Paginator->last(__('last') . ' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
</div>
