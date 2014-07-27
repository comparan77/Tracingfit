<?php
/* @var $this EntrenadorController */
/* @var $model Entrenador */

$this->breadcrumbs=array(
	'Entrenadors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Entrenador', 'url'=>array('index')),
	array('label'=>'Manage Entrenador', 'url'=>array('admin')),
);
?>

<h1>Create Entrenador</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>