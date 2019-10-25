<h3>編集ページ</h3>
<?php
	//フォームを表示させる
	echo $this->Form->create($list);

	echo $this->Form->control("ProjectID", [
		"type" => "hidden",
	]);
	echo $this->Form->control("ProjectName");
	echo $this->Form->control("TechName");
	echo $this->Form->control("URL");
	echo $this->Form->button(__("プロジェクト情報の編集"));
	echo $this->Form->end();
?>
<?= $this->Html->link("TOPへ戻る",
 		["controller" => "Lists", 'action' => 'index'],
		["class" => "button"]);
?>
