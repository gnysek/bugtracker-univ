<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('bug_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->bug_id), array('view', 'id'=>$data->bug_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bug_reporter')); ?>:</b>
	<?php echo CHtml::encode($data->author->username); ?>
	<br />

	<div style="background-color: <?php echo $data->color ?>">
	<b><?php echo CHtml::encode($data->getAttributeLabel('bug_status')); ?>:</b>
	<?php echo CHtml::encode($data->bug_status); ?>
	</div>
<!--	<br />-->

	<b><?php echo CHtml::encode($data->getAttributeLabel('bug_title')); ?>:</b>
	<?php echo CHtml::encode($data->bug_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bug_text')); ?>:</b>
	<?php echo CHtml::encode($data->bug_text); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bug_time')); ?>:</b>
	<?php echo CHtml::encode($data->time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bug_last_time')); ?>:</b>
	<?php echo CHtml::encode($data->last_time); ?>
	<br />


</div>