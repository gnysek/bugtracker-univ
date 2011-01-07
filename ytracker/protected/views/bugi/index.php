<?php $this->pageTitle=Yii::app()->name; ?>

<h1>BugTracker</h1>
wersja 0.1<br />
<br />

<?php
$this->breadcrumbs=array(
	'Błędy'=>array('index'),
);

if (Yii::app()->getModule('user')->isAdmin()) {
	$this->menu = array(
		array('label' => 'Zgłoś Błąd', 'url' => array('create')),
		array('label' => 'Zarządzaj', 'url' => array('admin')),
	);
} else {
	$this->menu = array(
		array('label' => 'Zgłoś Błąd', 'url' => array('create')),
	);
}
?>

<table class="bug-table">
	<tr>
		<th style="width: 5%;">ID</th>
		<th style="width: 20%;">Status</th>
		<th>Tytuł</th>
		<th style="width: 10%;">Zgłosił</th>
		<th style="width: 10%;">Zobacz</th>
	</tr>
	<?php $this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_tableview',
		//'template'=>"{items}\n{pager}",
	)); ?>
</table>
