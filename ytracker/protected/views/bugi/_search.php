<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'bug_id'); ?>
		<?php echo $form->textField($model,'bug_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bug_reporter'); ?>
		<?php echo $form->textField($model,'bug_reporter'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bug_status'); ?>
		<?php echo $form->textField($model,'bug_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bug_text'); ?>
		<?php echo $form->textArea($model,'bug_text',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bug_time'); ?>
		<?php echo $form->textField($model,'bug_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bug_last_time'); ?>
		<?php echo $form->textField($model,'bug_last_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->