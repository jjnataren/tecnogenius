<?php

/**
 * This is the model class for table "tbl_course".
 *
 * The followings are the available columns in table 'tbl_course':
 * @property integer $ID
 * @property integer $HIERARCHY_ID
 * @property string $NAME
 * @property string $PROFILE
 * @property string $RESUME
 * @property string $DESCRIPTION
 * @property string $ALIAS
 * @property string $CONTENT
 * @property float  $PUBLISHED_PRICE
 * @property string $RANKING
 * 
 * @property integer $STATUS
 *
 * The followings are the available model relations:
 * @property MentoringHyerarchy $hIERARCHY
 * @property Document[] $documents
 * @property Product[] $products
 * @property TblKeywordCourse[] $tblKeywordCourses
 */
class Course extends CActiveRecord
{
	
	public $courseStatus = array(
		0=>'No disponible',
		1=>'Disponible',
	);
	
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Course the static model class
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
		return 'tbl_course';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				
				
		   array('NAME,HIERARCHY_ID,STATUS,PUBLISHED_PRICE,RANKING', 'required'),
			array('HIERARCHY_ID,  PUBLISHED_PRICE','numerical', 'integerOnly'=>true),
			array('NAME', 'length', 'max'=>200),
			array('ALIAS', 'length', 'max'=>100),
			array('DESCRIPTION, CONTENT, RESUME, PROFILE', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, HIERARCHY_ID, NAME, DESCRIPTION,RANKING, ALIAS, CONTENT, STATUS, PUBLISHED_PRICE', 'safe', 'on'=>'search'),
		);/*AGREGUE EL RANKING EN EL ARRAY*/
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'hIERARCHY' => array(self::BELONGS_TO, 'MentoringHyerarchy', 'HIERARCHY_ID'),
			'documents' => array(self::HAS_MANY, 'Document', 'COURSE_ID', 'condition'=>'STATUS=1'),
			'products' => array(self::HAS_MANY, 'Product', 'COURSE_ID'),
			'AvaliableProducts' => array(self::HAS_MANY, 'Product', 'COURSE_ID'),
			'tblKeywordCourses' => array(self::HAS_MANY, 'TblKeywordCourse', 'COURSE_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'HIERARCHY_ID' => 'Curso base',
			'NAME' => 'Nombre',
			'RESUME'=>'Introducción',	
			'DESCRIPTION' => 'Descripción',
			'PROFILE' => 'Perfil de usuario',
			'ALIAS' => 'Alias',
			'RANKING' => 'Ranking',
			'CONTENT' => 'Contenido del Curso',
			'PUBLISHED_PRICE' => 'Precio publicado', 
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
		$criteria->compare('HIERARCHY_ID',$this->HIERARCHY_ID);
		$criteria->compare('NAME',$this->NAME,true);
		$criteria->compare('DESCRIPTION',$this->DESCRIPTION,true);
		$criteria->compare('ALIAS',$this->ALIAS,true);
		$criteria->compare('CONTENT',$this->CONTENT,true);
		$criteria->compare('STATUS',$this->STATUS);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	
	public function getStringStatus(){
		
		return (isset($this->courseStatus[$this->STATUS]) ?$this->courseStatus[$this->STATUS]: 'unknow' );
	}
	
	
	/**
	 * retrieves a current logo file
	 */
	public function getLogo(){
	
			$Criteria = new CDbCriteria();
			$Criteria->condition = "COURSE_ID = ".$this->ID.
			" AND STATUS = 1".
			" AND DOCUMENT_TYPE = 1";
			$Criteria->order = "ID";
			
			$documents = Document::model()->findAll($Criteria);
	
			$path = isset($documents[0])? Yii::app( )->getBaseUrl( ).$documents[0]->PATH : Yii::app( )->getBaseUrl( ).'/uploads/default/defaultFile.png';
	
		return  $path;
	}
}