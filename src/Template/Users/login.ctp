<?php $this->assign("title", "認証"); ?>
<h1>ログイン</h1>
<?= $this->Form->create() ?>
<?= $this->Form->control("email") ?>
<?= $this->Form->control("password") ?>
<?= $this->Form->button("ログイン") ?>
<?= $this->Form->end() ?>
