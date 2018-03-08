<style>
<!--
.no-border {
	border: 0px solid #ddd;    
}
-->
</style>

<?php 
$this->breadcrumbs=array(
	'Top tutoriales'=>array('site/topTuto', '#'=>'main'),
	$model->NAME,
	
);

?>
<a name="main"></a>

<div id="_wrapperDiv">

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
	<div class="jumbotron">	
		<h1>
			<?php echo  $model->NAME;?>
		</h1>
		<p class="text text-justify">
			<?php echo $model->DESCRIPTION;?>
		</p>
	</div>
</div>

	
</div>

<div class="row">

<div class="col-xs-12 col-sm-12 col-md-12" id="_tutorialsDiv">
<?php $i=0; foreach ($tutorials as $tutorial){ $i++;

$tutoName = MentUrl::getStandarPathString($tutorial->NAME,'tutorial');
$tech = MentUrl::getStandarPathString($tutorial->hIERARCHY->pARENT->NAME,'tecnologia');
$url =  Yii::app()->createUrl("tutorial/detail", array("id"=>$tutorial->ID,'name'=>$tutoName,'tech'=>$tech) );

?>


<div class="panel">
  <div class="panel-heading">
  	 <p class="text-muted">
  	 <small><span class="glyphicon glyphicon-user"></span>&nbsp;
	  Por: <strong> <?php echo $tutorial->AUTHOR;?> </strong> 
	  &nbsp;&nbsp;<span class="glyphicon glyphicon-star-empty"></span> Categoría:  
	  <strong><?php echo $tutorial->hIERARCHY->NAME;?></strong>
	  &nbsp;&nbsp;<span class="glyphicon glyphicon-calendar"></span> 
	  Publicado: <strong><?php echo ''.DateTime::createFromFormat('Y-m-d', $tutorial->PUBLISHED_DATE)->format('d/M/Y');?></strong>
	  </small>  
	  </p> 
  </div>
  <div class="panel-body">
   
   <div class="col-md-1 col-xs-12">
      <a href="<?php echo  $url; ?>" class="">
        <img alt="<?php echo $tutorial->ALIAS;?>"  class="media-object img-thumbnail" style="width: 74px; height: 74px;" 
        src="<?php echo $tutorial->getLogo();?>" >
     </a>
      </div>
   
   <div class="col-md-11 col-xs-12">
      
      
      <a class="list-group-item no-border" href="<?php echo $url;?>">
       		<h2 class="media-heading"><?php echo $tutorial->NAME;?></h2>
        	<p class="text text-justify">	<?php echo $tutorial->RESUME; ?> </p>
        </a>
       
    </div>
   
  </div>
  <div class="panel-footer">
  <p class="text-right">
     
  <?php $this->widget('ext.yii-facebook-opengraph.plugins.LikeButton', array(
   'href' =>  Yii::app()->createUrl("tutorial/detail", array("id"=>$tutorial->ID,'name'=>$tutoName,'tech'=>$tech) ), // if omitted Facebook will use the OG meta tag
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
</div>

