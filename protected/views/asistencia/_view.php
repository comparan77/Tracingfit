<?php
/* @var $this AsistenciaController */
/* @var $data Asistencia */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->alumno->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->alumno->nombre." ".$data->alumno->apellido_paterno." ".$data->alumno->apellido_materno), array('view', 'id'=>$data->id)); ?>
	<br />

	<!--<b>--><?php /*echo CHtml::encode($data->alumno->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->alumno->nombre." ".$data->alumno->apellido_paterno." ".$data->alumno->apellido_materno);*/ ?>
	<!--<br />-->

	<b><?php echo CHtml::encode($data->horario->getAttributeLabel('horario')); ?>:</b>
	<?php echo CHtml::encode($data->horario->horario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />


</div>
