<?php

class TutorialController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/back_column2';
	
	public $promotionItems;
	
	public $help;

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
				'actions'=>array('view','getByBranch','detail'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','index',
									'delete','deleteKeyword','manageDocuments','uploadDocument','adminSearch'),
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
	 * Manages relations between keyword and Tutorial
	 * @param integer $id the ID of the model
	 */
	public function actionAdminSearch($id)
	{
		
		
		$model = $this->loadModel($id);
		
		$kerwordTutorial = new KeywordTutorial();
		
		$keywordGrid = new KeywordTutorial();
		$keywordGrid->TUTORIAL_ID = $id;
		
		$isError = false;
		
		if(isset($_POST['KeywordTutorial']))
		{
			
			$words = array();
			$tmpKeyWord = new KeywordTutorial();
			
			$tmpKeyWord->attributes =  $_POST['KeywordTutorial'][0];
			
			$words = explode(',', $tmpKeyWord->WORD);
			
			foreach ($words as $word){
			
			if(strlen(trim($word)) > 2)	
			if(KeywordTutorial::model()->findByAttributes(array('TUTORIAL_ID'=>$id,'WORD'=>trim($word)))=== null){

				$kerwordTutorial->WORD=trim($word);
				$kerwordTutorial->TUTORIAL_ID = $id;
				
				if(!$kerwordTutorial->save()){ break; $idError = true; }
					else $kerwordTutorial = new KeywordTutorial(); 
				
				}
			}
			
			if(!$isError) 
				$this->redirect(array('adminSearch','id'=>$id));
		

		}
		
		$this->render('adminSearch',array(
				'model'=>$model,
				'keyword'=> $kerwordTutorial,
				'keywordGrid'=>$keywordGrid,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Tutorial;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Tutorial']))
		{
			$model->attributes=$_POST['Tutorial'];
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

		if(isset($_POST['Tutorial']))
		{
			$model->attributes=$_POST['Tutorial'];
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
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDeleteKeyword($id, $keyword)
	{
		
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			
			$keyword = KeywordTutorial::model()->findByAttributes(array('TUTORIAL_ID'=>$id,'WORD'=>$keyword));
			
			$keyword->delete();
	
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
		$dataProvider=new CActiveDataProvider('Tutorial');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Tutorial('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Tutorial']))
			$model->attributes=$_GET['Tutorial'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	
	
	/**
	 * Manages Tutorial documents
	 * @param integer $id
	 */
	public function actionManageDocuments($id){
	
		$model=$this->loadModel($id);
	
		$document = new TutorialDocument();
	
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
	 * Uploads a particular document  to FS
	 * @param int $id
	 * @throws CHttpException
	 */
	
	public function actionUploadDocument($id){
	
		$this->loadModel($id);
	
		Yii::import( "xupload.models.XUploadForm" );
		//Here we define the paths where the files will be stored temporarily
		$path = realpath( Yii::app( )->getBasePath( )."/../uploads" )."/tutorial/{$id}/";
		$publicPath = "/uploads/tutorial/{$id}/";
	
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
	
						$documentModel =  TutorialDocument::model()->findByPk($idDocumentModel);
							
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
	
					$documentToSave = new TutorialDocument();
	
						
					$documentToSave->TUTORIAL_ID =$id;
						
					//$documentToSave->ID_DOCUMENT = $document['TYPE'];
					$documentToSave->NAME = $model->name;
					$documentToSave->DESCRIPTION = $document['DESCRIPTION'];
					$documentToSave->DOCUMENT_TYPE = $document['TYPE'];
					$documentToSave->PATH = $publicPath.$filename;
					$documentToSave->SIZE = $model->size;
					$documentToSave->TYPE = $model->mime_type;
					$documentToSave->THUMBNAIL = $thumbURL;
					$documentToSave->DEL_URL = Yii::app()->createUrl( "uploadDocument", array(
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
							"url" => Yii::app( )->getBaseUrl( ).$publicPath.$filename,
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
	 *
	 * Gets detail of a particular tutorial by its ID
	 * @param integer the ID of the MentoringHierarchy to be loaded
	 */
	public function actionDetail($id)
	{
		
		$this->layout='//layouts/column3';
		
		$model = $this->loadModel($id);
		
		/**
		 * Get all promotions
		 *
		 */
		
		$this->promotionItems = SalePromotion::model()->findAllByAttributes(
				array(),
				$condition  = 'END_DATE >= :today AND START_DATE <= :today',
				$params     = array(
						':today' => date('Y-m-d', time()),
				)
		);
		
		
		$this->render('public/detail',array(
				'model'=>$model,
		));
		
		
	}
	
	
	
	/**
	 * 
	 * Gets all tutorials that are related to a particular mentoringhierarchy Level = 100 "BRANCH" 	  
	 * @param integer the ID of the MentoringHierarchy to be loaded
	 */
	public function actionGetByBranch($id)
	{
		
		$LEVEL_BRANCH =100;
		
		$mHiearchy = MentoringHyerarchy::model()->findByPk($id);
		if($mHiearchy===null ||  $mHiearchy->LEVEL_NUMBER =! $LEVEL_BRANCH)
			throw new CHttpException(404,'The requested page does not exist.');
		
		
		$tutorialHierarchies =  $mHiearchy->tutorialHyerarchies;
		$tutorialsArray = array();
		
		$branches = MentoringHyerarchy::model()->findAllByAttributes(array(),
        $condition  = 'LEVEL_NUMBER = :level AND PARENT_ID = :parent',
        $params     = array(
                ':level' => $LEVEL_BRANCH, 
                ':parent' => $mHiearchy->PARENT_ID,
        )
		);
		
		
		foreach ($tutorialHierarchies as $tutorialHiearchy){
			
			$tutorialsArray[] = $tutorialHiearchy->tutorials;
			
		}
		
	
		$this->renderPartial('public/_innerTutorials', array('model'=>$mHiearchy, 'tutorialsArray' => $tutorialsArray, 'branches'=>$branches));
		Yii::app()->end();
		
	}
	
	
	
	
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Tutorial::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tutorial-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
