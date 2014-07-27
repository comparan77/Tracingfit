<?php
/* @var $this EntrenadorController */
/* @var $model Entrenador */

$this->breadcrumbs=array(
	'Entrenadors'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Entrenador', 'url'=>array('index')),
	array('label'=>'Create Entrenador', 'url'=>array('create')),
	array('label'=>'Update Entrenador', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Entrenador', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Entrenador', 'url'=>array('admin')),
);
?>

<h1>View Entrenador #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'nombre',
		'apellido_paterno',
		'apellido_materno',
	),
)); ?>
