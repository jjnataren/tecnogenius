<?php

class RegistrationController extends Controller
{
	
	public $layout='//layouts/back_column2';
	
	public function actionIndex()
	{
		$this->render('index');
	}
	
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
				array('allow',  // allow all users to perform 'index' and 'view' actions
						'actions'=>array( 'captcha'),
						'users'=>array('*'),
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions'=>array('create','update'),
						'users'=>array('@'),
				),
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
						'actions'=>array('index','view','admin','delete','manageDocuments','uploadDocument','select'),
						'users'=>array('admin'),
				),
				array('deny',  // deny all users
						'users'=>array('*'),
				),
		);
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
	 * does the student registration for a particular course
	 * @param integer $id
	 * 
	 */
	public function actionRegister($id){
		
		$model=new Registration;
		$studentModel = new Student;
		$courseModel = new Course;
		
		//$studentModel
		
		
		if(Yii::app()->getRequest()->getIsAjaxRequest()) {
		
			$studentModel->attributes=$_POST['Student'];
				
			echo CActiveForm::validate( array( $studentModel));
		
			Yii::app()->end();
		
		}
		
		
		
		
		//$this->render('contact',array('model'=>$model));
		
		}
		
	
	
	
	public function actionCreate()
	{
		$model=new Registration('register');
	
		// uncomment the following code to enable ajax-based validation
		/*
		 if(isset($_POST['ajax']) && $_POST['ajax']==='registration-create-form')
		 {
		echo CActiveForm::validate($model);
		Yii::app()->end();
		}
		*/
	
		if(isset($_POST['Registration']))
		{
			$model->attributes=$_POST['Registration'];
			if($model->validate())
			{
				// form inputs are valid, do something here
				return;
			}
		}
		$this->render('create',array('model'=>$model));
	}


	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Registration('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Registration']))
			$model->attributes=$_GET['Registration'];
	
		$this->render('admin',array(
				'model'=>$model,
		));
	}
	
	
	/**
	 * Gets status description of registration model
	 * @param Registration $data
	 * @param unknown $row
	 * @return string
	 */
	protected function gridRegistrationState($data, $row)
	{
		
		return Registration::model()->getStatus($data->STATUS);
	}
	
	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($courseId, $studentId)
	{
		
			
		$this->render('view',array(
				'model'=>$this->loadModel($courseId,$studentId),
		));
	}
	
	
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($courseId, $studentId)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($courseId,$studentId)->delete();
	
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($courseId, $studentId)
	{
		$model=Registration::model()->findByPK(array('COURSE_ID'=>$courseId, 'STUDENT_ID'=>$studentId));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($courseId, $studentId)
	{
		$model=$this->loadModel($courseId, $studentId);
	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
	
		if(isset($_POST['Registration']))
		{
			$student = $model->student;
			
			$student->attributes = $_POST['Student'];
			$model->attributes=$_POST['Registration'];
			
			if($model->save() && $student->save())
				$this->redirect(array (
						'view',
						'courseId' => $model->COURSE_ID,
						'studentId' => $model->STUDENT_ID 
				) );
		}
	
		$this->render('update',array(
				'model'=>$model,
		));
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