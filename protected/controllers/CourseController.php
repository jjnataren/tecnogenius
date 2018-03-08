<?php

class CourseController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/back_column2';

	public $dateDetailsMenu;
	
	public $promotionItems;
	
	public $help;
	
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
				// captcha action renders the CAPTCHA image displayed on the contact page
				'captcha'=>array(
					'class'=>'CCaptchaAction',
					'backColor'=>0xFFFFFF,
				),
				// page action renders "static" pages stored under 'protected/views/site/pages'
				// They can be accessed via: index.php?r=site/page&view=FileName
				'page'=>array(
						'class'=>'CViewAction',
				),
				'yiichat'=>array('class'=>'YiiChatAction'),
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
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
				array('allow',  // allow all users to perform 'index' and 'view' actions
						'actions'=>array('index','view','detail', 'captcha'),
						'users'=>array('*'),
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions'=>array('create','update'),
						'users'=>array('@'),
				),
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
						'actions'=>array('admin','delete','manageDocuments','uploadDocument','select'),
						'users'=>array('admin'),
				),
				array('deny',  // deny all users
						'users'=>array('*'),
				),
		);
	}
	
	/**
	 * Manage Couse documents
	 * @param integer $id
	 */
	public function actionManageDocuments($id){
	
		$model=$this->loadModel($id);
	
		$document = new Document();
	
		$documents = $model->documents;
	
		Yii::import("xupload.models.XUploadForm");
		$fileModel = new XUploadForm;
	
		$this->render('manageDocuments',array(
				'model'=>$model,
				'documentModel'=>$document,
				'documents'=>$documents,
				'fileModel'=> $fileModel,
				//	'file'=>$json,
				//	'photoModel'=>$photos,
		));
	
	}
	
	
	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionSelect($id)
	{
	
		$model = $this->loadModel($id);
	
		//   echo CJSON::encode($model);
	
		$this->renderPartial('_partialForm', array('model' => $model));
		Yii::app()->end();
	}
	
	/**
	 * Uploads a particular document  to FS
	 * @param int $id
	 * @throws CHttpException
	 */
	
	public function actionUploadDocument($id){
	
		$this->loadModel($id);
	
		Yii::import( "xupload.models.XUploadForm" );
		//Here we define the paths where the files will be stored temporarily
		$path = realpath( Yii::app( )->getBasePath( )."/../uploads" )."/course/{$id}/";
		$publicPath = Yii::app( )->getBaseUrl( )."/uploads/course/{$id}/";
	
		//This is for IE which doens't handle 'Content-type: application/json' correctly
		header( 'Vary: Accept' );
		if( isset( $_SERVER['HTTP_ACCEPT'] )
		&& (strpos( $_SERVER['HTTP_ACCEPT'], 'application/json' ) !== false) ) {
			header( 'Content-type: application/json' );
		} else {
			header( 'Content-type: text/plain' );
		}
	
		//Here we check if we are deleting and uploaded file
		if( isset( $_GET["_method"] ) ) {
			if( $_GET["_method"] == "delete" ) {
				if( $_GET["file"][0] !== '.' ) {
					$file = $path.$_GET["file"];
					if( is_file( $file ) ) {
	
						$idDocumentModel = $_GET["idDocumentModel"];
	
						$documentModel =  Document::model()->findByPk($idDocumentModel);
							
						$documentModel->STATUS = 0;
	
						$documentModel->save();
	
						unlink( $file );
					}
				}
				echo json_encode( true );
			}
		} else {
			$model = new XUploadForm;
			$model->file = CUploadedFile::getInstance( $model, 'file' );
			//We check that the file was successfully uploaded
			if( $model->file !== null ) {
				//Grab some data
				$model->mime_type = $model->file->getType( );
				$model->size = $model->file->getSize( );
				$model->name = $model->file->getName( );
				//(optional) Generate a random name for our file
				$filename = md5( Yii::app( )->user->id.microtime( ).$model->name);
				$filename .= ".".$model->file->getExtensionName( );
				if( $model->validate( ) ) {
	
					if( !is_dir( $path.'thumbs/' ) ) {
						mkdir( $path.'thumbs/',0777,true);
					}
	
					//Move our file to our temporary dir
					$model->file->saveAs( $path.$filename );
					chmod( $path.$filename, 0777 );
					//here you can also generate the image versions you need
					//using something like PHPThumb
	
	
					try{
	
						$thumb=Yii::app()->phpThumb->create($path.$filename);
						$thumb->resize(100,100);
						$thumb->save($path."thumbs/$filename");
	
						$thumbURL =  $publicPath."thumbs/$filename";
	
					}catch (Exception $e){
	
						$thumbURL =  Yii::app( )->getBaseUrl( )."/uploads/default/defaultFile.png";
	
					}
	
	
					//Now we need to save this path to the user's session
					if( Yii::app( )->user->hasState( 'images' ) ) {
						$userImages = Yii::app( )->user->getState( 'images' );
					} else {
						$userImages = array();
					}
					$userImages[] = array(
							"path" => $path.$filename,
							//the same file or a thumb version that you generated
							"thumb" => $path.$filename,
							"filename" => $filename,
							'size' => $model->size,
							'mime' => $model->mime_type,
							'name' => $model->name,
					);
					Yii::app( )->user->setState( 'images', $userImages );
	
	
					/**
					 * Database implementation
					 *
					 *
					* */
	
	
					$postDocuments = array();
					$postDocuments = $_POST['_DOCUMENT'];
	
					$document = $postDocuments[$model->name];
	
					$documentToSave = new Document();
	
					
					$documentToSave->COURSE_ID =$id;
					
					//$documentToSave->ID_DOCUMENT = $document['TYPE'];
					$documentToSave->NAME = $model->name;
					$documentToSave->DESCRIPTION = $document['DESCRIPTION'];
					$documentToSave->DOCUMENT_TYPE = $document['TYPE'];
					$documentToSave->PATH = $publicPath.$filename;
					$documentToSave->SIZE = $model->size;
					$documentToSave->TYPE = $model->mime_type;
					$documentToSave->THUMBNAIL = $thumbURL;
					$documentToSave->DEL_URL = $this->createUrl( "uploadDocument", array(
							"id"=>$id,
							"_method" => "delete",
							"file" => $filename,
					));
					$documentToSave->DEL_TYPE = 'POST';
					$documentToSave->STATUS = 1;
	
					$documentToSave->save();
	
					//Now we need to tell our widget that the upload was succesfull
					//We do so, using the json structure defined in
					// https://github.com/blueimp/jQuery-File-Upload/wiki/Setup
					echo json_encode( array( array(
							"name" => $model->name,
							"type" => $model->mime_type,
							"size" => $model->size,
							"url" => $publicPath.$filename,
							"description"=>$documentToSave->DESCRIPTION,
							"tDocument"=>$documentToSave->getStringType(),
							"thumbnail_url" => $thumbURL,// $publicPath."thumbs/$filename",
							"delete_url" => $this->createUrl( "uploadDocument", array(
									"id"=>$id,
									"_method" => "delete",
									"file" => $filename,
									"idDocumentModel"=>$documentToSave->ID,
							) ),
							"delete_type" => "POST"
					) ) );
				} else {
					//If the upload failed for some reason we log some data and let the widget know
					echo json_encode( array(
							array( "error" => $model->getErrors( 'file' ),
							) ) );
					Yii::log( "XUploadAction: ".CVarDumper::dumpAsString( $model->getErrors( ) ),
					CLogger::LEVEL_ERROR, "xupload.actions.XUploadAction"
							);
				}
			} else {
				throw new CHttpException( 500, "Could not upload file" );
			}
		}
	
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
		$model=new Course;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Course']))
		{
			$model->attributes=$_POST['Course'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID));
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

		if(isset($_POST['Course']))
		{
			$model->attributes=$_POST['Course'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID));
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
		$dataProvider=new CActiveDataProvider('Course');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Course('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Course']))
			$model->attributes=$_GET['Course'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	
	/**
	 * Shows brief detail of a particular Course
	 */
	public function actionDetail($id)
	{
		
		$this->layout='//layouts/column3';
		
		$ENABLED = 1;
		
		$NEW_DETAIL_TEXT = 'Alumno nuevo, candidato';
		
		$studentModel = new Student();
		
		$model=new Registration;
		
		$courseModel = new Course;
		
		
		if(Yii::app()->getRequest()->getIsAjaxRequest()) {
		
			$studentModel->attributes=$_POST['Student'];
			
			echo CActiveForm::validate( array( $studentModel));
		
			Yii::app()->end();
		
		}

		
		if(isset($_POST['Student']) && isset($_POST['Registration']) && isset($_POST['Course'])  )
		{
			
			
			$studentModel->attributes=$_POST['Student'];
									
			$studentModel->STATUS = $ENABLED;
				
			$model->attributes=$_POST['Registration'];
				
			$courseModel->attributes=$_POST['Course'];
			
			$tmp_studentModel = Student::model()->findByAttributes(array('EMAIL'=>$studentModel->EMAIL));
			
			if(!($tmp_studentModel===null)) $studentModel=$tmp_studentModel;
		
			if($studentModel->validate())
			{
				
				if ($studentModel->save() && isset($_POST['Course']['ID'])){
					
					$model->STUDENT_ID = $studentModel->ID;
					
					$model->COURSE_ID = $_POST['Course']['ID'];
					
					$courseModel = $this->loadModel($_POST['Course']['ID']);
					
					$model->STATUS = $ENABLED;
					
					$model->DATE_JOINED = date('Y-m-d H:i:s', time());  
					
					$model->COMMENT = $NEW_DETAIL_TEXT;
					
					try {
						
						
						if($model->save()){
						
							
							Yii::app()->user->setFlash('success', '<strong>Bien hecho!</strong> Ahora estas inscrito en este curso: '.strtoupper ($courseModel->NAME));
							
							/**
							 * Email Implementation
							 */
							$subject = $NEW_DETAIL_TEXT."$studentModel->NAME".",$studentModel->PHONE";
							
							/**
							Body	
							 */
							
							$owner = Yii::app()->params['adminEmail'];
							
							$body="Se ha registrado una solicitud de curso, puede consultarla haciendo clic en el siguiente enlace. <br />".
									Yii::app()->createAbsoluteUrl("registration/view", array("courseId"=>$model->COURSE_ID, "studentId"=>$model->STUDENT_ID ) );
							
							$headers="From: {$studentModel->EMAIL}\r\nReply-To: {$studentModel->EMAIL}";
							
							mail($owner,$subject,$body,$headers);
							
							try{
								
							
							} catch (phpmailerException $e) {
								
							}
								
						
						}
							
					} catch (Exception $e) {
						
						Yii::app()->user->setFlash('success', '<strong>Bien hecho!</strong> Ahora estas inscrito en este curso: <code>'.strtoupper ($courseModel->NAME).'</code>' );
					}
					
					
				}
				//$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				//mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				
				
				
			}
			
			$this->refresh();
		}
	

		
		$this->render('detail',array(
			'model'=>$this->loadModel($id),
			'studentModel'=>$studentModel,	
		));
	}
	
	
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Course::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='course-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
