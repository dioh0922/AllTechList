<?php $this->assign("title", "管理画面"); ?>
<h1>管理画面</h1>
<?= $this->Form->create() ?>
<?= $this->Form->end() ?>

<table>
	<?php foreach ($users as $user): ?>
		<tr>
			<td><?=$user->userID ?></td>
			<td>
				<?php
					if($user->accept === 1){
						//フォームを表示させる
						echo $this->Form->create($user);

						echo $this->Form->control("userID", [
							"type" => "hidden",
						]);
						echo $this->Form->control("accept", ["type" => "hidden"]);
						echo $this->Form->button(__("無効にする"));
						echo $this->Form->end();
					}else{
						echo "無効";
					}
				?>
			</td>
		</tr>
	<?php endforeach ?>
</table>

<?= $this->Html->link("TOPへ戻る",
 		["controller" => "Lists", 'action' => 'index'],
		["class" => "button"]);
?>
