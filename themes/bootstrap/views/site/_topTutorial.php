<style>
<!--
.no-border {
	border: 0px solid #ddd;    
}
-->
</style>

<?php 
$this->breadcrumbs=array(
	'Top tutoriales',	
	
);

?>

<a name="main"></a>


<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
	
	          <div class="jumbotron">
	          <div class="container">
	            <h1>TOP tutoriales </h1>
	            <p>Los mejores tutoriales para TI, muy claros, practicos  y 100% funcionales.</p>
	            </div>
	          </div>
	          
	</div>          
         
</div>

<div class="row">
 <div class="col-xs-12 col-sm-12 col-md-12">
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
  </p> </div>
  <div class="panel-body">
   
   <div class="media">
      <a href="<?php echo  $url; ?>" class="pull-left">
        <img alt="<?php echo $tutorial->ALIAS;?>"  class="media-object img-thumbnail" style="width: 74px; height: 74px;" 
        src="<?php echo $tutorial->getLogo();?>" >
     </a>
      
      <div class="media-body">
      <a class="list-group-item no-border" href="<?php echo  $url; ?>">
       		<h3 class="media-heading"><?php echo $tutorial->NAME;?></h3>
        	<p class="text text-justify">	<?php echo $tutorial->RESUME; ?> </p>
        	
     
        	
        </a>
      </div>
       
    </div>
   
  </div>
  <div class="panel-footer">
  <p class="text-right">
     
  <?php $this->widget('ext.yii-facebook-opengraph.plugins.LikeButton', array(
   'href' => Yii::app()->createAbsoluteUrl("tutorial/detail", array("id"=>$tutorial->ID,'name'=>$tutoName,'tech'=>$tech) ), // if omitted Facebook will use the OG meta tag
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



<?php }

if(!$i){
	
echo 'No hay tutoriales en esta categoría.';

}

?>

</div>


</div>



<script type="text/javascript">
$(document).ready(function () {
	  $('[data-toggle=offcanvas]').click(function () {

		    $('.row-offcanvas').toggleClass('active')
	  });
	});
</script>


