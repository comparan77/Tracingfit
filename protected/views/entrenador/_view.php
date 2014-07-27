<?php
/* @var $this EntrenadorController */
/* @var $data Entrenador */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->nombre." ".$data->apellido_paterno." ".$data->apellido_materno), array('view', 'id'=>$data->id)); ?>

</div>
