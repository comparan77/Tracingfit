<?php
/* @var $this EntrenadorController */
/* @var $model Entrenador */

$this->breadcrumbs=array(
	'Entrenadors'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Entrenador', 'url'=>array('index')),
	array('label'=>'Create Entrenador', 'url'=>array('create')),
	array('label'=>'View Entrenador', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Entrenador', 'url'=>array('admin')),
);
?>

<h1>Update Entrenador <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>