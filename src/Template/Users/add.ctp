<?php $this->assign("title", "認証追加"); ?>
<h1>ログイン追加</h1>
<?= $this->Form->create() ?>
<?= $this->Form->control("userID") ?>
<?= $this->Form->control("pass") ?>
<?= $this->Form->control("accept", [
	"option" => ["admin" => "Admin", "auther" => "Auther"]
	]) ?>
<?= $this->Form->button("ログイン登録") ?>
<?= $this->Form->end() ?>

<?= $this->Html->link("TOPへ戻る",
 		["controller" => "Lists", 'action' => 'index'],
		["class" => "button"]);
?>
