<?php $this->assign("title", "使用技術まとめ"); ?>
<h3>各ページの使用ライブラリ、フレームワークまとめ</h3>
<table>
	<tr>
		<th>プロジェクト名</th>
		<th>主な技術</th>
		<th>URL</th>
	</tr>
	<?php foreach ($lists as $lists): ?>
	<tr>
		<td><?=$lists->ProjectName ?></td>
		<td><?=$lists->TechName ?></td>
		<td>
			<?=$this->HTML->link($lists->URL, "http://localhost".$lists->URL) ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
