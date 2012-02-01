<?php
$this->breadcrumbs=array(
	'Codes',
);

$this->menu=array(
	array('label'=>'Create Code', 'url'=>array('create')),
	array('label'=>'Manage Code', 'url'=>array('admin')),
);
?>

<h1>Codes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
