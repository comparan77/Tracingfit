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
                    	'altFormat'=>"yy-mm-dd",
						'onSelect'=>'js: function(date) { 
                			$("#part-block").html("");
							$(".selected").each(function() {
								$(this).removeClass("selected");	
							});
						}',
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
				updateABlock("horario-grid");
			}',
		)); ?>
		<?php echo $form->error($model,'horario'); ?>
	</div>

	<script type="text/javascript">
    function updateABlock(grid_id) {
        
		var keyId = $.fn.yiiGridView.getSelection(grid_id);
        keyId  = keyId[0]; //above function returns an array with single item, so get the value of the first item
		var fecha_sel = $('#Asistencia_fecha').val();
		$('#part-block').addClass('loading');
        $.ajax({
            url: '<?php echo $this->createUrl('PartUpdate'); ?>',
            data: {id_horario: keyId, fecha_sel: fecha_sel},
            type: 'GET',
            success: function(data) {
				//$('#part-block').removeClass('loading');
                $('#part-block').html(data);
				$('#alumno-grid > table > tbody').children('tr').each(function() { 
					/*$(this).click(function() {
						$('#alumno-grid > table > tbody').children('tr').each(function() { 
							$(this).removeClass('selected');
						});
						$(this).addClass('selected'); 
						var rowNumber = $(this).index();
						var selection=[];
						var keys = $('#alumno-grid').find('.keys span');
						selection.push(keys.eq(rowNumber).text());
						$('#Asistencia_id_alumno').val(selection);//alert(selection);
					});*/
					$(this).children('td').last().children('input').click(function() { 
						$('#Asistencia_id_alumno').val($(this).attr('value').split("_")[0]);
						adminAsistencia($(this).is(':checked'), $(this));
						$('#part-block').addClass('loading');
						disabledCheckBox(true);
					}); 
				});
            },
			complete: function() {
				$('#part-block').removeClass('loading');
				//$("html, body").animate({ scrollTop: $("#footer").scrollTop() }, 1000);
				$('html, body').animate({scrollTop:$(document).height()}, 'slow');
			},
        });
    }
	</script>


	<script type="text/javascript">
// here is the magic
function adminAsistencia(isAsis,obj)
{
	var data=$("#asistencia-form").serialize();
 
  var Action = 'create';
	if(!isAsis)
		Action = 'deleteAjax&id=' + obj.attr('value').split("_")[1];
  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("asistencia/' + Action  + '"); ?>',
   data:data,
success:function(data){
				var valChkBx = obj.attr('value');
				if(isAsis) {
					valChkBx = valChkBx.replace('_0','_' + data.id);
					$(obj).attr('value', valChkBx);
				}
				else
					{
					$(obj).attr('value', valChkBx.split('_')[0] + '_0');	
				}
              },
   error: function(data) { // if error occured
         alert("Error occured.please try again");
		obj.prop('checked',!isAsis);
         alert(data);
    },
 
  dataType:'json',
	complete:function() {
		$('#part-block').removeClass('loading');
		disabledCheckBox(false);
	},
  }); 
}

function disabledCheckBox(IsDisabled) {
	$('#alumno-grid > table > tbody').children('tr').each(function() { 
		if (IsDisabled) 
			$(this).children('td').last().children('input').attr('disabled',true);
		else
			$(this).children('td').last().children('input').removeAttr('disabled');
	});
}
</script>	


	<div class="row">
 	<?php echo $form->labelEx($model,'alumno'); ?>
    <?php echo $form->hiddenField($model,'id_alumno'); ?>
	<div id="part-block"></div>
	<?php echo $form->error($model,'alumno'); ?>
    </div>

	<!--<div class="row buttons">
		<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>-->

<?php $this->endWidget(); ?>

</div><!-- form -->
