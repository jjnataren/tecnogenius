<?php

/**
 * This is the model class for table "{{carousel}}".
 *
 * The followings are the available columns in table '{{carousel}}':
 * @property integer $ID
 * @property string $TITLE
 * @property string $DESCRIPTION
 * @property integer $ORDER
 * @property string $ACTION
 * @property integer $STATUS
 * @property string $ACTION_NAME
 * @property string $CAPTION
 * 
 * The followings are the available model relations:
 * @property CarouselDocument[] $carouselDocuments
 */
class Carousel extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{carousel}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ORDER, STATUS', 'numerical', 'integerOnly'=>true),
			array('TITLE, DESCRIPTION', 'length', 'max'=>45),
			array('ACTION', 'length', 'max'=>300),
			array('ACTION_NAME, CAPTION', 'length', 'max'=>300),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID, TITLE, DESCRIPTION, ORDER, ACTION, STATUS', 'safe', 'on'=>'search'),
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
			'carouselDocuments' => array(self::HAS_MANY, 'CarouselDocument', 'CAROUSEL_ID'),
				'documents' => array(self::HAS_MANY, 'CarouselDocument', 'CAROUSEL_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'TITLE' => 'Encabezado',
			'DESCRIPTION' => 'Descripción',
			'ORDER' => 'Orden',
			'ACTION' => 'Link destino',
			'STATUS' => 'Estatus',
				'ACTION_NAME' => 'Nombre botón',
				'CAPTION' => 'Alt de la imagén',
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

		$criteria->compare('ID',$this->ID);
		$criteria->compare('TITLE',$this->TITLE,true);
		$criteria->compare('DESCRIPTION',$this->DESCRIPTION,true);
		$criteria->compare('ORDER',$this->ORDER);
		$criteria->compare('ACTION',$this->ACTION,true);
		$criteria->compare('STATUS',$this->STATUS);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Carousel the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
