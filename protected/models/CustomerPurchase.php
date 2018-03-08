<?php

/**
 * This is the model class for table "{{customer_purchase}}".
 *
 * The followings are the available columns in table '{{customer_purchase}}':
 * @property integer $ID
 * @property integer $SALE_PROMOTION_ID
 * @property integer $CUSTOMER_ID
 * @property integer $PRODUCT_ID
 * @property string $PURCHASE_DATE
 * @property string $PRICE_CUSTOMER_PAID
 * @property string $ANOTHER_DETAIL
 *
 * The followings are the available model relations:
 * @property Product $pRODUCT
 * @property SalePromotion $sALEPROMOTION
 * @property Customer $cUSTOMER
 */
class CustomerPurchase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CustomerPurchase the static model class
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
		return '{{customer_purchase}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CUSTOMER_ID, PRODUCT_ID, PRICE_CUSTOMER_PAID', 'required'),
			array('SALE_PROMOTION_ID, CUSTOMER_ID, PRODUCT_ID', 'numerical', 'integerOnly'=>true),
			array('PRICE_CUSTOMER_PAID', 'length', 'max'=>10),
			array('ANOTHER_DETAIL', 'length', 'max'=>300),
			array('PURCHASE_DATE', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, SALE_PROMOTION_ID, CUSTOMER_ID, PRODUCT_ID, PURCHASE_DATE, PRICE_CUSTOMER_PAID, ANOTHER_DETAIL', 'safe', 'on'=>'search'),
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
			'pRODUCT' => array(self::BELONGS_TO, 'Product', 'PRODUCT_ID'),
			'sALEPROMOTION' => array(self::BELONGS_TO, 'SalePromotion', 'SALE_PROMOTION_ID'),
			'cUSTOMER' => array(self::BELONGS_TO, 'Customer', 'CUSTOMER_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'SALE_PROMOTION_ID' => 'Promoción de venta',
			'CUSTOMER_ID' => 'Cliente',
			'PRODUCT_ID' => 'Producto',
			'PURCHASE_DATE' => 'Fecha de compra',
			'PRICE_CUSTOMER_PAID' => 'Precio  Pagado',
			'ANOTHER_DETAIL' => 'Otro detalle',
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
		$criteria->compare('SALE_PROMOTION_ID',$this->SALE_PROMOTION_ID);
		$criteria->compare('CUSTOMER_ID',$this->CUSTOMER_ID);
		$criteria->compare('PRODUCT_ID',$this->PRODUCT_ID);
		$criteria->compare('PURCHASE_DATE',$this->PURCHASE_DATE,true);
		$criteria->compare('PRICE_CUSTOMER_PAID',$this->PRICE_CUSTOMER_PAID,true);
		$criteria->compare('ANOTHER_DETAIL',$this->ANOTHER_DETAIL,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}