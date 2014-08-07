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
        <?php echo $form->labelEx($model,'fecha_alta'); ?>
        <?php
            echo $form->hiddenField($model,'fecha_alta');
            $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                'name'=>'fecha_alta',
				'model'=>$model,
                //'attribute'=>'fecha_alta',
                //'model'=>$model,
                'language'=>'es',
                    // additional javascript options for the date picker plugin
                    'options'=>array(
                        'showAnim'=>'fold',
                        'dateFormat'=>"dd 'de' MM 'de' yy",
                        'altField'=>"#Alumno_fecha_alta",
                        'altFormat'=>"yy-mm-dd",
                    ),
                    'htmlOptions'=>array(
                        'style'=>'height:20px;',
                    ),
            ));
        ?>
        <?php echo $form->error($model,'fecha_alta'); ?>
	</div>


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

	<?php Yii::app()->clientScript->registerScript('script', <<<JS
		var fecha_alta = $('#Alumno_fecha_alta').val().split('-');
		var anio = fecha_alta[0] * 1;
		var mes = fecha_alta[1] * 1 - 1;
		var dia = fecha_alta[2] * 1;
		$('#fecha_alta').datepicker('setDate', new Date(anio,mes,dia));
		$('#radio-lmv').children('label').each(function() { 
			var radioBtn = $(this).prev();	
			$(this).click(function() {
			//	alert($(radioBtn).attr('id')); 
				if($(this).attr('id') == 'r_lmv') 
					$('#Alumno_is_lmv').val(1);
				else
					$('#Alumno_is_lmv').val(0);
			});
		});
JS
, CClientScript::POS_READY);?>

	<div class="row">
		<?php echo $form->labelEx($model,'is_lmv'); ?>
		<?php echo $form->hiddenField($model,'is_lmv'); ?>


<?php

$this->widget(
'booster.widgets.TbButtonGroup',
array(
'context' => 'primary',
'toggle' => 'radio',
'htmlOptions' => array(
	'id'=>'radio-lmv'
),
'buttons' => array(
array('label' => 'L, M, V', 'htmlOptions'=>array('id'=>'r_lmv','class'=>($model->is_lmv==1 ? 'active' : ''))),
array('label' => 'M, J, S', 'htmlOptions'=>array('id'=>'r_mjs','class'=>($model->is_lmv==0 ? 'active' : ''))),
),
)
); ?>

		<?php echo $form->error($model,'is_lmv'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
