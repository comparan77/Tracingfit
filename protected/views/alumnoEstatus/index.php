<?php
/* @var $this AlumnoEstatusController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Alumno Estatuses',
);

$this->menu=array(
	array('label'=>'Create AlumnoEstatus', 'url'=>array('create')),
	array('label'=>'Manage AlumnoEstatus', 'url'=>array('admin')),
);
?>

<h1>Alumno Estatuses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
