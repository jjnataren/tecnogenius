<?php

/**
 * This is the model class for table "{{keyword}}".
 *
 * The followings are the available columns in table '{{keyword}}':
 * @property string $WORD
 * @property integer $STATUS
 *
 * The followings are the available model relations:
 * @property KeywordCourse[] $keywordCourses
 */
class Keyword extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Keyword the static model class
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
		return '{{keyword}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('WORD', 'required'),
			array('STATUS', 'numerical', 'integerOnly'=>true),
			array('WORD', 'length', 'max'=>100),
			array('WORD', 'length', 'min'=>3),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('WORD, STATUS', 'safe', 'on'=>'search'),
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
			'cOURSES' => array(self::HAS_MANY, 'KeywordCourse', 'WORD'),
			'tUTORIALS' => array(self::HAS_MANY, 'KeywordTutorial', 'WORD'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'WORD' => 'Palabra',
			'STATUS' => 'Estado',
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

		$criteria->compare('WORD',$this->WORD,true);
		$criteria->compare('STATUS',$this->STATUS);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}