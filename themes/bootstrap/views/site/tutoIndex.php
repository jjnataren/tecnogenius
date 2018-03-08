<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form TbActiveForm */

$this->pageTitle=Yii::app()->name . ' Tutoriales';
$this->breadcrumbs=array('Tutoriales');


?>
   
  <nav class="navbar navbar-inverse" style="background: #FFFFFF; border-color: #FFFFFF;"> 
	 <div class="navbar-header">
	      <button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target="#myNavbar" >
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        
	      </button>
					
		
			</div>	   
   
   <div class="collapse navbar-collapse" id="myNavbar">
			  <?php $this->widget('bootstrap.widgets.TbMenu', array(
			    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
			    'stacked'=>false, // whether this is a stacked menu
			    'items'=>$menu_items,
			    
			)); ?>  
			    
    
    </div>

</nav>
    <?php 
    
    switch ($parentTopic) {
    case 0:
       	echo $this->renderPartial('_topTutorial', array('tutorials'=>$tutorials));
        break;
    default:
        echo $this->renderPartial('_tutorial', array('model'=>$model, 'branchs'=>$branchs, 'tutorials'=>$tutorials));
        break;
      
        
	}

?>
 
    

     