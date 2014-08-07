<?php
/* @var $this AlumnoEstatusController */
/* @var $model AlumnoEstatus */

$this->breadcrumbs=array(
	'Alumno Estatuses'=>array('index'),
	'Create',
);

/*$this->menu=array(
	array('label'=>'List AlumnoEstatus', 'url'=>array('index')),
	array('label'=>'Manage AlumnoEstatus', 'url'=>array('admin')),
);*/
?>

<h1>Create Alumno Estatus</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
