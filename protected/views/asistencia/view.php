<?php
/* @var $this AsistenciaController */
/* @var $model Asistencia */

$this->breadcrumbs=array(
	'Asistencias'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Asistencia', 'url'=>array('index')),
	array('label'=>'Create Asistencia', 'url'=>array('create')),
	array('label'=>'Update Asistencia', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Asistencia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Asistencia', 'url'=>array('admin')),
);
?>

<h1>View Asistencia #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		//'id_alumno',
		array(
			'label'=>'Alumno',
			'value'=>$model->alumno->nombre." ".$model->alumno->apellido_paterno." ".$model->alumno->apellido_materno,
		),
		//'id_horario',
		array(
			'label'=>'Horario',
			'value'=>$model->horario->horario,
		),
		'fecha',
	),
)); ?>
