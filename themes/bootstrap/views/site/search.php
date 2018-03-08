
<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form TbActiveForm */

$this->pageTitle=Yii::app()->name . ' - Buscar';
$this->breadcrumbs=array(
	'Buscar',
);
?>

	<div class="col-md-12 col-xs-12 col-sm-12">
	
		
		<div class="page-header">
  			<h1><span class="glyphicon glyphicon-search"></span> Resultados <small>Se han encontrado <strong><?php echo count($kTutorials) + count($courses);?></strong> coincidencias con "<?php echo $search_string;?>".</small></h1>
		</div>
		
		
		<table class="table table-striped">
			<tbody>
				<?php $i=0; foreach ($kTutorials as $kTutorial){
					$tutorial = $kTutorial->tUTORIAL;
					
					
					$tutoName = MentUrl::getStandarPathString($tutorial->NAME,'tutorial');
					$tech = MentUrl::getStandarPathString($tutorial->hIERARCHY->pARENT->NAME,'tecnologia');
					$url =  Yii::app()->createUrl("tutorial/detail", array("id"=>$tutorial->ID,'name'=>$tutoName,'tech'=>$tech) );
						
					
					?>
			<tr>
				<td>
					
					 <h3><span class="glyphicon glyphicon-book"></span> &nbsp;<a href="<?php echo  $url; ?>"><?php echo $tutorial->NAME;	?></a></h3>
					 <p class="text-justify">
					<?php echo $tutorial->RESUME; ?>					
					</p>
					<p class="text text-muted">
						<small>
							<span class="glyphicon glyphicon-hand-right"></span> Categoría: <a href="<?php echo  Yii::app()->createUrl("site/topTuto"); ?>"><?php echo $tutorial->hIERARCHY->NAME;?></a>
						</small> 
					</p>
				</td>
			</tr>	
				
				<?php $i++;}?>
			
			<?php if (!$i){?>
			<tr>
				<td>
					<strong>¿No encontraste lo que buscabas?</strong> Contáctanos  <a href="<?php echo  Yii::app()->createUrl("site/contact");?>"> aquí  <span class="glyphicon glyphicon-thumbs-up"></span></a> y te ayudamos. 
				
				</td>
			</tr>	
			<?php }?>	
			</tbody>			
	</table>
	
	</div>
