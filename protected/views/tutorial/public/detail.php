

<style>
<!--
.no-border {
	border: 0px solid #ddd;    
}
-->
</style> 	


		<?php 
		
		
		$tutoName = MentUrl::getStandarPathString($model->NAME,'tutorial');
		$tech = MentUrl::getStandarPathString($model->hIERARCHY->pARENT->NAME,'tecnologia');
				
		$url =  Yii::app()->createUrl("tutorial/detail", array("id"=>$model->ID,'name'=>$tutoName,'tech'=>$tech) );
		
		
		?>		
   	
   	   <?php Yii::app()->facebook->ogTags['og:site_name'] = 'Nukleus'?>
	   <?php Yii::app()->facebook->ogTags['og:title'] = $model->NAME; ?>
	   <?php Yii::app()->facebook->ogTags['og:url'] = $url; ?> 
	   <?php Yii::app()->facebook->ogTags['og:description'] = $model->RESUME; ?>
	   <?php Yii::app()->facebook->ogTags['og:image'] = $model->getLogo(); ?>
	   <?php Yii::app()->facebook->ogTags['article:author'] = $model->AUTHOR; ?>
	   
	   <?php 
	   $tech = MentUrl::getStandarPathString($model->hIERARCHY->pARENT->NAME);
	   
	   ?>
	
<?php
$this->breadcrumbs = array (
		'Tutoriales' => array (
				'site/topTuto'
		),
		$model->hIERARCHY->pARENT->NAME => array (
				'site/tutoIndex',
				'id' => $model->hIERARCHY->pARENT->ID,
				'tech'=>$tech
				
		),
		$model->NAME 
);
?>





<div class="row">
	<div class="col-xs-12 col-sm-2 col-md-2">
		 <img src=<?php echo $model->getLogo(); ?>
			alt="<?php echo $model->ALIAS;?>" class="img-rounded"
			style="width: 124px; height: 104px;" />
	</div>
	<div class="col-xs-12 col-sm-8 col-md-7">
		<h1><?php echo $model->NAME;?> <br /> 
		<small><?php echo $model->AUTHOR;?>, 
  				<?php echo ''.DateTime::createFromFormat('Y-m-d', $model->PUBLISHED_DATE)->format('d/M/Y');?> </small>
		</h1>

		<p class="text text-info text-justify"><?php echo $model->RESUME;?></p>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-3">
			<!-- Table -->
			<table class="table table-condensed">
			<thead>
				<tr>
					<th >
						<span class="glyphicon glyphicon-download-alt"></span>
				
				
				&nbsp;
				Descargas <span class="badge"><?php $pDocuments = $model->publicDocuments;  echo count($pDocuments);?></span>
		
					</th>
				</tr>
			</thead>
			<?php foreach ($pDocuments as $document){?>
				<tr>
					<td>
					 <a class="list-group-item no-border"  target="_blank" href="<?php echo Yii::app( )->getBaseUrl( ).$document->PATH;?>">
					
						<?php  switch ($document->DOCUMENT_TYPE){ 
						
							case 3: //video
								echo "<span class='glyphicon glyphicon-film'></span>";
							break;

							case 4: //Proyecto IDE
								echo "<span class='glyphicon glyphicon-folder-open'></span>";
							break;

							case 5: //Enpaquetado
								echo "<span class='glyphicon glyphicon-compressed'></span>";
							break;

							case 6: //script
								echo "<span class='glyphicon glyphicon-file'></span>";
							break;
							
							case 7: //binario
								echo "<span class='glyphicon glyphicon-cog'></span>";
							break;
									
						}?>									
						<?php echo $document->NAME;?> <br />
						<small><?php echo $document->DESCRIPTION;?></small>
					</a>
					
					</td>
				</tr>				
			<?php }?>	
			</table>
		
	</div>

</div>

<hr />

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">

		<?php echo $model->CONTENT;?>
	
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
	
	<?php $this->widget('ext.yii-facebook-opengraph.plugins.Comments', array(
   		'href' =>Yii::app()->createAbsoluteUrl("tutorial/detail", array("id"=>$model->ID,'name'=>$tutoName,'tech'=>$tech) ), // if omitted Facebook will use the OG meta tag
   		'num_posts'=>10,
)); ?>	

	</div>
	
</div>