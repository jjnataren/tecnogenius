<?php

class MethodologyController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';
	public $layout='//layouts/back_column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('admin','delete','manageDocuments', 'uploadDocument','manageItems','createItem','updateItem'),
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
		$model=new Methodology;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Methodology']))
		{
			$model->attributes=$_POST['Methodology'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	
	
	/**
	 * Creates a new item.
	 * If creation is successful, the browser will be redirected to the 'manageItems' page.
	 */
	public function actionCreateItem($id)
	{

		$model=$this->loadModel($id);
		$modelItem = new Methodology();
		
		if(isset($_POST['Methodology']))
		{
			
			$modelItem->attributes=$_POST['Methodology'];
			$modelItem->PARENT_ID = $model->ID;
			
			
			if($modelItem->save())
				$this->redirect(array('manageItems','id'=>$model->ID));
		}
		
		$this->render('createItem',array(
				'modelItem'=>$modelItem,
				'model'=>$model
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

		if(isset($_POST['Methodology']))
		{
			$model->attributes=$_POST['Methodology'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdateItem($id,$idItem)
	{
		$model=$this->loadModel($id);
	
		$modelItem = $this->loadModel($idItem);
		
		if ( $modelItem->PARENT_ID !== $id )
			throw new CHttpException(404,'The requested page does not exist.');
			
	
		
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
	
		if(isset($_POST['Methodology']))
		{
			$modelItem->attributes=$_POST['Methodology'];
			if($modelItem->save())
				$this->redirect(array('manageItems','id'=>$model->ID));
		}
	
		$this->render('updateItem',array(
				'model'=>$model,
				'modelItem'=>$modelItem,
				
		));
	}
	
	
	
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Methodology');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Methodology('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Methodology']))
			$model->attributes=$_GET['Methodology'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	
	/**
	 * Manages Tutorial's documents
	 * @param integer $id 
	 */
	public function actionManageDocuments($id){
	
		$model=$this->loadModel($id);
	
		$document = new DocumentMethodology();
	
		$documents = $model->documentMethodologies;
	
		Yii::import("xupload.models.XUploadForm");
	
		$fileModel = new XUploadForm;
	
		$this->render('manageDocuments',array(
				'model'=>$model,
				'documentModel'=>$document,
				'documents'=>$documents,
				'fileModel'=> $fileModel,
		));
	
	}

	
	/**
	 * Shows Methodology's child
	 * @param integer $id
	 */
	public function actionManageItems($id){
		
		
		$model = $this->loadModel($id);
		
		if ($model->PARENT_ID){
			
			throw new CHttpException(404,'The requested page does not exist.');
			
		}
		
		$modelSearch=new Methodology('search');
		$modelSearch->unsetAttributes();  // clear any default values
		$modelSearch->PARENT_ID = $model->ID;
		if(isset($_GET['Methodology'])){
			
			$modelSearch->attributes=$_GET['Methodology'];
			
		}
		
		
		
		$this->render('manageItems',array(
				'model'=>$model,
				'modelSearch'=>$modelSearch
		));
		
	}
	
	

	/**
	 * Uploads a particular document  to FS and DB by reference
	 * @param int $id
	 * @throws CHttpException
	 */
	
	public function actionUploadDocument($id){
	
		$this->loadModel($id);
	
		Yii::import( "xupload.models.XUploadForm" );
		//Here we define the paths where the files will be stored temporarily
		$path = realpath( Yii::app( )->getBasePath( )."/../uploads" )."/methodology/{$id}/";
		$publicPath = "/uploads/methodology/{$id}/";
	
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
	
						$documentModel =  DocumentMethodology::model()->findByPk($idDocumentModel);
							
						$documentModel->STATUS = 0;
	
						$documentModel->save();
						
						
	
						unlink( $file );
					}else{
						
						$idDocumentModel = $_GET["idDocumentModel"];
						
						$documentModel =  DocumentMethodology::model()->findByPk($idDocumentModel);
							
						$documentModel->STATUS = 0;
						
						$documentModel->save();
						
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
	
					$documentToSave = new DocumentMethodology();
	
	
					$documentToSave->METHODOLOGY_ID	 =$id;
	
					//$documentToSave->ID_DOCUMENT = $document['TYPE'];
					$documentToSave->NAME = $model->name;
					$documentToSave->DESCRIPTION = $document['DESCRIPTION'];
					$documentToSave->DOCUMENT_TYPE = $document['TYPE'];
					$documentToSave->PATH = $publicPath.$filename;
					$documentToSave->SIZE = $model->size;
					$documentToSave->TYPE = $model->mime_type;
					$documentToSave->THUMBNAIL = $thumbURL;
					
					$documentToSave->DEL_TYPE = 'POST';
					$documentToSave->STATUS = 1;
	
					$documentToSave->save();
					
					$documentToSave->DEL_URL = $this->createUrl( "uploadDocument", array(
							"id"=>$id,
							"_method" => "delete",
							"file" => $filename,
							"idDocumentModel"=>$documentToSave->ID,
					));
					
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
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Methodology the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Methodology::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Methodology $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='methodology-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
