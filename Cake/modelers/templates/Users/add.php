<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h1 style="text-align: center;">Create Account</h1>
        </div>
    </aside>
    <div class="container content">
        <?= $this->Form->create($user) ?>
        <div class="row">
            <div class="col-12 col-sm-6 mt-3">
                <?php
                    echo $this->Form->control('name');
                ?>
            </div>
            <div class="col-12 col-sm-6 mt-3">
                <?php
                    echo $this->Form->control('email');
                ?>
            </div>  
        </div>
        <div class="row">
            <div class="col-12 col-sm-6 mt-3">
                <?php
                    echo $this->Form->control('password');
                ?>
            </div>
            <div class="col-12 col-sm-6 mt-3">
                <?php
                    echo $this->Form->control('forum_user');
                ?>
            </div>  
        </div>
        <div class="row">
            <div class="col-12 col-sm-6 mt-3">
                <?php
                    echo $this->Form->control('last_ip');
                ?>
            </div>
            <div class="col-12 col-sm-6 mt-5" style="padding-top: 30px;">
                <?php
                    echo $this->Form->control('public_yn');
                ?>
            </div>  
        </div>
        <?php
            echo $this->Form->control('status_id', ['default' => 4, 'type' => 'hidden']);
            echo $this->Form->control('UserGroupID', array('default' => 1, 'type' => 'hidden'));
        ?>
        <?= $this->Form->button(__('Create Account'), ['class' => 'loginButton btn btn-danger btn-block mt-3']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
