<?php $this->assign("title", "使用技術まとめ"); ?>
<h3>各ページの使用ライブラリ、フレームワークまとめ</h3>
<h5>※ここのページの内容はほぼブログチュートリアルです</h5>
<div style="
			border: solid;
			border-color: #3388FF;
			margin: auto;
			margin-left: 5px;
			margin-right: 5px;
		">
<table>
	<tr>
		<th>プロジェクト名</th>
		<th>主な技術</th>
		<th>URL</th>
		<th>操作</th>
	</tr>
	<?php foreach ($lists as $lists): ?>
	<tr>
		<td><?=$lists->ProjectName ?></td>
		<td><?=$lists->TechName ?></td>
		<td>
			<?=$this->Html->link($lists->URL, $lists->URL) ?>
		</td>
		<td>
			<?= $this->Html->link("編集", ["action" => "edit", $lists->ProjectID]) ?>
			<?= $this->Form->postLink("削除",
						["action" => "delete", $lists->ProjectID],
						["confirm" => "よろしいですか?"]) ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>

<?= $this->Html->link("プロジェクトの追加", ["action" => "add"], ["class" => "button"]); ?>
</div>
<br>
<br>

<?= $this->Html->link("ログアウト",
 		["controller" => "Users", 'action' => 'logout'],
		["class" => "button"]);
?>
<?= $this->Html->link("ユーザーの追加",
 		["controller" => "Users", 'action' => 'add'],
		["class" => "button", "style" => "margin-left: 5px;"]);
?>
