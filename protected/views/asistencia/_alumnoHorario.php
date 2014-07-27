        <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'id'=>'alumno-grid',
                //'dataProvider'=>new CArrayDataProvider($data),
                'dataProvider'=>$data,
				//'filter'=>'$data',
                //'filter'=>$model,
                'columns'=>array(
                	array(
						'header'=>'Nombre',
						'name'=>'nombre_completo',
					),
					array(
						'header'=>'Asistencia',
						'class'=>'CCheckBoxColumn',
						'value'=>'$data["id"]."_".$data["ast_id"]',
						'checked'=>'($data["ast_id"] != 0)',
					),
				),
                /*array(
                	'name'=>'Nombre',
                    'value'=>'data->nombre." ".data->apellido_paterno." ".data->apellido_materno'
                ),
				array(
					'header'=>'Asistencia',
					'class'=>'CCheckBoxColumn',
				),*/
				//'nombre',
                //array(
                //'class'=>'CButtonColumn',
                //),
				/*array(
					'class'=>'CCheckBoxColumn',
					'template'=>'{asistencia}',
					'header'=>'Asistencia',
					'buttons'=>array(
						'asistencia'=>array(
							'label'=>'Asistencia',
						),
					),
				)*/
			//),
                //'selectionChanged'=>'function(id) {
                //    $("#Asistencia_id_alumno").val($.fn.yiiGridView.getSelection(id));
                //}',
        )); ?>
