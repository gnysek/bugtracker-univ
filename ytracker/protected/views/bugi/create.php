<?php
$this->breadcrumbs=array(
	'Błędy'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Wyświetl Błędy', 'url'=>array('index')),
	array('label'=>'Zarządzaj', 'url'=>array('admin')),
);
?>

<h1>Zgłoś Błąd</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>