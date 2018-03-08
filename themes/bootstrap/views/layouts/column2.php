<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main_app'); ?>
<div class="row-fluid">

<div class="span2">


<ul class="nav nav-pills nav-stacked">

<li class="active">
        <a href=<?php echo Yii::app()->createUrl('admin/index', array())?> data-toggle="dropdown" class="dropdown-toggle">
         &nbsp;Inicio
        </a>
        
 </li>       

  		<li class="dropdown">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
         <span class="glyphicon glyphicon-file"></span>&nbsp;Cursos <span class="caret"></span>
        </a>
        <ul role="menu" class="dropdown-menu">
          <li><a href=<?php echo Yii::app()->createUrl('course/admin', array())?>>Administración</a></li>
          <li><a href=<?php echo Yii::app()->createUrl('course/create', array())?>>Crear nuevo</a></li>
          <li><a href="#">Publicar</a></li>
          <li class="divider"></li>
          <li><a href="#">Separated link</a></li>
        </ul>
      </li>
      
   	<li class="dropdown">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
         <span class="glyphicon glyphicon-indent-left"></span>&nbsp;Jerarquías<span class="caret"></span>
        </a>
        <ul role="menu" class="dropdown-menu">
		  <li><a href=<?php echo Yii::app()->createUrl('mentoringHyerarchy/admin', array())?>>Administración</a></li>
          <li><a href=<?php echo Yii::app()->createUrl('mentoringHyerarchy/create', array())?>>Crear nuevo</a></li>
          
        </ul>
      </li>
      
      <li class="dropdown">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
         <span class=" glyphicon glyphicon-indent-right"></span>&nbsp;Niveles<span class="caret"></span>
        </a>
        <ul role="menu" class="dropdown-menu">
		  <li><a href=<?php echo Yii::app()->createUrl('hierarchyLevel/admin', array())?>>Administración</a></li>
          <li><a href=<?php echo Yii::app()->createUrl('hierarchyLevel/create', array())?>>Crear nuevo</a></li>
          
        </ul>
      </li>
   
    <li class="dropdown">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
         <span class="glyphicon glyphicon-user"></span>&nbsp;Staff <span class="caret"></span>
        </a>
        <ul role="menu" class="dropdown-menu">
		  <li><a href=<?php echo Yii::app()->createUrl('staff/admin', array())?>>Administración</a></li>
          <li><a href=<?php echo Yii::app()->createUrl('staff/create', array())?>>Crear nuevo</a></li>
          
        </ul>
      </li>
  
</ul>

</div>

    <div class="span7">
        <div id="content">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
    
     <div class="span2">
       <div id="sidebar">
        <?php
            $this->beginWidget('zii.widgets.CPortlet', array(
                'title'=>'<h2>&nbsp;<span class="glyphicon glyphicon-info-config"></span>&nbsp;Opciones</h2>',
            	 'htmlOptions'=>array('class'=>'panel panel-info'),
            ));
            $this->widget('bootstrap.widgets.TbMenu', array(
                'items'=>$this->menu,
				'encodeLabel' => false,
                'htmlOptions'=>array('class'=>'nav nav-pills nav-stacked'),
            ));
            $this->endWidget();
        ?>
        </div><!-- sidebar -->
    </div>
   
</div>
<?php $this->endContent(); ?>