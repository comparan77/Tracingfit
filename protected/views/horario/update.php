<?php
/* @var $this HorarioController */
/* @var $model Horario */

$this->breadcrumbs=array(
	'Horarios'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Horario', 'url'=>array('index')),
	array('label'=>'Create Horario', 'url'=>array('create')),
	array('label'=>'View Horario', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Horario', 'url'=>array('admin')),
);
?>

<h1>Update Horario <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>