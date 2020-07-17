<div class="users form">
    <?= $this->Flash->render() ?>
    <h1 style="text-align: center;">Login</h1>
    <div class="container content">
        <?= $this->Form->create(null, array('class' => 'class', 'autocomplete' => false)) ?>
        <fieldset>
            <legend style="font-size: 18px;"><?= __('Please enter your username and password') ?></legend>
            <?= $this->Form->control('email', ['required' => true]) ?>
            <?= $this->Form->control('password', ['required' => true, 'autocomplete' => false]) ?>
        </fieldset>
        <?php
            echo $this->Form->button('Login', ['class' => 'loginButton btn btn-danger btn-block mt-3']);
            echo $this->Form->end();
        ?>
        <?php
            echo $this->Html->link(__('Create Account'), ['action' => 'add'], ['class' => 'registerButton btn btn-success btn-block']);
        ?>
    </div>
</div>
