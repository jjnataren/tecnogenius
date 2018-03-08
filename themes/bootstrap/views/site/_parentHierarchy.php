<?php 
$this->breadcrumbs=array(
	'Cursos'=>array('site/topCourses', ),
		$model->NAME,
);

?>

<br />
<div class="jumbotron">
<div class="container">
	<h1>
		<?php echo  $model->NAME;?>
	</h1>
	<p>
		<?php echo $model->DESCRIPTION;?>
	</p>
	</div>
</div>


<?php 


$i = 0;
foreach ($model->mentoringHyerarchies as $mentoringHierarchy){
$i++;

foreach ($mentoringHierarchy->courses as $course){
	
	

	$tech = MentUrl::getStandarPathString($course->hIERARCHY->pARENT->NAME,'tecnología');
	
	$name = MentUrl::getStandarPathString($course->ALIAS,'curso');
	
	$url =   Yii::app()->createUrl('course/detail', array('tech'=>$tech,'id'=>$course->ID,'name'=>$name));
	
?>


<div class="col-sm-6 col-md-4">
	<div class="thumbnail">
	
	<a href="<?php echo $url;?>">
		<img  alt="image"
			style="width: 120px; height: 120px;"
			src="<?php echo $course->getLogo(); ?>" class="img-rounded"/>
	</a>		
			
		<div class="caption" style="height: 235px;">
			<h3><?php echo $course->ALIAS; ?></h3>
			<p class="text text-justify"><?php 
			
			$lenghtResume = strlen($course->RESUME);
			
			if ($lenghtResume > 150){
			
				echo  substr($course->RESUME, 0, 150).'...'; ?>
				
				<a href="<?php echo $url;?>">
					<small>&nbsp;leer mas</small>
				</a>
				
			<?php 	
			
			}else			
				echo $course->RESUME; 
					 
			?>
			
			
			</p>
		</div>
		<div class="caption">
		<p class="text-center">
			 
				<a href="<?php echo $url;?>" class="btn btn-primary" role="button">Ver detalles</a>
		</p>
		</div>
	</div>
</div>

<?php }

}?>

<?php 

if(!$i){
	
echo 'No hay cursos en esta categoría.';

}

?>