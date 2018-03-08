<?php

/**
 * This is the model class for table "{{product}}".
 *
 * The followings are the available columns in table '{{product}}':
 * @property integer $ID
 * @property integer $COURSE_ID
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property string $START_DATE
 * @property integer $TOTAL_PEOPLE
 * @property integer $STATUS
 * @property string $RECOMMENDED_RETAIL_PRICE
 * @property string $ANOTHER_DETAILS
 */
class Product extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Product the static model class
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
		return '{{product}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('NAME,COURSE_ID,ID,START_DATE', 'required'),
			array('COURSE_ID, TOTAL_PEOPLE, STATUS', 'numerical', 'integerOnly'=>true),
			array('NAME, DESCRIPTION', 'length', 'max'=>100),
			array('RECOMMENDED_RETAIL_PRICE', 'length', 'max'=>10),
			array('ANOTHER_DETAILS', 'length', 'max'=>300),
			array('START_DATE', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, COURSE_ID, NAME, DESCRIPTION, START_DATE, TOTAL_PEOPLE, STATUS, RECOMMENDED_RETAIL_PRICE, ANOTHER_DETAILS', 'safe', 'on'=>'search'),
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
				'cOURSE' => array(self::BELONGS_TO, 'Course', 'COURSE_ID'),
				'oRDERS' => array(self::HAS_MANY, 'CustomerPurchase', 'PRODUCT_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'COURSE_ID' => 'Curso',
			'NAME' => 'Nombre',
			'DESCRIPTION' => 'Descripción',
			'START_DATE' => 'Fecha inicio',
			'TOTAL_PEOPLE' => 'Total personas',
			'STATUS' => 'Estado',
			'RECOMMENDED_RETAIL_PRICE' => 'Precio',
			'ANOTHER_DETAILS' => 'Otros detalles',
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
		$criteria->compare('COURSE_ID',$this->COURSE_ID);
		$criteria->compare('NAME',$this->NAME,true);
		$criteria->compare('DESCRIPTION',$this->DESCRIPTION,true);
		$criteria->compare('START_DATE',$this->START_DATE,true);
		$criteria->compare('TOTAL_PEOPLE',$this->TOTAL_PEOPLE);
		$criteria->compare('STATUS',$this->STATUS);
		$criteria->compare('RECOMMENDED_RETAIL_PRICE',$this->RECOMMENDED_RETAIL_PRICE,true);
		$criteria->compare('ANOTHER_DETAILS',$this->ANOTHER_DETAILS,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}