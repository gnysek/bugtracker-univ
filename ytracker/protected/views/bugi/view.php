<?php /* @var $model Bugi */ ?>

<?php
$this->breadcrumbs=array(
	'Błędy'=>array('index'),
	'#' . $model->mantis_id . ' - ' . $model->bug_title,
);

if (Yii::app()->getModule('user')->isAdmin()) {
	$this->menu = array(
		array('label' => 'Wyświetl Błędy', 'url' => array('index')),
		array('label' => 'Zgłoś Błąd', 'url' => array('create')),
		array('label' => 'Edytuj', 'url' => array('update', 'id' => $model->bug_id)),
		array('label' => 'Usuń', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->bug_id), 'confirm' => 'Are you sure you want to delete this item?')),
		array('label' => 'Zarządzaj', 'url' => array('admin')),
	);
} else {
	$this->menu = array(
		array('label' => 'Wyświetl Błędy', 'url' => array('index')),
		array('label' => 'Zgłoś Błąd', 'url' => array('create')),
	);
}
?>

<h1>#<?php echo $model->mantis_id . ' - ' . $model->bug_title; ?></h1>

<table class="bug-table">
	<tr>
		<td style="width: 15%">Dodany:</td>
		<th style="width: 35%"><?php echo $model->time ?></th>
		<td style="width: 15%">Zmodyfikowany:</td>
		<th style="width: 35%"><?php echo $model->last_time ?></th>
	</tr>
	<tr>
		<td style="width: 15%">Status:</td>
		<th style="width: 35%; background-color: <?php echo $model->color ?>"><?php echo $model->status ?></th>
		<td style="width: 15%">Autor:</td>
		<th style="width: 35%"><?php echo $model->username ?></th>
	</tr>
	<tr>
		<th colspan="4">Opis:</th>
	</tr>
	<tr>
		<td colspan="4"><tt><?php echo $model->bug_text ?></tt></td>
	</tr>
</table>

<?php if (count($comm)): ?>
<h2>Komentarze:</h2>
<?php
	$i = 0;
	foreach ($comm as $wpis) {
		echo $this->renderPartial('_comm', array('model' => $wpis, 'id' => ++$i ));
	}
?>
<?php endif; ?>


<!-- formularz -->
<?php if ($model->bug_status < Bugi::STATUS_FIXED && !Yii::app()->user->isGuest): ?>

<?php echo $this->renderPartial('_commform', array('model'=>$modelComm)); ?>
<br/>
<br/>
<?php endif; ?>


<?php if (count($logi)): ?>
<h3>Logi:</h3>
<table class="bug-table bug-log">
<?php 
foreach ($logi as $log) {
	echo $this->renderPartial('_log', array('model'=>$log));
}
?>
</table>
<?php endif; ?>

