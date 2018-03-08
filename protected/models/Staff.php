<?php

/**
 * This is the model class for table "tbl_staff".
 *
 * The followings are the available columns in table 'tbl_staff':
 * @property integer $ID
 * @property string $NAME
 * @property integer $GENDER
 * @property string $DATE_JOINED
 * @property string $DATE_LEFT
 * @property string $DATE_BIRTH
 * @property integer $ROLE
 * @property string $PHOTO_FILENAME
 * @property integer $STATUS
 *
 * The followings are the available model relations:
 * @property TblMentoringHyerarchy[] $tblMentoringHyerarchies
 */
class Staff extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Staff the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_staff';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				
				array('NAME,STATUS,DATE_BIRTH,DATE_JOINED,DATE_LEFT,ROLE','required'),
			array('GENDER, ROLE, STATUS', 'numerical', 'integerOnly'=>true),
			array('NAME', 'length', 'max'=>200),
			array('PHOTO_FILENAME', 'length', 'max'=>500),
			array('DATE_JOINED, DATE_LEFT, DATE_BIRTH', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, NAME, GENDER, DATE_JOINED, DATE_LEFT, DATE_BIRTH, ROLE, PHOTO_FILENAME, STATUS', 'safe', 'on'=>'search'),
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
			'tblMentoringHyerarchies' => array(self::HAS_MANY, 'TblMentoringHyerarchy', 'STAFF_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'NAME' => 'Nombre',
			'GENDER' => 'Género ',
			'DATE_JOINED' => 'Fecha registro',
			'DATE_LEFT' => 'Fecha termino',
			'DATE_BIRTH' => 'Fecha de nacimiento',
			'ROLE' => 'Rol',
			'PHOTO_FILENAME' => 'Archivo foto',
			'STATUS' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ID',$this->ID);
		$criteria->compare('NAME',$this->NAME,true);
		$criteria->compare('GENDER',$this->GENDER);
		$criteria->compare('DATE_JOINED',$this->DATE_JOINED,true);
		$criteria->compare('DATE_LEFT',$this->DATE_LEFT,true);
		$criteria->compare('DATE_BIRTH',$this->DATE_BIRTH,true);
		$criteria->compare('ROLE',$this->ROLE);
		$criteria->compare('PHOTO_FILENAME',$this->PHOTO_FILENAME,true);
		$criteria->compare('STATUS',$this->STATUS);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}