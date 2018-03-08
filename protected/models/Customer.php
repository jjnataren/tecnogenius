<?php

/**
 * This is the model class for table "{{customer}}".
 *
 * The followings are the available columns in table '{{customer}}':
 * @property integer $ID
 * @property string $NAME
 * @property string $EMAIL
 * @property string $ADDRESS
 * @property string $BIRTH_DATE
 * @property string $TAX_ADDRESS
 * @property string $TAX_ADDRESS_2
 * @property string $RFC
 * @property integer $GENDER
 * @property string $CURP
 * @property string $PHONE
 * @property string $LINE
 * @property integer $STATUS
 */
class Customer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Customer the static model class
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
		return '{{customer}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(' NAME,RFC,CURP,BIRTH_DATE,EMAIL, ADDRESS,TAX_ADDRESS_2', 'required'),
			array('GENDER, STATUS', 'numerical', 'integerOnly'=>true),
			array('NAME, EMAIL, ADDRESS, TAX_ADDRESS, TAX_ADDRESS_2', 'length', 'max'=>300),
			array('RFC, CURP', 'length', 'max'=>20),
				array('PHONE, LINE', 'length', 'max'=>45),
			array('BIRTH_DATE', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('NAME, EMAIL, ADDRESS, BIRTH_DATE, TAX_ADDRESS, TAX_ADDRESS_2, RFC, GENDER, CURP, STATUS, ID', 'safe', 'on'=>'search'),
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
			'EMAIL' => 'Email',
			'ADDRESS' => 'Dirección',
			'BIRTH_DATE' => 'Fecha de nacimiento',
			'TAX_ADDRESS' => 'Dirección fiscal',
			'TAX_ADDRESS_2' => 'Dirección fiscal 2',
			'RFC' => 'Rfc',
			'GENDER' => 'Género',
			'CURP' => 'Curp',
			'STATUS' => 'Estado',
				'PHONE' => 'Teléfono movil',
				'LINE' => 'Teléfono casa',
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
		$criteria->compare('EMAIL',$this->EMAIL,true);
		$criteria->compare('ADDRESS',$this->ADDRESS,true);
		$criteria->compare('BIRTH_DATE',$this->BIRTH_DATE,true);
		$criteria->compare('TAX_ADDRESS',$this->TAX_ADDRESS,true);
		$criteria->compare('TAX_ADDRESS_2',$this->TAX_ADDRESS_2,true);
		$criteria->compare('RFC',$this->RFC,true);
		$criteria->compare('GENDER',$this->GENDER);
		$criteria->compare('CURP',$this->CURP,true);
		$criteria->compare('STATUS',$this->STATUS);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}