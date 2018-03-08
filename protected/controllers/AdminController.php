<?php

class AdminController extends Controller
{
	
	public $layout='//layouts/back_column2';
	public $newSubmitters = 0;
	
	public function actionIndex()
	{
		
		
	$no_cursos=Course::model()->count('STATUS=1');
	
	
	$course = new Course();
	
	$criteria=new CDbCriteria;
	$criteria->select='max(PUBLISHED_PRICE) AS precio';
	
	$courseCaro = $course->model()->findBySql('SELECT * FROM tbl_course WHERE STATUS = 1 ORDER BY PUBLISHED_PRICE DESC');
	
		
		$this->render('index', array('ncursos'=>$no_cursos, 'cC'=>$courseCaro));
	}

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
				'accessControl', // perform access control for CRUD operations
		);
	}
	
	
	
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions'=>array('create','update'),
						'users'=>array('admin'),
				),
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
						'actions'=>array('admin','delete','index'),
						'users'=>array('admin'),
				),
				array('deny',  // deny all users
						'users'=>array('*'),
				),
		);
	}
	
	
	
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}