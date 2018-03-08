<?php

/**
 * This is the model class for table "{{carousel_document}}".
 *
 * The followings are the available columns in table '{{carousel_document}}':
 * @property integer $ID
 * @property integer $CAROUSEL_ID
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
 * @property Carousel $cAROUSEL
 */
class CarouselDocument extends CActiveRecord
{
	
	
	
	

	/**
	 * All availables document's types for tutorial
	 * @var unknown
	 */
	public $documents_type = array(
	
			1=>'Imagen',
	
	);
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{carousel_document}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CAROUSEL_ID, DOCUMENT_TYPE, STATUS', 'numerical', 'integerOnly'=>true),
			array('NAME, DESCRIPTION, PATH, SIZE, THUMBNAIL, TYPE, DEL_TYPE, DEL_URL', 'length', 'max'=>300),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID, CAROUSEL_ID, NAME, DOCUMENT_TYPE, DESCRIPTION, PATH, SIZE, THUMBNAIL, TYPE, DEL_TYPE, DEL_URL, STATUS', 'safe', 'on'=>'search'),
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
			'cAROUSEL' => array(self::BELONGS_TO, 'Carousel', 'CAROUSEL_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'CAROUSEL_ID' => 'Carousel',
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
		$criteria->compare('CAROUSEL_ID',$this->CAROUSEL_ID);
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
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CarouselDocument the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	
	/**
	 * Retrieves a description of document tyep
	 * @return Ambigous <string, multitype:string >
	 */
	public function  getStringType(){
	
		return isset($this->documents_type[$this->DOCUMENT_TYPE])? $this->documents_type[$this->DOCUMENT_TYPE] : 'unknow';
	
	}
}
