<tr style="background-color: <?php echo $data->color; ?>">
	<td><a href="<?php echo $data->url; ?>">#<?php echo $data->mantis_id ?></a></td>
	<td><?php echo $data->status; ?></td>
	<td><b><a href="<?php echo $data->url; ?>"><?php echo $data->bug_title; ?></a></b></td>
	<td><?php echo $data->author->username; ?></td>
	<td>
		<a href="<?php echo $data->url; ?>">Zobacz &raquo;</a>
		<?php /*if (Yii::app()->getModule('user')->isAdmin()): ?>
			<a href="<?php echo $data->url; ?>">x Usuń</a>
		<?php endif;*/ ?>
	</td>
</tr>
