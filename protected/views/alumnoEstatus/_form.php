<?php
/* @var $this AlumnoEstatusController */
/* @var $model AlumnoEstatus */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'alumno-estatus-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->hiddenField($model,'id_alumno'); ?>
		<?php echo CHtml::encode($model->Alumno->nombre." ".$model->Alumno->apellido_paterno." ".$model->Alumno->apellido_materno); ?>
		<?php echo $form->error($model,'id_alumno'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::encode("Estatus actual: ".$model->Estatus->nombre); ?>
	</div>
	
	<hr />

	<div class="row">
		<p>Se va a <?php echo ($model->id_estatus==3 ? "Desa" : "A"); ?>ctivar el alumno con </p>
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php echo $form->hiddenField($model,'fecha'); 
			$this->widget('zii.widgets.jui.CJuiDatePicker',array(
                'name'=>'fecha',
                'model'=>$model,
                //'attribute'=>'fecha_alta',
                //'model'=>$model,
                'language'=>'es',
                    // additional javascript options for the date picker plugin
                    'options'=>array(
                        'showAnim'=>'fold',
                        'dateFormat'=>"dd 'de' MM 'de' yy",
                        'altField'=>"#AlumnoEstatus_fecha",
                        'altFormat'=>"yy-mm-dd",
                    ),
                    'htmlOptions'=>array(
                        'style'=>'height:20px;',
                    ),
            ));
		?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

<?php Yii::app()->clientScript->registerScript('script', <<<JS
        var fecha_alta = $('#AlumnoEstatus_fecha').val().split('-');
        var anio = fecha_alta[0] * 1;
        var mes = fecha_alta[1] * 1 - 1;
        var dia = fecha_alta[2] * 1;
        $('#fecha').datepicker('setDate', new Date(anio,mes,dia));
JS
, CClientScript::POS_READY);?>
	
	<div class="row">
		<?php $model->id_estatus = ($model->id_estatus==3 ? 2 : 3);  ?>
		<?php echo $form->hiddenField($model,'id_estatus'); ?>
		<?php echo $form->error($model,'id_estatus'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aplicar cambio de Estatus' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
