<?php
$this->breadcrumbs=array(
	'Codes'=>array('index'),
	$model->code_id,
);

$this->menu=array(
	array('label'=>'代码列表', 'url'=>array('index')),
	array('label'=>'新增', 'url'=>array('create')),
	array('label'=>'修改', 'url'=>array('update', 'id'=>$model->code_id)),
	array('label'=>'删除', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->code_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Code', 'url'=>array('admin')),
);
?>

<h1>View Code #<?php echo $model->code_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'code_id',
		'language',
		'description',
		'code',
		'auditing',
		'created',
		'updated',
	),
)); ?>
