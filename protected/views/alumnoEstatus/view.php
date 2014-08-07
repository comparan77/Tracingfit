<?php
/* @var $this AlumnoEstatusController */
/* @var $model AlumnoEstatus */

$this->breadcrumbs=array(
	'Alumno Estatuses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AlumnoEstatus', 'url'=>array('index')),
	array('label'=>'Create AlumnoEstatus', 'url'=>array('create')),
	array('label'=>'Update AlumnoEstatus', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AlumnoEstatus', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AlumnoEstatus', 'url'=>array('admin')),
);
?>

<h1>View AlumnoEstatus #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_alumno',
		'fecha',
		'id_estatus',
	),
)); ?>
