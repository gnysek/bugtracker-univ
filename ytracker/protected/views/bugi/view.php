<?php /* @var $model Bugi */ ?>

<?php
$this->breadcrumbs=array(
	'Błędy'=>array('index'),
	$model->mantis_id,
);

if (Yii::app()->getModule('user')->isAdmin()) {
	$this->menu = array(
		array('label' => 'Wyświetl Błędy', 'url' => array('index')),
		array('label' => 'Zgłoś Błąd', 'url' => array('create')),
		array('label' => 'Update Bugi', 'url' => array('update', 'id' => $model->bug_id)),
		array('label' => 'Delete Bugi', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->bug_id), 'confirm' => 'Are you sure you want to delete this item?')),
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
		<td colspan="4"><?php echo $model->bug_text ?></td>
	</tr>
</table>
