<?php

/**
 * This is the model class for table "tbl_alumno".
 *
 * The followings are the available columns in table 'tbl_alumno':
 * @property integer $id
 * @property integer $id_horario
 * @property string $nombre
 * @property string $apellido_paterno
 * @property string $apellido_materno
 * @property integer $is_lmv
 * @property string $fecha_alta
 * @property string $estatus
 *
 * The followings are the available model relations:
 * @property TblHorario $idHorario
 * @property TblAlumnoSeguimiento[] $tblAlumnoSeguimientos
 * @property TblAsistencia[] $tblAsistencias
 */
class Alumno extends CActiveRecord
{
	private $_estatus;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_alumno';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_horario, nombre, apellido_paterno, apellido_materno, horario, is_lmv, fecha_alta', 'required'),
			array('id_horario, is_lmv', 'numerical', 'integerOnly'=>true),
			array('nombre, apellido_paterno, apellido_materno', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_horario, nombre, apellido_paterno, apellido_materno, horario, fecha_alta', 'safe', 'on'=>'search'),
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
			'idHorario' => array(self::BELONGS_TO, 'TblHorario', 'id_horario'),
			'tblAlumnoSeguimientos' => array(self::HAS_MANY, 'TblAlumnoSeguimiento', 'id_alumno'),
			'tblAsistencias' => array(self::HAS_MANY, 'TblAsistencia', 'id_alumno'),
			'horario' => array(self::BELONGS_TO, 'Horario', 'id_horario'),
			'alumnoestatus' => array(self::HAS_MANY, 'AlumnoEstatus', 'id_alumno'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_horario' => 'Id Horario',
			'nombre' => 'Nombre',
			'apellido_paterno' => 'Apellido Paterno',
			'apellido_materno' => 'Apellido Materno',
			'is_lmv' => 'Días',
			'fecha_alta' => 'Fecha de Alta',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('id_horario',$this->id_horario);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido_paterno',$this->apellido_paterno,true);
		$criteria->compare('apellido_materno',$this->apellido_materno,true);
		$criteria->compare('is_lmv',$this->is_lmv);
		$criteria->compare('fecha_alta',$this->fecha_alta,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function afterFind()
	{
		$this->_estatus = Status::model()->findByPk( AlumnoEstatus::model()->getLastStatus($this->id) )->nombre;
	}
	
	public function getEstatus()
	{
		return $this->_estatus;
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Alumno the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
