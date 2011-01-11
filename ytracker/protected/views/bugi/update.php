<?php
$this->breadcrumbs=array(
	'Błędy'=>array('index'),
	$model->bug_id=>array('view','id'=>$model->bug_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Wyświetl Błędy', 'url'=>array('index')),
	array('label'=>'Zgłoś Błąd', 'url'=>array('create')),
	array('label'=>'Pokaż Błąd', 'url'=>array('view', 'id'=>$model->bug_id)),
	array('label'=>'Zarządzaj', 'url'=>array('admin')),
);
?>

<h1>Edytuj <?php echo $model->bug_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>