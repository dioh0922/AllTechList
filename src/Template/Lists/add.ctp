<h3>追記ページ</h3>
<?php
	//フォームを表示させる
	echo $this->Form->create($list);

	echo $this->Form->control("ProjectID", [
		"type" => "hidden",
		"value" => 3
	]);
	echo $this->Form->control("ProjectName");
	echo $this->Form->control("TechName");
	echo $this->Form->control("URL");
	echo $this->Form->button(__("プロジェクト情報の追加"));
	echo $this->Form->end();
?>

<?= $this->Html->link("TOPへ戻る",
 		["controller" => "Lists", 'action' => 'index'],
		["class" => "button"]);
?>
