<?php

/**
 * This is the model class for table "{{hierarchy_level}}".
 *
 * The followings are the available columns in table '{{hierarchy_level}}':
 * @property integer $LEVEL_NUMBER
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property integer $PARENT
 *
 * The followings are the available model relations:
 * @property HierarchyLevel $pARENT
 * @property HierarchyLevel[] $hierarchyLevels
 * @property MentoringHyerarchy[] $mentoringHyerarchies
 */
class HierarchyLevel extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{hierarchy_level}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('LEVEL_NUMBER', 'required'),
			array('LEVEL_NUMBER, PARENT', 'numerical', 'integerOnly'=>true),
			array('NAME', 'length', 'max'=>100),
			array('DESCRIPTION', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('LEVEL_NUMBER, NAME, DESCRIPTION, PARENT', 'safe', 'on'=>'search'),
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
			'pARENT' => array(self::BELONGS_TO, 'HierarchyLevel', 'PARENT'),
			'hierarchyLevels' => array(self::HAS_MANY, 'HierarchyLevel', 'PARENT'),
			'mentoringHyerarchies' => array(self::HAS_MANY, 'MentoringHyerarchy', 'LEVEL_NUMBER'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'LEVEL_NUMBER' => 'Level Number',
			'NAME' => 'Name',
			'DESCRIPTION' => 'Description',
			'PARENT' => 'Parent',
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

		$criteria->compare('LEVEL_NUMBER',$this->LEVEL_NUMBER);
		$criteria->compare('NAME',$this->NAME,true);
		$criteria->compare('DESCRIPTION',$this->DESCRIPTION,true);
		$criteria->compare('PARENT',$this->PARENT);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return HierarchyLevel the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
