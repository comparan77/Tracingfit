<?php
/* @var $this EntrenadorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Entrenadores',
);

$this->menu=array(
	array('label'=>'Create Entrenador', 'url'=>array('create')),
	array('label'=>'Manage Entrenador', 'url'=>array('admin')),
);
?>

<h1>Entrenadores</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
