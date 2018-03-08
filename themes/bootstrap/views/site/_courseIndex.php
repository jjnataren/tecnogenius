<br />
<div class="jumbotron">
<div class="container">

	<h1>
		Cursos mas impartidos
	</h1>
	
	
	<p>
		Los cursos más impartidos.<br />
		¡Inscríbete ahora y vuélvete un experto en estas tecnologías!				
	</p>
	</div>
</div>


<!--
<div class="jumbotron">
<h1>JAVA</h1>
<p>La aplicación de Java es muy amplia. El lenguaje se utiliza en una gran variedad de dispositivos móviles, como teléfonos y pequeños electrodomésticos. Dentro del ámbito de Internet, Java permite desarrollar pequeñas aplicaciones (conocidas con el nombre de applets) que se incrustan en el código HTML de una página.</p>
<p><a class="btn btn-primary btn-lg" role="button">Inscribirme</a></p>
</div>
-->

<?php foreach ($model as $course){
	
	
	$tech = MentUrl::getStandarPathString($course->hIERARCHY->pARENT->NAME,'tecnología');
	
	$name = MentUrl::getStandarPathString($course->ALIAS,'curso');

	$url =   Yii::app()->createUrl('course/detail', array('tech'=>$tech,'id'=>$course->ID,'name'=>$name));
	
	?>


<div class="col-sm-6 col-md-4">
	<div class="thumbnail">
	<a href="<?php echo $url;?>">
		<img alt="image"
			style="width: 120px; height: 120px;"
			src="<?php echo $course->getLogo();  ?>"  class="img-rounded">
	</a>		
		<div class="caption" style="height: 235px;">
			<h3><?php echo $course->ALIAS; ?></h3>
			<p class="text text-justify"><?php 
			
			$lenghtResume = strlen($course->RESUME);
			
			if ($lenghtResume > 150){
			
				echo  substr($course->RESUME, 0, 150).'...'; ?>
				
				<a href="<?php echo  $url;?>">
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
				<a class="btn btn-primary" role="button"   href="<?php  echo $url; ?>" class="btn btn-default" role="button">Ver detalles</a>
		</p>
		</div>
	</div>
</div>

<?php }?>


