<?php
/* @var $this AsistenciaController */
/* @var $model Asistencia */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'asistencia-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
        <?php echo $form->labelEx($model,'fecha'); ?>
        <?php
            echo $form->hiddenField($model,'fecha');
            $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                    'name'=>'fecha',
                //'attribute'=>'fecha',
                //'model'=>$model,
                'language'=>'es',
                    // additional javascript options for the date picker plugin
                    'options'=>array(
                        'showAnim'=>'fold',
                    'dateFormat'=>"dd 'de' MM 'de' yy",
                    'altField'=>"#Asistencia_fecha",
                    'altFormat'=>"yy-mm-dd"
                    ),
                    'htmlOptions'=>array(
                        'style'=>'height:20px;'
                    ),
            ));
        ?>
        <?php echo $form->error($model,'fecha'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'horario'); ?>
		<?php //echo $form->textField($model,'id_horario'); ?>
		<?php //echo $form->error($model,'id_horario'); ?>
		<?php echo $form->hiddenField($model,'id_horario'); ?>
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
				$("#Asistencia_id_horario").val($.fn.yiiGridView.getSelection(id));
			}',
		)); ?>
		<?php echo $form->error($model,'horario'); ?>
	</div>

	<div class="row">
        <?php echo $form->labelEx($model,'alumno'); ?>
        <?php
        $quotedUrl = $this->createUrl('asistencia/AjaxComplete/');
        $params = array(
                'name' => "asistenciaAjaxComplete",
                'source' => 'js:function(request, response) {
                    $.ajax({
                            url: "'. $quotedUrl . '",
                            data: { "term": request.term, "fulltext": 1 },
                            success: function(data) { response(data); }
                    });
            }',
                'options' => array(
                    'minLength' => '3', // min letters typed before we try to complete
                    'select' => "js:function(event, ui) {
                            jQuery('#Asistencia_id_alumno').val(ui.item.id);
                            return true;
                }",
                ),
        );
        $this->widget('zii.widgets.jui.CJuiAutoComplete', $params);
        ?>
        <?php echo $form->hiddenField($model,'id_alumno'); ?>
        <?php echo $form->error($model,'alumno'); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
