<?php

class SiteController extends Controller
{
	
	public $promotionItems;
	
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
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionCourseIndex($id)
	{
		
		$this->layout='//layouts/column3';
		
		$menu_items  = array();
		
		$parent_hierarchies = MentoringHyerarchy::model()->findAllByAttributes(array('LEVEL_NUMBER'=>'10', 'PARENT_ID'=>0));
		
				
			$mentoringHierarchy = MentoringHyerarchy::model()->findByPK($id);
				
			if($mentoringHierarchy===null)
				throw new CHttpException(404,'The requested resource does not exist.');
		
		
		$menu_items[] = array('label'=>'Top cursos','active'=>(!$id), 'url'=>array('site/topCourses'));
		
		
		foreach ($parent_hierarchies as $parent_hierarchy){
			
			$items = 	$this->getFirstChild($parent_hierarchy->ID,'site/courseIndex');
			
			$tech = MentUrl::getStandarPathString($parent_hierarchy->NAME,'tecnología');
				
			$url = (!count($items))? array('site/courseIndex','id'=>$parent_hierarchy->ID, 'tech'=>$tech) : array('#');
			
			$menu_items[] = array('label'=>$parent_hierarchy->NAME,'active'=>($id != 0 &&  $mentoringHierarchy != null &&  ($mentoringHierarchy->PARENT_ID == $parent_hierarchy->ID || $mentoringHierarchy->ID == $parent_hierarchy->ID )) , 'url'=>$url, 'items'=>$items);
	 
			
		}
		
		
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
		
		
		
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('courseIndex', array('parentTopic'=>$id,'menu_items'=>$menu_items,'model'=>$mentoringHierarchy));
	}
	
	

	/**
	 * action that shows top courses
	 * 
	 */
	public function actionTopCourses()
	{
	
		$this->layout='//layouts/column3';
	
		$menu_items  = array();
	
		$id= 0;
		
		$parent_hierarchies = MentoringHyerarchy::model()->findAllByAttributes(array('LEVEL_NUMBER'=>'10', 'PARENT_ID'=>0));
				
			$Criteria = new CDbCriteria();
			$Criteria->condition = "RANKING > 2 AND STATUS > 0 AND HIERARCHY_ID IS NOT NULL";
			$Criteria->limit = 10;
			$mentoringHierarchy = Course::model()->findAll($Criteria);
	
		$menu_items[] = array('label'=>'Top cursos','active'=>(!$id), 'url'=>array('site/topCourses'));
	
		foreach ($parent_hierarchies as $parent_hierarchy){
				
			$items = 	$this->getFirstChild($parent_hierarchy->ID,'site/courseIndex');
	
			$tech = MentUrl::getStandarPathString($parent_hierarchy->NAME,'tecnología');
			
			$url = (!count($items))? array('site/courseIndex','id'=>$parent_hierarchy->ID,'tech'=>$tech) : array('#');
				
			$menu_items[] = array('label'=>$parent_hierarchy->NAME,'active'=>($id != 0 &&  $mentoringHierarchy != null &&  ($mentoringHierarchy->PARENT_ID == $parent_hierarchy->ID || $mentoringHierarchy->ID == $parent_hierarchy->ID )) , 'url'=>$url, 'items'=>$items);
				
		}
	
	
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
	
	
	
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('courseIndex', array('parentTopic'=>$id,'menu_items'=>$menu_items,'model'=>$mentoringHierarchy));
	}
	
	
	
	
	/**
	 * This is the default 'index Tutorial' action that is invoked
	 * when an Hyeararchy is not explicitly requested by users.
	 * @param int $id
	 * @throws CHttpException
	 */
		
	public function actionTutoIndex($id)
	{
	
		$this->layout='//layouts/column3';
	
		$menu_items  = array();
		
		$branchs  = array();
		
		$mentoringHierarchy = null;
		
		$tutorials = array();
	
		
		/** Gets menu Items**/
		$parent_hierarchies = MentoringHyerarchy::model()->findAllByAttributes(array('LEVEL_NUMBER'=>'10', 'PARENT_ID'=>0));


		$mentoringHierarchy = MentoringHyerarchy::model()->findByPK($id);
		
		if($mentoringHierarchy===null )
			throw new CHttpException(404,'The requested resource does not exist.');
		
		$menu_items[] = array('label'=>'Top Tutoriales','active'=>(!$id), 'url'=>array('site/topTuto'));
		
		foreach ($parent_hierarchies as $parent_hierarchy){
				
			$items = 	$this->getFirstChild($parent_hierarchy->ID, 'site/tutoIndex');
			
			$tech = MentUrl::getStandarPathString($parent_hierarchy->NAME,'tecnología');
		
			$url = (!count($items))? array('site/tutoIndex','id'=>$parent_hierarchy->ID,'tech'=>$tech) : array('#');
				
			$menu_items[] = array('label'=>$parent_hierarchy->NAME,'active'=>(  ($mentoringHierarchy->PARENT_ID == $parent_hierarchy->ID || $mentoringHierarchy->ID == $parent_hierarchy->ID )) , 'url'=>$url, 'items'=>$items);
		}
		
			$tmp_tuto = array();
			
			$tutorialHierarchies = array();
	
	
			
			
			$tutorials = $mentoringHierarchy->tutorials;
			
			$tutorialHierarchies =  $mentoringHierarchy->tutorialHyerarchies;
			
			foreach ($tutorialHierarchies as $tutorialHiearchy){
					
				foreach ( $tutorialHiearchy->tutorials as $tmp_tuto)
					$tutorials[] = $tmp_tuto;
					
			}
	
	
		/**
		 * Gets all promotions
		 *
		 */
	
		$this->promotionItems = SalePromotion::model()->findAllByAttributes(
				array(),
				$condition  = 'END_DATE >= :today AND START_DATE <= :today',
				$params     = array(':today' => date('Y-m-d', time()),
				)
		);
		
		
		$this->render('tutoIndex', array('parentTopic'=>$id,'menu_items'=>$menu_items, 
				'tutorials'=>$tutorials, 'branchs'=>$branchs, 'model'=>$mentoringHierarchy));
	}
	

	
	/**
	 * This is the default 'index Tutorial' action that is invoked
	 * when an Hyeararchy is not explicitly requested by users.
	 * @param int $id
	 * @throws CHttpException
	 */
	
	public function actionTopTuto()
	{
	
		$this->layout='//layouts/column3';
	
		$menu_items  = array();
	
		$branchs  = array();
	
		$mentoringHierarchy = null;
	
		$tutorials = array();
	
	
		/** Gets menu Items**/
		$parent_hierarchies = MentoringHyerarchy::model()->findAllByAttributes(array('LEVEL_NUMBER'=>'10', 'PARENT_ID'=>0));
	
	
		$menu_items[] = array('label'=>'Top Tutoriales','active'=>true, 'url'=>array('site/topTuto'));
	
		foreach ($parent_hierarchies as $parent_hierarchy){
	
			$items = 	$this->getFirstChild($parent_hierarchy->ID, 'site/tutoIndex');
	
			
			$tech = MentUrl::getStandarPathString($parent_hierarchy->NAME,'tecnología');
			
			$url = (!count($items))? array('site/tutoIndex','id'=>$parent_hierarchy->ID, 'tech'=>$tech) : array('#');
	
			$menu_items[] = array('label'=>$parent_hierarchy->NAME,'active'=>(true &&  $mentoringHierarchy != null &&  ($mentoringHierarchy->PARENT_ID == $parent_hierarchy->ID || $mentoringHierarchy->ID == $parent_hierarchy->ID )) , 'url'=>$url, 'items'=>$items);
		}
	
		/****/
	
	
		/** Gets Avaliable tutorials **/
	
	
			$Criteria = new CDbCriteria();
			$Criteria->condition = "RANKING > 2 AND STATUS > 0 AND HIERARCHY_ID IS NOT NULL";
			$Criteria->limit = 10;
			$tutorials = Tutorial::model()->findAll($Criteria);
	
	
	
		/**
		 * Gets all promotions
		 *
		 */
	
		$this->promotionItems = SalePromotion::model()->findAllByAttributes(
				array(),
				$condition  = 'END_DATE >= :today AND START_DATE <= :today',
				$params     = array(':today' => date('Y-m-d', time()),
				)
		);
	
	
		$this->render('tutoIndex', array('parentTopic'=>0,'menu_items'=>$menu_items,
				'tutorials'=>$tutorials, 'branchs'=>$branchs, 'model'=>$mentoringHierarchy));
	}
	
	
	
	
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		
		$this->layout='//layouts/column3';
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	    
	    
	}
	
	
	
	/**
	 * Displays the contact page
	 */
	public function actionSearch()
	{
	
		$this->layout='//layouts/column3';
		$tutorials =array();
		$courses= array();
		$search_string =(isset($_GET['search_string']))? $_GET['search_string'] : '' ;
		//$model=new ContactForm;
		//if(isset($_POST['search_string']) && strlen(trim($_POST['search_string'])) > 2 )
	//	{
		
			$search_string = $_GET['search_string'];
			
			$words = explode(' ', $search_string);
				
			$result_set = Keyword::model()->findByPk(trim($search_string));
			
			
			$q = new CDbCriteria();
			$q->distinct=TRUE;
			$q->select='TUTORIAL_ID';
			
		   foreach ($words as $word)				
		   		if (strlen(trim($word)) > 2)
					$q->addSearchCondition('WORD', $word,true, 'OR');
				
			
			
			$tutorials = KeywordTutorial::model()->findAll( $q );
			
			

			
	//	}else {
			
			//$this->render('search',array('model'=>null, 'kTutorials'=>new arr, 'courses'=>array(), 'search_string'=>(isset($_POST['search_string']))) ? $_POST['search_string'] : null);
	//	}
		
		$this->promotionItems = SalePromotion::model()->findAllByAttributes(
				array(),
				$condition  = 'END_DATE >= :today AND START_DATE <= :today',
				$params     = array(
						':today' => date('Y-m-d', time()),
				)
		);
		
		$this->render('search',array( 'kTutorials'=>$tutorials,'courses'=>$courses, 'search_string'=>$search_string));
	}
	
	
	/**
	 * Displays the contact page
	 */
	public function actionFindUs()
	{
	
		$this->layout='//layouts/column3';
		
		
		
		
		$this->render('findus',array());
	}
	


	
	
	

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		
		$this->layout='//layouts/column3';
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		
		$this->promotionItems = SalePromotion::model()->findAllByAttributes(
				array(),
				$condition  = 'END_DATE >= :today AND START_DATE <= :today',
				$params     = array(
						':today' => date('Y-m-d', time()),
				)
		);
		
		
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		
		$this->layout='//layouts/column3';
		
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
	
	
	/**
	 * Retrives a particular methodology model
	 */
	public function actionMethodology($id)
	{
	
		$this->layout='//layouts/column3';
		// display the login form
		$criteria = new CDbCriteria;
		$criteria->addCondition('PARENT_ID IS NULL', 'AND');
		$criteria->addCondition('STATUS = 1');
		$criteria->order = 'RANK DESC';
		
			$tmpMethodology = Methodology::model()->findByPk($id);
			
			$methodologies = Methodology::model()->findAll($criteria);
			
			if($tmpMethodology===null  ||  !$tmpMethodology->STATUS  ||  $tmpMethodology->PARENT_ID )
				throw new CHttpException(404,'The requested page does not exist.');
			
			$defaultMethodology = $tmpMethodology;
						
			$childs = $defaultMethodology->methodologies;
			
		
		$this->promotionItems = SalePromotion::model()->findAllByAttributes(
				array(),
				$condition  = 'END_DATE >= :today AND START_DATE <= :today',
				$params     = array(
						':today' => date('Y-m-d', time()),
				)
		);
		
		
		$this->render('methodologyIndex',array('methodologies'=>$methodologies, 'defaultMethodology'=>$defaultMethodology, 'childs'=>$childs));
		
	}
	
	
	/**
	 * Retrives a particular methodology model
	 */
	public function actionTopMethodology()
	{
	
		$this->layout='//layouts/column3';
		// display the login form
		$criteria = new CDbCriteria;
		$criteria->addCondition('PARENT_ID IS NULL', 'AND');
		$criteria->addCondition('STATUS = 1');
		$criteria->order = 'RANK DESC';
	
	
	
			$methodologies = Methodology::model()->findAll($criteria);
				
			if (isset($methodologies[0])){
	
				$defaultMethodology = $methodologies[0];
	
				$childs =  $defaultMethodology->methodologies;
	
			}else{
				
				$defaultMethodology = null;
				
				$childs =  null;
				
				
			}
				
	
		$this->promotionItems = SalePromotion::model()->findAllByAttributes(
				array(),
				$condition  = 'END_DATE >= :today AND START_DATE <= :today',
				$params     = array(
						':today' => date('Y-m-d', time()),
				)
		);
	
	
		$this->render('methodologyIndex',array('methodologies'=>$methodologies, 'defaultMethodology'=>$defaultMethodology, 'childs'=>$childs));
	
	}
	
	

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	
	
	
	public function getChildren($parent, $level=0) {
		
		$courses = array();
		
		$courses = MentoringHyerarchy::model()->findAllByAttributes(array('PARENT_ID'=>$parent));
		
		$courseMenu = array();
		
		foreach ($courses as $course){
			
			$courseMenu[$course->ID]['NAME'] = $course->NAME;
			$courseMenu[$course->ID]['VALUES'] = $this->getChildren($course->ID);
			
		}
		
	
		
		
		return $courseMenu;
		/*
		$criteria = new CDbCriteria;
		$criteria->condition='parent_id=:id';
		$criteria->params=array(':id'=>$parent);
		$model = $this->findAll($criteria);
		foreach ($model as $key) {
			//echo str_repeat(' — ', $level) . $key->name . "<br />";
			$this->getChildren($key->id, $level+1);
		}*/
	}
	
	

	
	/**
	 * Gets the first child of the parent hierarchy
	 * @param number $parent
	 * @param number $level
	 * @return unknown
	 */
	public function getFirstChild($parent, $uri,$level=0) {
	
		$childs = array();
	
		$childs = MentoringHyerarchy::model()->findAllByAttributes(array('PARENT_ID'=>$parent));
	
		$items = array();

		
		foreach ($childs as $child){
				
			
			$tech = MentUrl::getStandarPathString($child->NAME,'sub categoría');
			
			$category = MentUrl::getStandarPathString($child->pARENT->NAME,'categoría');

			$items[] = array('label'=>$child->NAME, 'url'=>array($uri,'id'=>$child->ID,  'tech'=>$tech) );
			
				
		}
	
		return $items;
		
	}
	
	

	/**
	 * Gets the first child of parent hierarchy
	 * @param number $parent
	 * @param number $level
	 * @return unknown
	 */
	public function getTutorials($parent, $level=0) {
	
		$childs = array();
	
		$childs = MentoringHyerarchy::model()->findAllByAttributes(array('PARENT_ID'=>$parent));
	
		$items = array();
	
		foreach ($childs as $child){
	
			$items[] = array('label'=>$child->NAME, 'url'=>array('site/courseIndex','id'=>$child->ID));
				
	
		}
	
		return $items;
	
	}
	
	
	
	
}