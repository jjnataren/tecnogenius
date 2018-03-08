<?php

/**
 * This is the model class for table "{{tutorial}}".
 *
 * The followings are the available columns in table '{{tutorial}}':
 * @property integer $ID
 * @property integer $HIERARCHY_ID
 * @property string $NAME
 * @property string $RESUME
 * @property string $DESCRIPTION
 * @property string $ALIAS
 * @property string $CONTENT
 * @property integer $RANKING
 * @property string $PUBLISHED_DATE
 * @property string $AUTHOR
 * @property integer $STATUS
 */
class Tutorial extends CActiveRecord
{
	
	
	/**
	 * All available status for
	 * @var unknown
	 */
	public $selfStatus = array(
			0=>'No disponible',
			1=>'Disponible',
	);
	
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Tutorial the static model class
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
		return '{{tutorial}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		    array('NAME,HIERARCHY_ID,STATUS,RANKING,AUTHOR,PUBLISHED_DATE,CONTENT,ALIAS,RESUME', 'required'),
			array('HIERARCHY_ID, RANKING, STATUS', 'numerical', 'integerOnly'=>true),
			array('NAME', 'length', 'max'=>200),
			array('ALIAS', 'length', 'max'=>100),
			array('AUTHOR', 'length', 'max'=>300),
			array('RESUME, DESCRIPTION, CONTENT, PUBLISHED_DATE', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, HIERARCHY_ID, NAME, RESUME, DESCRIPTION, ALIAS, CONTENT, RANKING, PUBLISHED_DATE, AUTHOR, STATUS', 'safe', 'on'=>'search'),
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
				'hIERARCHY' => array(self::BELONGS_TO, 'MentoringHyerarchy', 'HIERARCHY_ID'),
				'documents' => array(self::HAS_MANY, 'TutorialDocument', 'TUTORIAL_ID', 'condition'=>'STATUS=1'),
				'publicDocuments' => array(self::HAS_MANY, 'TutorialDocument', 'TUTORIAL_ID', 'condition'=>'DOCUMENT_TYPE > 3 AND STATUS=1'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
				
			'HIERARCHY_ID' => 'Tutorial base',
			'NAME' => 'Nombre',
			'RESUME' => 'Resumen',
			'DESCRIPTION' => 'Descripcíon',
			'ALIAS' => 'Alias',
			'CONTENT' => 'Contenido',
			'RANKING' => 'Clasificar',
			'PUBLISHED_DATE' => 'Fecha de publicación',
			'AUTHOR' => 'Autor',
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
		$criteria->compare('RESUME',$this->RESUME,true);
		$criteria->compare('DESCRIPTION',$this->DESCRIPTION,true);
		$criteria->compare('ALIAS',$this->ALIAS,true);
		$criteria->compare('CONTENT',$this->CONTENT,true);
		$criteria->compare('RANKING',$this->RANKING);
		$criteria->compare('PUBLISHED_DATE',$this->PUBLISHED_DATE,true);
		$criteria->compare('AUTHOR',$this->AUTHOR,true);
		$criteria->compare('STATUS',$this->STATUS);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	
	/**
	 * Retrieves self status on string way 
	 * @return string
	 */
	public function getStringStatus(){
	
		return (isset($this->selfStatus[$this->STATUS]) ?$this->selfStatus[$this->STATUS]: 'unknow' );
	}
	
	
	/**
	 * retrieves a current logo file
	 */
	public function getLogo(){
	
		$DOCUMENT_LOGO_TYPE = 1;
		
		$Criteria = new CDbCriteria();
		$Criteria->condition = "TUTORIAL_ID = ".$this->ID.
		" AND STATUS = 1".
		" AND DOCUMENT_TYPE = ".$DOCUMENT_LOGO_TYPE;
		$Criteria->order = "ID";
			
		$documents = TutorialDocument::model()->findAll($Criteria);
	
		$path = isset($documents[0])? Yii::app( )->getBaseUrl( ).$documents[0]->PATH : Yii::app( )->getBaseUrl( ).'/uploads/default/defaultFile.png';
	
		return  $path;
	}
	
	
}