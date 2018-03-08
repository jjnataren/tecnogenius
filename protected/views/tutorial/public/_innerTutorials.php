<div class="row">

<div class="col-xs-12 col-sm-9 col-md-9">
	<div class="jumbotron">	
		<h2>
			<strong><?php echo  $model->NAME;?></strong>
		</h2>
		<p class="text text-justify">
			<?php echo $model->DESCRIPTION;?>
		</p>
	</div>
</div>

	<div  class="col-xs-12 col-sm-3 col-md-3"> 
	          <div class="list-group ">	  
	                 
	          <?php foreach ($branches as $branch){ 
	          
	          	$item_style = ($branch->ID === $model->ID)? 'list-group-item active': 'list-group-item';
	          	?>
	              	<?php echo CHtml::ajaxLink("<span class='glyphicon glyphicon-plus-sign'></span> ".$branch->NAME, Yii::app()->createUrl("tutorial/getByBranch", array("id"=>$branch->ID) ), 
	            											array("update"=>"#_wrapperDiv"), $htmlOptions=array ("id"=>"bt_".$branch->ID, 'class'=>$item_style) ); ?>
	            <?php }?>
	          </div>
	          
	        
	</div>

</div>

<div class="row">

<div class="col-xs-12 col-sm-12 col-md-12" id="_tutorialsDiv">
<?php $i=0; 

foreach ($tutorialsArray as $tutorials)
	foreach ($tutorials as $tutorial){ $i++;
	
	$tutoName = MentUrl::getStandarPathString($tutorial->NAME,'tutorial');
	$tech = MentUrl::getStandarPathString($tutorial->hIERARCHY->pARENT->NAME,'tecnologia');
	
	$url =  Yii::app()->createUrl("tutorial/detail", array("id"=>$tutorial->ID,'name'=>$tutoName,'tech'=>$tech) );
	
	?>


<div class="panel">
  <div class="panel-heading"><p class="text-muted"><small>Por: <strong> <?php echo $tutorial->AUTHOR;?> </strong> &nbsp; Categoría:  <strong><?php echo $tutorial->hIERARCHY->NAME;?></strong> &nbsp; Publicado: <strong><?php echo $tutorial->PUBLISHED_DATE;?></strong></small>   </p> </div>
  <div class="panel-body">
   
   <div class="media">
      <a href="#" class="pull-left">
        <img alt="<?php echo $tutorial->ALIAS;?>"  class="media-object img-thumbnail" style="width: 74px; height: 74px;" 
        src="<?php echo $tutorial->getLogo();?>" >
     </a>
      
      <div class="media-body">
      <a class="list-group-item no-border" href="<?php echo $url; ?>">
       		<h3 class="media-heading"><?php echo $tutorial->NAME;?></h3>
        	<p class="text text-justify">	<?php echo $tutorial->RESUME; ?> </p>
        </a>
      </div>
       
    </div>
   
  </div>
  <div class="panel-footer">
  <p class="text-right">
     
  <?php $this->widget('ext.yii-facebook-opengraph.plugins.LikeButton', array(
   'href' => $url, // if omitted Facebook will use the OG meta tag
   'layout'=>'button_count',
   'show_faces'=>true,
   'send' => true
)); ?>
  
   
	<!--   <a href="#"><small>Me gusta <span class="badge">78</span></small></a>
	   &nbsp; <a href="#"><small>Comentarios <span class="badge">10</span></small></a>
	   
	    -->
  </p>
  </div>
</div>

<?php }?>


<?php

if(!$i){	
	echo 'No hay tutoriales en esta categoría.';
}


?>

</div>


</div>