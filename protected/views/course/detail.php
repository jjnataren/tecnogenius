<style>      
td.highlight {border: none !important;padding: 1px 0 1px 1px !important;background: none !important;overflow:hidden;}
td.highlight a {background: #99dd73 url(bg.png) 50% 50% repeat-x !important;  border: 1px #88a276 solid !important;}
</style>


	<?php 
	
	$tutoName = MentUrl::getStandarPathString($model->NAME,'curso');
	$tech = MentUrl::getStandarPathString($model->hIERARCHY->pARENT->NAME,'tecnologia');
	
	$url =  Yii::app()->createUrl("course/detail", array("id"=>$model->ID,'name'=>$tutoName,'tech'=>$tech) );
	
	
	?>

	<?php Yii::app()->clientScript->registerCssFile(Yii::app()->createAbsoluteUrl('').'/css/jqueryui/overcast/jquery-ui.css'); ?>

   <?php Yii::app()->facebook->ogTags['og:site_name'] = 'Nukleus'?>
   <?php Yii::app()->facebook->ogTags['og:title'] = $model->NAME; ?>
   <?php Yii::app()->facebook->ogTags['og:url'] = $url; ?> 
   <?php Yii::app()->facebook->ogTags['og:description'] = $model->RESUME; ?>
   <?php Yii::app()->facebook->ogTags['og:image'] = $model->getLogo(); ?>
   <?php Yii::app()->facebook->ogTags['article:author'] = 'Nukleus' ?>
   
   


<?php


$tech = MentUrl::getStandarPathString($model->hIERARCHY->pARENT->NAME,'tecnologia');

$this->pageTitle=Yii::app()->name.' Cursos';

$this->breadcrumbs = array (
		'Cursos' => array (
				'site/topCourses',
			
		),
		$model->hIERARCHY->pARENT->NAME => array (
				'site/courseIndex',
				'id' => $model->hIERARCHY->pARENT->ID,
				'tech'=>$tech
		),
		$model->NAME 
);

$this->menu=array(
		array('label'=>'<span class="glyphicon glyphicon-usd"></span>&nbsp;Precios desde <strong>'.$model->PUBLISHED_PRICE.' m.n.</strong>','url'=>array('detail', 'id'=>$model->ID)),
		array('label'=>'<span class="glyphicon glyphicon-calendar"></span>&nbsp;Fechas','url'=>array('detail', 'id'=>$model->ID)),
		array('label'=>''),
);

?>

<?php 

$this->dateDetailsMenu = array();

foreach ($model->products as $product){
	
	$this->dateDetailsMenu [] = $product->START_DATE;

}


?>

<?php $this->widget('bootstrap.widgets.TbAlert', array(
		'block'=>false, // display a larger alert block?
		'fade'=>true, // use transitions?
		'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
));?>


<div class="jumbotron">
<div class="col-md-3 col-xs-12 col-sm-12">
<img src=<?php echo $model->getLogo(); ?>
			alt="<?php echo $model->ALIAS;?>" class="img-rounded"
			style="width: 144px; height: 124px;">
</div>

    <h1>
	        
    	<strong><?php echo $model->NAME;?></strong>
    </h1>
	  	
	           		<p class="text-justify"><?php echo $model->RESUME;?></p>
					<p class="text-center">
						<button class="btn btn-primary" data-toggle="modal"
							data-target="#myModal">Inscribirme</button>
				
					</p>
     
   
</div> 

<div class="bs-example">
	<div class="media">
		<a href="#" class="pull-left"> <span
			class="glyphicon glyphicon-bookmark"></span>
		</a>
		<div class="media-body">
			<h4 class="media-heading">Duración</h4>
			<?php echo $model->DESCRIPTION;?>
		</div>
	</div>
	<div class="media">
		<a href="#" class="pull-left"> <span
			class="glyphicon glyphicon-bookmark"></span>
		</a>
		<div class="media-body">
			<h4 class="media-heading">Temario</h4>
			<?php echo $model->CONTENT;?>
			<!-- <div class="media">
				<a href="#" class="pull-left"> <span
					class="glyphicon glyphicon-th-list"></span>
				</a>
				<div class="media-body">
					<h4 class="media-heading">Objetivos</h4>
					<?php echo $model->CONTENT;?>
				</div> -->
		</div>
	</div>
</div>


<div class="row">
	<div class="hidden-xs col-sm-12 col-md-1">
	</div>
	<div class="col-xs-12 col-sm-12 col-md-11">
	<hr />
	
	<p class="text text-muted">
							<small>Todos los materiales presentados son propiedad de
								Nukleus.</small>
	</p>
	


	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Formulario de inscripción</h4>
			</div>
			<div class="modal-body">
				
				<?php echo $this->renderPartial('../registration/_form', array('model'=>$model)); ?>
				
			
			</div>
			<div class="modal-footer">
				
					<p class="text-primary">Por favor completa los siguientes campos para
					inscribirte al curso y enseguida nos pondremos en contacto.</p>
			
			
			</div>
		</div>
	</div>
</div>