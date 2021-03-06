<?php
/* @var $this AlumnoController */
/* @var $model Alumno */

$this->breadcrumbs=array(
	'Alumnos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Alumno', 'url'=>array('index')),
	array('label'=>'Create Alumno', 'url'=>array('create')),
	array('label'=>'Update Alumno', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Alumno', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Alumno', 'url'=>array('admin')),
	array('label'=>'Estatus Alumno', 'url'=>array('AlumnoEstatus/create', 'id'=>$model->id)),
);
?>

<h1>View Alumno #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'nombre',
		'apellido_paterno',
		'apellido_materno',
		array(
            'label'=>'Horario',
            'value'=>$model->horario->horario,
        ),
		array(
			'label'=>'Días',
			'value'=>$model->is_lmv?"L, M, V":"M, J, S",
		),
		'estatus',
	),
)); ?>
