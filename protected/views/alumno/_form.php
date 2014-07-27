<?php
/* @var $this AlumnoController */
/* @var $model Alumno */
/* @var $form CActiveForm */
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'alumno-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apellido_paterno'); ?>
		<?php echo $form->textField($model,'apellido_paterno',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'apellido_paterno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apellido_materno'); ?>
		<?php echo $form->textField($model,'apellido_materno',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'apellido_materno'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'horario'); ?>
		<?php //echo $form->textField($model,'id_horario'); ?>
		<?php //echo $form->error($model,'id_horario'); ?>
		<?php echo $form->hiddenField($model,'id_horario'); ?>
		<?php echo $form->error($model,'horario'); ?>
		<?php 	
			$this->widget('zii.widgets.grid.CGridView', array(
        		'id'=>'horario-grid',
        		'dataProvider'=>new CActiveDataProvider('Horario'),
        		//'filter'=>$model,
        		'columns'=>array(
				//'id',
				'horario',
                		//array(
                        	//	'class'=>'CButtonColumn',
                		//),
        		),
				'selectionChanged'=>'function(id) {
					$("#Alumno_id_horario").val($.fn.yiiGridView.getSelection(id));
				}',
				'rowCssClassExpression' => '($row%2 ? $this->rowCssClass[1] : $this->rowCssClass[0] ) . ($data->id=='.$model->id_horario.' ? " selected": "" )',
		)); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
