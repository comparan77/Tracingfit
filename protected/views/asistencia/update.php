<?php
/* @var $this AsistenciaController */
/* @var $model Asistencia */

$this->breadcrumbs=array(
	'Asistencias'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Asistencia', 'url'=>array('index')),
	array('label'=>'Create Asistencia', 'url'=>array('create')),
	array('label'=>'View Asistencia', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Asistencia', 'url'=>array('admin')),
);
?>

<h1>Update Asistencia <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>