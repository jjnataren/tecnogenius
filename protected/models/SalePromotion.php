<?php

/**
 * This is the model class for table "{{sale_promotion}}".
 *
 * The followings are the available columns in table '{{sale_promotion}}':
 * @property integer $ID
 * @property string $START_DATE
 * @property string $END_DATE
 * @property string $NAME
 * @property string $DESCRIPTION
 *
 * The followings are the available model relations:
 * @property DocumentPromotion[] $documents
 */
class SalePromotion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SalePromotion the static model class
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
		return '{{sale_promotion}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				
		    array(' NAME,START_DATE, END_DATE', 'required'),
			array('NAME', 'length', 'max'=>100),
			array('DESCRIPTION', 'length', 'max'=>300),
			array('START_DATE, END_DATE, ID', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, START_DATE, END_DATE, NAME, DESCRIPTION', 'safe', 'on'=>'search'),
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
			'documents' => array(self::HAS_MANY, 'DocumentPromotion', 'PROMOTION_ID', 'order'=>'ID ASC'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'START_DATE' => 'Fecha inicio',
			'END_DATE' => 'Fecha termino',
			'NAME' => 'Nombre',
			'DESCRIPTION' => 'Descripción',
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
		$criteria->compare('START_DATE',$this->START_DATE,true);
		$criteria->compare('END_DATE',$this->END_DATE,true);
		$criteria->compare('NAME',$this->NAME,true);
		$criteria->compare('DESCRIPTION',$this->DESCRIPTION,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}