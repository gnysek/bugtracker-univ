<div class="form">

<?php
/* @var $form CActiveForm */
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'bugi-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'bug_title'); ?>
		<?php echo $form->textField($model, 'bug_title'); ?>
		<?php echo $form->error($model,'bug_title'); ?>
	</div>

	<?php if (!$model->isNewRecord): ?>
	<div class="row">
		<?php echo $form->labelEx($model, 'bug_status'); ?>
		<?php echo $form->dropDownList($model, 'bug_status', Bugi::model()->_getStatusOptions()); ?>
		<?php echo $form->error($model, 'bug_status'); ?>
	</div>
	<?php endif; ?>

	<div class="row">
		<?php echo $form->labelEx($model,'bug_text'); ?>
		<?php echo $form->textArea($model,'bug_text',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'bug_text'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Dodaj' : 'Zapisz'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->