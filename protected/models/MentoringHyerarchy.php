<?php

/**
 * This is the model class for table "tbl_mentoring_hyerarchy".
 *
 * The followings are the available columns in table 'tbl_mentoring_hyerarchy':
 * @property integer $ID
 * @property integer $STAFF_ID
 * @property integer $LEVEL_NUMBER
 * @property integer $PARENT_ID
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property integer $STATUS
 *
 * The followings are the available model relations:
 * @property TblCourse[] $tblCourses
 * @property MentoringHyerarchy $pARENT
 * @property MentoringHyerarchy[] $mentoringHyerarchies
 * @property Staff $sTAFF
 * @property HierarchyLevel $lEVELNUMBER
 */
class MentoringHyerarchy extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MentoringHyerarchy the static model class
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
		return 'tbl_mentoring_hyerarchy';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				
				array( ' STAFF_ID,NAME,STATUS,PARENT_ID' , 'required'),
			array('STAFF_ID, LEVEL_NUMBER, PARENT_ID, STATUS', 'numerical', 'integerOnly'=>true),
			array('NAME, DESCRIPTION', 'length', 'max'=>300),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, STAFF_ID,DESCRIPTION, LEVEL_NUMBER, PARENT_ID, NAME, STATUS', 'safe', 'on'=>'search'),
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
			'courses' => array(self::HAS_MANY, 'Course', 'HIERARCHY_ID'),
			'tutorials' => array(self::HAS_MANY, 'Tutorial', 'HIERARCHY_ID'),
			'pARENT' => array(self::BELONGS_TO, 'MentoringHyerarchy', 'PARENT_ID'),
			'mentoringHyerarchies' => array(self::HAS_MANY, 'MentoringHyerarchy', 'PARENT_ID'),
			'tutorialHyerarchies' => array(self::HAS_MANY, 'MentoringHyerarchy', 'PARENT_ID', 'condition'=>'LEVEL_NUMBER=2000'),
			'sTAFF' => array(self::BELONGS_TO, 'Staff', 'STAFF_ID'),
			'lEVELNUMBER' => array(self::BELONGS_TO, 'HierarchyLevel', 'LEVEL_NUMBER'),
			'documents' => array(self::HAS_MANY, 'HierarchyDocument', 'HIERARCHY_ID', 'condition'=>'STATUS=1'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'STAFF_ID' => 'Persona encargada',
			'LEVEL_NUMBER' => 'Jerarquía',
			'PARENT_ID' => 'Jerarquía padre',
			'NAME' => 'Nombre',
			'DESCRIPTION' => 'Descripción',
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

		//$criteria->compare('ID',$this->ID);
		$criteria->condition = "ID > 0 AND STATUS > 0";
		$criteria->compare('STAFF_ID',$this->STAFF_ID);
		$criteria->compare('LEVEL_NUMBER',$this->LEVEL_NUMBER);
		$criteria->compare('PARENT_ID',$this->PARENT_ID);
		$criteria->compare('NAME',$this->NAME,true);
		$criteria->compare('STATUS',$this->STATUS);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}