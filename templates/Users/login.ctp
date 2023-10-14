<?php $this->assign("title", "認証"); ?>
<h1>ログイン</h1>
<?= $this->Form->create() ?>
<?= $this->Form->control("userID") ?>
<?= $this->Form->control("pass", ["type" => "password"]) ?>
<?= $this->Form->button("ログイン") ?>
<?= $this->Form->end() ?>

<?= $this->Html->link("TOPへ戻る",
 		["controller" => "Lists", 'action' => 'index'],
		["class" => "button"]);
?>
