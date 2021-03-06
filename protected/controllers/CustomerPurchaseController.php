<?php

class CustomerPurchaseController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/back_column2';

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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','searchCustomer'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		
			
	
		
		$model=new CustomerPurchase;

		
	
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		

		if(isset($_POST['CustomerPurchase']) && isset($_POST['Customer'])){
			
			$model->attributes=$_POST['CustomerPurchase'];
			
			$customerModel = new Customer();
			$customerModel->attributes = $_POST['Customer'];

			if ($customerModel->ID != NULL) {

				$customerModel = Customer::model()->findByPk($customerModel->ID);
				
				if($customerModel===null)
					throw new CHttpException(404,'The requested page does not exist.');
			}
			
			$productModel = new Product();
			$productModel->attributes = (isset($_POST['Product'])) ? $_POST['Product'] : null ;
			
			if($productModel->ID != null){

				$productModel = Product::model()->findByPk($productModel->ID);
					
				if($productModel===null)
					throw new CHttpException(404,'The requested page does not exist.');
					
			}else{
				
				
				$model->validate();
				
				$this->render('create',array(
						'model'=>$model,
				));
				
				return ;
			}
			
		
			if($model->SALE_PROMOTION_ID > 0){
				
				if( SalePromotion::model()->findByPk($model->SALE_PROMOTION_ID)===null)
					throw new CHttpException(404,'The requested page does not exist.');
					
				
			}else $model->SALE_PROMOTION_ID = NULL;

			
			$model->PRODUCT_ID = $productModel->ID;
			
			if($customerModel->validate()){
				
				//if($customerModel->ID === null)

					$customerModel->save();

				$model->CUSTOMER_ID = $customerModel->ID;
				$model->PURCHASE_DATE = date('Y-m-d H:i:s');
				
				if($model->save())				
				$this->redirect(array('view','id'=>$model->ID));
				else $model->cUSTOMER = $customerModel;
					
				
			}else $model->cUSTOMER = $customerModel;
				
		}else{
			
			if( isset($_REQUEST['studentId']) && $_REQUEST['studentId'] > 0 && 
						isset($_REQUEST['courseId']) && $_REQUEST['courseId'] > 0){				
				
			
				$registrationModel = Registration::model()->findByPk(array('COURSE_ID'=>$_REQUEST['courseId'], 'STUDENT_ID'=>$_REQUEST['studentId'] ));
			
				if($registrationModel===null)
					throw new CHttpException(404,'The requested page does not exist.');
				
				$customerModel = new Customer();
				
				$customerModel->NAME = $registrationModel->student->NAME;
				$customerModel->ADDRESS = $registrationModel->student->ADDRESS;
				$customerModel->EMAIL = $registrationModel->student->EMAIL;
				$customerModel->PHONE = $registrationModel->student->PHONE;
				
				$productModel = new Product();
				
				$productModel->cOURSE = $registrationModel->course;
				
				$model->cUSTOMER = $customerModel;
				$model->pRODUCT = $productModel;
				$model->PRICE_CUSTOMER_PAID = isset( $registrationModel->course)?   $registrationModel->course->PUBLISHED_PRICE : 0; 
				
			
			}
			
			
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CustomerPurchase']) && isset($_POST['Customer']))
		{
			$model->attributes=$_POST['CustomerPurchase'];
			
			$customerModel = new Customer();
			$customerModel->attributes = $_POST['Customer'];

			if ($customerModel->ID != NULL) {

				$customerModel = Customer::model()->findByPk($customerModel->ID);
				
				if($customerModel===null)
					throw new CHttpException(404,'The requested page does not exist.');
			}
			
			$productModel = new Product();
			$productModel->attributes = (isset($_POST['Product'])) ? $_POST['Product'] : null ;
			
			if($productModel->ID != null){

				$productModel = Product::model()->findByPk($productModel->ID);
					
				if($productModel===null)
					throw new CHttpException(404,'The requested page does not exist.');
					
			}else{
				
				
				$model->validate();
				
				$this->render('create',array(
						'model'=>$model,
				));
				
				return ;
			}
			
		
			if($model->SALE_PROMOTION_ID > 0){
				
				if( SalePromotion::model()->findByPk($model->SALE_PROMOTION_ID)===null)
					throw new CHttpException(404,'The requested page does not exist.');
					
				
			}else $model->SALE_PROMOTION_ID = NULL;

			
			$model->PRODUCT_ID = $productModel->ID;
			
			if($customerModel->validate()){
				
				if($customerModel->ID === null) 
					
					$customerModel->save();

				$model->CUSTOMER_ID = $customerModel->ID;
				$model->PURCHASE_DATE = date('Y-m-d H:i:s');
				
				if($model->save())				
				$this->redirect(array('view','id'=>$model->ID));
				 
					
				
			}else $model->cUSTOMER = $customerModel;
				
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('CustomerPurchase');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new CustomerPurchase('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CustomerPurchase']))
			$model->attributes=$_GET['CustomerPurchase'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	
	/**
	 * Filters customers
	 */
	public function actionSearchCustomer()
	{
		$model=new Customer('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Customer']))
			$model->attributes=$_GET['Customer'];
	
		$this->render('../customer/_searchModal',array(
				'model'=>$model,
		));
	}
	

	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=CustomerPurchase::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='customer-purchase-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
