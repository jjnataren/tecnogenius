<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form TbActiveForm */

$this->pageTitle=Yii::app()->name . ' Cursos';
$this->breadcrumbs=array(
	'Cursos',	
);


$this->menu=array(
		array('label'=>'<span class="glyphicon glyphicon-usd"></span>&nbsp;Precios','url'=>array('index')),
		array('label'=>'<span class="glyphicon glyphicon-calendar"></span>&nbsp;Horarios','url'=>array('index')),
		array('label'=>'<span class=" glyphicon glyphicon-credit-card"></span>&nbsp;Ofertas','url'=>array('index')),
		

);
?>


  
  <?php $this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>$menu_items,
    
)); ?>  
    
    

    <?php 
    switch ($parentTopic) {
    case 0:
       	echo $this->renderPartial('_courseIndex', array('model'=>$model));
        break;
    default:
        echo $this->renderPartial('_parentHierarchy', array('model'=>$model));
        break;
      
        
	}

?>
 
    

     