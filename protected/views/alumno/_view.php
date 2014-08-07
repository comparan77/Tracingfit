<?php
/* @var $this AlumnoController */
/* @var $data Alumno */
?>

<div class="view">

	<?php echo CHtml::link(CHtml::encode($data->nombre." ".$data->apellido_paterno." ".$data->apellido_materno), array('view', 'id'=>$data->id)); ?>
	<br />
	<?php echo CHtml::encode($data->horario->getAttributeLabel('horario')); ?>:
	<?php echo CHtml::encode($data->horario->horario); ?>
	<br />
	<?php echo CHtml::encode($data->horario->getAttributeLabel('Días')); ?>:
	<?php echo CHtml::encode($data->is_lmv ? "L,M,V" : "M,J,S"); ?>
	<br />
	<?php echo CHtml::encode($data->getAttributeLabel('Estatus')); ?>:
	<?php echo CHtml::encode($data->estatus); ?>
	
</div>
