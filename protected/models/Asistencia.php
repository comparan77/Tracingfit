<?php

/**
 * This is the model class for table "tbl_asistencia".
 *
 * The followings are the available columns in table 'tbl_asistencia':
 * @property integer $id
 * @property integer $id_alumno
 * @property integer $id_horario
 * @property string $fecha
 *
 * The followings are the available model relations:
 * @property TblAlumno $idAlumno
 * @property TblHorario $idHorario
 */
class Asistencia extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_asistencia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('alumno, horario, fecha', 'required'),
			array('id_alumno, id_horario', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('alumno, horario, fecha', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idAlumno' => array(self::BELONGS_TO, 'TblAlumno', 'id_alumno'),
			'idHorario' => array(self::BELONGS_TO, 'TblHorario', 'id_horario'),
			'alumno' => array(self::BELONGS_TO, 'Alumno', 'id_alumno'),
			'horario' => array(self::BELONGS_TO, 'Horario', 'id_horario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_alumno' => 'Id Alumno',
			'id_horario' => 'Id Horario',
			'fecha' => 'Fecha',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		//$criteria->compare('id',$this->id);
		$criteria->compare('id_alumno',$this->id_alumno);
		$criteria->compare('id_horario',$this->id_horario);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->with=array('alumno','horario');
		$criteria->compare('alumno.nombre', $this->alumno, true);
		$criteria->compare('horario.horario', $this->horario, true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function searchBy($id_horario = null, $fecha = null)
	{
		//$sql = "select a.id, concat(a.nombre, ' ', a.apellido_paterno, ' ', a.apellido_materno) nombre_completo, coalesce(ast.id,0) ast_id from tbl_alumno a left join tbl_asistencia ast on ast.id_alumno = a.id and ast.fecha = :fecha where a.id_horario = :id_horario;";
			$sql = "CALL sp_asistencia(:P_opcion, :P_id_horario, :P_fecha)";
        	$command = Yii::app()->db->createCommand($sql);
        	$command->bindValue(':P_opcion',0);
        	$command->bindValue(':P_id_horario',$id_horario);
        	$command->bindValue(':P_fecha',$fecha, PDO::PARAM_STR);
        	$results = $command->queryAll();

        	return new CArrayDataProvider($results, array(
            		'keyField'=>'id',));
	} 

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Asistencia the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
