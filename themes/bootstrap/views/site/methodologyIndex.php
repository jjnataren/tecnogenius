<?php 
Yii::app()->clientScript->registerScriptFile(
        Yii::app()->baseUrl . '/js/jquery.plugin.js',
	CClientScript::POS_END
	);
Yii::app()->clientScript->registerScriptFile(
Yii::app()->baseUrl . '/js/jquery.imagecube.js',
CClientScript::POS_END
);


$cs = Yii::app()->getClientScript();
$cs->registerScript(
		'cube01',
		'var greetings = "Hello" + " " + "World"; 
	$("#defaultCube").imagecube({direction: "right", repeat: false});
	$("#defaultCube").imagecube({speed: 1000});
',
		CClientScript::POS_END
);
?>
<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form TbActiveForm */

$this->pageTitle=Yii::app()->name . ' Metodología';
$this->breadcrumbs=array(
	'Metodología',	
);



?>

<div class="row">
<div class="col-xs-12 col-sm-12 col-md-6" >
		
			<?php echo isset($defaultMethodology)?
  			'<h2><span class="glyphicon glyphicon-certificate"></span>&nbsp;'.$defaultMethodology->NAME.'.&nbsp;<small>'.$methodologies[0]->DESCRIPTION.'</small></h2>'
				: 'No hay  información relacionada'; ?>
		
	</div>
	<div class="col-xs-10 col-sm-10 col-md-4" >
		<ul class="pagination pagination-sm">
	
	
		
		<?php $i=0;  if (isset($childs))  foreach ($childs as $methodology){?>
  			 <li id="list_<?php echo $methodology->ID; ?>" <?php echo (!($i))? 'class="disabled"': '' ;?>>
  			 	<a href="#" rank="<?php echo $i++;?>" id="_link<?php echo $methodology->ID;?>" ><small><?php echo strtoupper($methodology->ALIAS);?></small></a>
  			 </li>
  			 
  			<?php 
  			
  			$cs2 = Yii::app()->getClientScript();
  			$cs2->registerScript(
  					'cubeMotion'.$methodology->ID,
  					'	
						$("#_link'.$methodology->ID.'").click(function() { 
							    var cube = $("#defaultCube"); 
								
							    var next = parseInt($(this).attr("rank"), 10); 

							    cube.imagecube("option", {direction: "right"}). 
							        imagecube("rotate", next, function() { 
							            
							        });
									
									$("[id^='.'list_'.']").attr("class","");
						 			$("#list_'.$methodology->ID.'").attr("class","disabled"); 
							});
					',
  					CClientScript::POS_END
  			);
  			
  			?> 
		 <?php }?>	 
		</ul>
	</div>

<?php if(isset($methodologies) &&  count($methodologies)){?>	
<div class="col-xs-2 col-sm-2 col-md-2" >
	<ul class="nav nav-pills">
  <li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
     <small>OTRAS</small> <span class="caret"></span>
    </a>
    <ul class="dropdown-menu" role="menu">
    
    <?php foreach ($methodologies as $item){   ?>
     	
     	<?php if($item->ID <> $defaultMethodology->ID ) {?>
     	<li><a href="<?php echo Yii::app()->createUrl('site/topMethodology'); ?>">
     		<small><?php echo $item->NAME; ?></small>
     		</a>
     	</li>
       <?php }?>
     <?php }?>
    </ul>
  </li>
</ul>
</div>
<?php }?>
</div>

<div class="col-xs-12 col-md-12 col-md-12">

 <div id="defaultCube" style="height: 400px;" >
 		<?php $i=0;  if (isset($childs))  foreach ($childs as $methodology){
 		
 			    $documents = $methodology->documentMethodologies;
 			    
 			    $path = (isset($documents[0]))? $documents[0]->PATH : '/uploads/default/defaultFile.png';
 			?>
				 		
  			<img  title="<?php echo $methodology->ALIAS;?>" alt="<?php echo $methodology->DESCRIPTION;?>" 
  					src="<?php echo Yii::app()->baseUrl.$path ?>" >
  			
  				 
  		<?php }?>	 
	
</div>

</div>

<div class="row">
<div class="col-xs-12 col-md-12 col-md-12">
<div class="media">

  <div class="media-body">
  <br />
    <h3 class="media-heading">
    <?php if (isset($defaultMethodology)){ ?>
    
    <?php echo $defaultMethodology->NAME;?></h3>
  	<?php echo $defaultMethodology->RESUME;?>
  	
  	<?php foreach ($childs as $methodology){ ?>
	  	
	  	<div class="media">
	          <a href="#" class="pull-left">
	            <span class="glyphicon glyphicon-ok-sign"></span>
	          </a>
	          <div class="media-body">
	            <h4 class="media-heading"><?php echo $methodology->NAME; ?></h4>
	            <?php echo $methodology->RESUME; ?>
	          </div>
	     </div>
     
     <?php }?>
    <?php }?> 
  </div>
</div>
</div>
</div>
