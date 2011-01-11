<table class="bug-table">
	<tr>
		<td>#<?php echo str_repeat('0', 5 - strlen($id)) . $id; ?></td>
		<td style="width: 25%;"><?php echo $model->username ?></td>
		<td style="width: 50%;"><?php echo $model->time ?></td>
	</tr>
	<tr>
		<td colspan="3"><tt><?php echo $model->text ?></tt></td>
</tr>
</table>