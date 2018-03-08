<?php

/**
 * This is the model class for table "{{registration}}".
 *
 * The followings are the available columns in table '{{registration}}':
 * @property integer $COURSE_ID
 * @property integer $STUDENT_ID
 * @property integer $STATUS
 * @property string $DATE_JOINED
 * @property string $COMMENT
 */
class Registration extends CActiveRecord
{
	
	public $course_search;
	public $student_search;
	public $student_email;
	public $student_phone;
	public $verifyCode;
	
	private $a_status = array(
		
			0=>'BAJA',
			1=>'Nuevo !',
			2=>'Proceso',
			3=>'Inscrito',
			
	);
		
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Registration the static model class
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
		return '{{registration}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('COURSE_ID, STUDENT_ID, STATUS, COMMENT', 'required'),
			array('COURSE_ID, STUDENT_ID, STATUS', 'numerical', 'integerOnly'=>true),
			array('COMMENT', 'length', 'max'=>500),
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(), 'on'=>'register'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('COURSE_ID, STUDENT_ID, STATUS, DATE_JOINED, course_search, student_search ', 'safe', 'on'=>'search'),
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
				'student' => array(self::BELONGS_TO, 'Student', 'STUDENT_ID'),
				'course' => array(self::BELONGS_TO, 'Course', 'COURSE_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'COURSE_ID' => 'ID curso',
			'STUDENT_ID' => 'ID alumno',
			'DATE_JOINED'=>'Fecha Solicitud',
			'STATUS' => 'Estatus',
			'COMMENT' => 'Comentario',
			'student_search' => 'Nombre alumno',			
			'course_search' => 'Nombre curso',
				
		);
	}

	
	
	/**
	 * 
	 * @param integer  $id
	 * @return Ambigous <string, multitype:string >
	 */
	public function getStatus($id){		
		
		return isset($this->a_status[$id])?$this->a_status[$id]:'unknow' ;
	}
	
	
	/**
	 * Gets avaliables status
	 * @return multitype:string
	 */
	public function getAStatus(){
		
		return $this->a_status;
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
		$criteria->with = array( 'student' );
		$criteria->compare( 'student.NAME', $this->student_search, true );
		$criteria->compare('COURSE_ID',$this->COURSE_ID);
		$criteria->compare('STUDENT_ID',$this->STUDENT_ID);
		$criteria->compare('STATUS',$this->STATUS);
		//$criteria->compare('COMMENT',$this->COMMENT,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
				'sort'=>array(
						'attributes'=>array(
								'student_search'=>array(
										'asc'=>'student.NAME',
										'desc'=>'student.NAME DESC',
								),
								'*',
						),
				),
		));
	}
}