<?php

/**
 * This is the model class for table "tbl_alumno".
 *
 * The followings are the available columns in table 'tbl_alumno':
 * @property integer $id
 * @property string $nombre
 * @property string $apellido_paterno
 * @property string $apellido_materno
 *
 * The followings are the available model relations:
 * @property TblAsistencia[] $tblAsistencias
 */
class TblAlumno extends CActiveRecord
{
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
			array('id, nombre, apellido_paterno, apellido_materno', 'required'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('nombre, apellido_paterno, apellido_materno', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, apellido_paterno, apellido_materno', 'safe', 'on'=>'search'),
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
			'tblAsistencias' => array(self::HAS_MANY, 'TblAsistencia', 'id_alumno'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'apellido_paterno' => 'Apellido Paterno',
			'apellido_materno' => 'Apellido Materno',
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido_paterno',$this->apellido_paterno,true);
		$criteria->compare('apellido_materno',$this->apellido_materno,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblAlumno the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
