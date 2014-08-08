<?php

/**
 * This is the model class for table "tbl_alumno_estatus".
 *
 * The followings are the available columns in table 'tbl_alumno_estatus':
 * @property integer $id
 * @property integer $id_alumno
 * @property string $fecha
 * @property integer $id_estatus
 *
 * The followings are the available model relations:
 * @property TblStatus $idEstatus
 * @property TblAlumno $idAlumno
 */
class AlumnoEstatus extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_alumno_estatus';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_alumno, fecha, id_estatus', 'required'),
			array('id_alumno, id_estatus', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_alumno, fecha, id_estatus', 'safe', 'on'=>'search'),
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
			'Estatus' => array(self::BELONGS_TO, 'Status', 'id_estatus'),
			'Alumno' => array(self::BELONGS_TO, 'Alumno', 'id_alumno'),
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
			'fecha' => 'Fecha',
			'id_estatus' => 'Id Estatus',
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
		$criteria->compare('id_alumno',$this->id_alumno);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('id_estatus',$this->id_estatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getLastStatus($id_alumno)
	{
		$sql = "select id_estatus, id_alumno from tbl_alumno_estatus where id_alumno = :id_alumno order by id desc limit 1";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindValue(':id_alumno',$id_alumno);
		$row = $command->queryRow();

		return $row["id_estatus"];
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AlumnoEstatus the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
