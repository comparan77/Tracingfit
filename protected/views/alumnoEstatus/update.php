<?php
/* @var $this AlumnoEstatusController */
/* @var $model AlumnoEstatus */

$this->breadcrumbs=array(
	'Alumno Estatuses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AlumnoEstatus', 'url'=>array('index')),
	array('label'=>'Create AlumnoEstatus', 'url'=>array('create')),
	array('label'=>'View AlumnoEstatus', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AlumnoEstatus', 'url'=>array('admin')),
);
?>

<h1>Update AlumnoEstatus <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>