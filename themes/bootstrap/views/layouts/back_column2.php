<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main_back'); 

	$currentUrl = Yii::app()->request->getUrl();

?>
<?php 	$newSubmitters = Registration::model()->count( 'status=:_status', array(':_status' => 1));?>
<div class="row">

<div class="col-md-2">

<div class="panel panel-default">
<ul class="nav nav-pills nav-stacked">

<li <?php echo (!strcmp($this->pageTitle,'Nukleus - Admin'))? "class='active'":'' ?> >
        <a href="<?php echo Yii::app()->createUrl('admin/index', array())?>">
         &nbsp;<h4>Inicio</h4>
        </a>
        
 </li>       

 
  <li class="<?= getActiveDropDown($currentUrl, 'registration')?>">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
         <span class="glyphicon glyphicon-comment"></span>&nbsp;Alumnos
         <span class="badge"><?php echo ($newSubmitters)? '*&nbsp;'.$newSubmitters: ''; ?></span>
         <span class="caret"></span>
        </a>
        <ul role="menu" class="dropdown-menu">
		  <li><a href=<?php echo Yii::app()->createUrl('registration/admin', array())?>>Administración</a></li>          
        </ul>
      </li>
 
  		<li class="<?= getActiveDropDown($currentUrl, 'course')?>">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
         <span class="glyphicon glyphicon-bookmark"></span>&nbsp;Cursos <span class="caret"></span>
        </a>
        <ul role="menu" class="dropdown-menu">
          <li><a href="<?php echo Yii::app()->createUrl('course/admin', array())?>">Administración</a></li>
          <li><a href="<?php echo Yii::app()->createUrl('course/create', array())?>">Crear nuevo</a></li>
          
          
        </ul>
      </li>
      
            
   <li class="<?= getActiveDropDown($currentUrl, 'tutorial')?>">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
         <span class="glyphicon glyphicon-book"></span>&nbsp;Tutoriales<span class="caret"></span>
        </a>
        <ul role="menu" class="dropdown-menu">
		  <li><a href=<?php echo Yii::app()->createUrl('tutorial/admin', array())?>>Administración</a></li>
          <li><a href=<?php echo Yii::app()->createUrl('tutorial/create', array())?>>Crear nuevo</a></li>          
        </ul>
      </li>
      
   	<li  class="<?= getActiveDropDown($currentUrl, 'mentoringHyerarchy')?>"  >
        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
         <span class="glyphicon glyphicon-align-justify"></span>&nbsp;Organización<span class="caret"></span>
        </a>
        <ul role="menu" class="dropdown-menu">
		  <li><a href=<?php echo Yii::app()->createUrl('mentoringHyerarchy/admin', array())?>>Administración</a></li>
          <li><a href=<?php echo Yii::app()->createUrl('mentoringHyerarchy/create', array())?>>Crear nuevo</a></li>
          
        </ul>
      </li>
      
      <li class="<?= getActiveDropDown($currentUrl, 'hierarchyLevel')?>">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
         <span class="glyphicon glyphicon-align-center"></span>&nbsp;Jerarquía<span class="caret"></span>
        </a>
        <ul role="menu" class="dropdown-menu">
		  <li><a href=<?php echo Yii::app()->createUrl('hierarchyLevel/admin', array())?>>Administración</a></li>
          <li><a href=<?php echo Yii::app()->createUrl('hierarchyLevel/create', array())?>>Crear nuevo</a></li>
          
        </ul>
      </li>
      
      <li class="<?= getActiveDropDown($currentUrl, 'product')?>">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
         <span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Productos<span class="caret"></span>
        </a>
        <ul role="menu" class="dropdown-menu">
		  <li><a href=<?php echo Yii::app()->createUrl('product/admin', array())?>>Administración</a></li>
          <li><a href=<?php echo Yii::app()->createUrl('product/create', array())?>>Crear nuevo</a></li>
          
        </ul>
      </li>
   
     <li class="<?= getActiveDropDown($currentUrl, 'staff')?>">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
         <span class="glyphicon glyphicon-tower"></span>&nbsp;Staff <span class="caret"></span>
        </a>
        <ul role="menu" class="dropdown-menu">
		  <li><a href=<?php echo Yii::app()->createUrl('staff/admin', array())?>>Administración</a></li>
          <li><a href=<?php echo Yii::app()->createUrl('staff/create', array())?>>Crear nuevo</a></li>
          
        </ul>
      </li>
  
  
   <li class="<?= getActiveDropDown($currentUrl, 'salePromotion')?>">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
         <span class="glyphicon glyphicon-tags"></span>&nbsp;Promociones <span class="caret"></span>
        </a>
        <ul role="menu" class="dropdown-menu">
		  <li><a href=<?php echo Yii::app()->createUrl('salePromotion/admin', array())?>>Administración</a></li>
          <li><a href=<?php echo Yii::app()->createUrl('salePromotion/create', array())?>>Crear nuevo</a></li>
          
        </ul>
      </li>
      
<li class="<?= getActiveDropDown($currentUrl, 'customer/')?>">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
         <span class="glyphicon glyphicon-user"></span>&nbsp;Clientes<span class="caret"></span>
        </a>
        <ul role="menu" class="dropdown-menu">
		  <li><a href=<?php echo Yii::app()->createUrl('customer/admin', array())?>>Administración</a></li>
          <li><a href=<?php echo Yii::app()->createUrl('customer/create', array())?>>Crear nuevo</a></li>          
        </ul>
      </li>
      
      <li class="<?= getActiveDropDown($currentUrl, 'customerPurchase')?>">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
         <span class=" glyphicon glyphicon-pushpin"></span>&nbsp;Ordenes compra<span class="caret"></span>
        </a>
        <ul role="menu" class="dropdown-menu">
		  <li><a href=<?php echo Yii::app()->createUrl('customerPurchase/admin', array())?>>Administración</a></li>
          <li><a href=<?php echo Yii::app()->createUrl('customerPurchase/create', array())?>>Crear nuevo</a></li>          
        </ul>
      </li>

      
   <li class="<?= getActiveDropDown($currentUrl, 'methodology')?>">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
         <span class="glyphicon glyphicon-road"></span>&nbsp;Metodología<span class="caret"></span>
        </a>
        <ul role="menu" class="dropdown-menu">
		  <li><a href=<?php echo Yii::app()->createUrl('methodology/admin', array())?>>Administración</a></li>
          <li><a href=<?php echo Yii::app()->createUrl('methodology/create', array())?>>Crear nuevo</a></li>          
        </ul>
      </li>
      
      
       <li class="<?= getActiveDropDown($currentUrl, 'arousel')?>">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
         <span class="glyphicon glyphicon-play-circle"></span>&nbsp;Carrusel<span class="caret"></span>
        </a>
        <ul role="menu" class="dropdown-menu">
		  <li><a href=<?php echo Yii::app()->createUrl('carousel/admin', array())?>>Administración</a></li>
          <li><a href=<?php echo Yii::app()->createUrl('carousel/create', array())?>>Crear nuevo</a></li>          
        </ul>
      </li>
      
      
      
      
</ul>
</div>
</div>

    <div class="col-md-8">
        <div id="content">
        <div class  = "panel">
            <?php echo $content; ?>
            </div>
        </div><!-- content -->
    </div>
    
     <div class="col-md-2">
       <div id="sidebar">
        <?php
            $this->beginWidget('zii.widgets.CPortlet', array(
                'title'=>'<h3>&nbsp;<span class="glyphicon glyphicon-cog"></span>&nbsp;Opciones</h3>',
            	 'htmlOptions'=>array('class'=>'panel panel-primary'),
            ));
            $this->widget('bootstrap.widgets.TbMenu', array(
                'items'=>$this->menu,
				'encodeLabel' => false,
                'htmlOptions'=>array('class'=>'nav nav-pills nav-stacked'),
            ));
            $this->endWidget();
        ?>
        </div><!-- sidebar -->
        
         <div id="sidebar">
        <?php
            $this->beginWidget('zii.widgets.CPortlet', array(
                'title'=>'<h3>&nbsp;<span class="glyphicon glyphicon-info-sign"></span>&nbsp;Ayuda</h3>',
            	 'htmlOptions'=>array('class'=>'panel panel-info'),
            ));
            
            
            if(isset($this->help)){
            
            	foreach ($this->help  as  $helpContent){            		
            		?>
            		
            		<div class="panel-body">
            		
            		<h4><?=$helpContent['label']; ?></h4>
            		
            		<small><?=  $helpContent['content']; ?></small>
            		
            		</div>
            		
            		<?php             		
            	}
            	
            	/*$this->widget('zii.widgets.CPortlet', array(
            			'items'=>$this->help,
            			'encodeLabel' => false,
            			'htmlOptions'=>array('class'=>'nav nav-pills nav-stacked'),
            	));*/
            	
            	
            } 
            
          
            $this->endWidget();
        ?>
        </div><!-- sidebar -->
        
    </div>
   
</div>
<?php $this->endContent(); ?>



<?php 


function getActiveDropDown($str,$compare_to){
	
	return strpos($str,$compare_to)? 'dropdown active':'dropdown';
	
}

?>