<?php

/**
 * This is the model class for table "{{student}}".
 *
 * The followings are the available columns in table '{{student}}':
 * @property integer $ID
 * @property string $EMAIL
 * @property string $NAME
 * @property string $PHONE
 * @property string $ADDRESS
 * @property integer $STATUS
 *
 * The followings are the available model relations:
 * @property Course[] $tblCourses
 */
class Student extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Student the static model class
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
		return '{{student}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('EMAIL, NAME', 'required'),
		//	array('STATUS', 'numerical', 'integerOnly'=>true),
			array('EMAIL', 'length', 'max'=>100),
			array('EMAIL', 'email'),
			array('NAME, PHONE, ADDRESS', 'length', 'max'=>300),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, EMAIL, NAME, PHONE, ADDRESS, STATUS', 'safe', 'on'=>'search'),
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
			'tblCourses' => array(self::MANY_MANY, 'Course', '{{registration}}(STUDENT_ID, COURSE_ID)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'EMAIL' => 'Correo',
			'NAME' => 'Nombre',
			'PHONE' => 'Teléfono ',
			'ADDRESS' => 'Dirección',
			'STATUS' => 'Estatus',
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
		$criteria->compare('EMAIL',$this->EMAIL,true);
		$criteria->compare('NAME',$this->NAME,true);
		$criteria->compare('PHONE',$this->PHONE,true);
		$criteria->compare('ADDRESS',$this->ADDRESS,true);
		$criteria->compare('STATUS',$this->STATUS);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}