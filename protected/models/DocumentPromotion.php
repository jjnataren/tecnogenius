<?php

/**
 * This is the model class for table "{{document_promotion}}".
 *
 * The followings are the available columns in table '{{document_promotion}}':
 * @property integer $ID
 * @property integer $PROMOTION_ID
 * @property string $NAME
 * @property integer $DOCUMENT_TYPE
 * @property string $DESCRIPTION
 * @property string $PATH
 * @property string $SIZE
 * @property string $THUMBNAIL
 * @property string $TYPE
 * @property string $DEL_TYPE
 * @property string $DEL_URL
 * @property integer $STATUS
 *
 * The followings are the available model relations:
 * @property SalePromotion $pROMOTION
 */
class DocumentPromotion extends CActiveRecord
{
	
	/**
	 * A list of documents for Promotion
	 * @var unknown
	 */
 	private $a_documentType = array(
 		
 			1=>'Imagen promocional',
 	);
	
 	
 	/**
 	 * Retrieves a list of avaliable documents
 	 * @return array
 	 */
 	public function getADocumentType(){
 		
 		return $this->a_documentType;
 	}
 	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DocumentPromotion the static model class
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
		return '{{document_promotion}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PROMOTION_ID, DOCUMENT_TYPE, STATUS', 'numerical', 'integerOnly'=>true),
			array('NAME, DESCRIPTION, PATH, SIZE, THUMBNAIL, TYPE, DEL_TYPE, DEL_URL', 'length', 'max'=>300),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, PROMOTION_ID, NAME, DOCUMENT_TYPE, DESCRIPTION, PATH, SIZE, THUMBNAIL, TYPE, DEL_TYPE, DEL_URL, STATUS', 'safe', 'on'=>'search'),
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
			'pROMOTION' => array(self::BELONGS_TO, 'SalePromotion', 'PROMOTION_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'PROMOTION_ID' => 'Promotion',
			'NAME' => 'Name',
			'DOCUMENT_TYPE' => 'Document Type',
			'DESCRIPTION' => 'Description',
			'PATH' => 'Path',
			'SIZE' => 'Size',
			'THUMBNAIL' => 'Thumbnail',
			'TYPE' => 'Type',
			'DEL_TYPE' => 'Del Type',
			'DEL_URL' => 'Del Url',
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
		$criteria->compare('PROMOTION_ID',$this->PROMOTION_ID);
		$criteria->compare('NAME',$this->NAME,true);
		$criteria->compare('DOCUMENT_TYPE',$this->DOCUMENT_TYPE);
		$criteria->compare('DESCRIPTION',$this->DESCRIPTION,true);
		$criteria->compare('PATH',$this->PATH,true);
		$criteria->compare('SIZE',$this->SIZE,true);
		$criteria->compare('THUMBNAIL',$this->THUMBNAIL,true);
		$criteria->compare('TYPE',$this->TYPE,true);
		$criteria->compare('DEL_TYPE',$this->DEL_TYPE,true);
		$criteria->compare('DEL_URL',$this->DEL_URL,true);
		$criteria->compare('STATUS',$this->STATUS);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * Retrieves a description of document tyep
	 * @return Ambigous <string, multitype:string >
	 */
	public function  getStringType(){
	
		return isset($this->a_documentType[$this->DOCUMENT_TYPE])? $this->a_documentType[$this->DOCUMENT_TYPE] : 'unknow';
	
	}
}