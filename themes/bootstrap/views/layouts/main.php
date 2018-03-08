<html lang="es">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="language" content="es" />
<meta name="description" content="Centro de capacitacion en lenguajes de programacion, consultoria y desarrollo de software">
<meta content="" name="author">
<meta name="keywords"  content="cursos de java, curso java, cursos de flex, curso flex, cursos de base de datos, curso sql, cursos de as3, curso flash, cursos de php, curso php, cursos de jquery, curso jquery" />


<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<?php Yii::app()->bootstrap->register(); ?>

	<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->baseUrl; ?>/css/carousel.css" />

	
<meta content="width=device-width, initial-scale=1" name="viewport">

<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<!--[if IE 8]>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/respond.js"></script>
<![endif]-->
</head>

<!-- NAVBAR
================================================== -->
<body>


<nav role="navigation" class="navbar-fixed-top navbar-inverse" >
<div class="container-fluid">
<div class="row">

<div id="logo2" class="col-md-6 col-xs-2 col-sm-6" style="background-color: #000000; height: 100px;">
	<img alt="Nukleus"  class="featurette-image img-responsive" style="height: 100px;  float: right; clear: both;" src=<?php echo Yii::app()->request->baseUrl.'/images/site/nukleus_logo_resp.png'; ?>>
</div>
<div id="logo1" class="col-md-6 col-xs-2 col-sm-6" style="background-color: #000000; height: 100px;">
	<img alt="Nukleus "  class="featurette-image img-responsive" style="height: 100px; float: right; clear: both;" src=<?php echo Yii::app()->request->baseUrl.'/images/site/logo2.png'; ?>>
</div>
<div class="col-md-6 col-xs-10 col-sm-6" style="background-color: #000000; height: 100px;">
	<h3 style="text-align: left; margin-right: 100px;" class="text text-primary">Contacto</h3>
	
		  <?php 
			  $adminEmail  =  isset(Yii::app()->params['adminEmail'])?Yii::app()->params['adminEmail']:'' ;
			  $line   =  isset(Yii::app()->params['line']['main'])?Yii::app()->params['line']['main']:'' ;
		  ?>
	
			<span class="glyphicon glyphicon-envelope text-primary"></span><strong class="text text-primary">&nbsp;<?= $adminEmail; ?></strong>	
				<br />	
			<span class="glyphicon glyphicon-phone-alt text-primary"></span><strong class="text text-primary">&nbsp;<?= $line; ?></strong>	
</div>

</div>
</div>
	<div class="container">
			<div class="navbar-header">
				<button data-target=".navbar-collapse" data-toggle="collapse"
					class="navbar-toggle" type="button">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				
			
			<a href="#"  class="navbar-brand">
 				NUKLEUS
 			</a>	
			</div>				
		
		
			
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a
						href="<?php echo Yii::app()->createUrl('site/index', array())?>">Home</a></li>
						<li	<?php echo (!strcmp($this->pageTitle,'Nukleus Cursos'))? "class='active'":'' ?>>
						<a
						href="<?php echo Yii::app()->createUrl('site/topCourses'); ?>">Cursos</a>
					</li>
					
					<li	<?php echo (!strcmp($this->pageTitle,'Nukleus Tutoriales'))? "class='active'":'' ?>>
                    	<a href="<?php echo Yii::app()->createUrl('site/topTuto'); ?>">Tutoriales</a>
                    </li>
				
					
                    
                    <li><a href="<?php echo Yii::app()->createUrl('site/topMethodology'); ?>">Metodología</a></li>
                    
                
					<li
						<?php echo (!strcmp($this->pageTitle,'Nukleus - Ubicanos'))? "class='active'":'' ?>>
						<a
						href="<?php echo Yii::app()->createUrl('site/contact', array())?>">Ubicanos</a>
					</li>
				</ul>

				
				<?php $form=$this->beginWidget('CActiveForm',array(
												'id'=>'keyword-form',
												'enableAjaxValidation'=>false,
												'method'=>'get',
												'action'=> Yii::app()->createUrl('site/search'),
												'htmlOptions'=>array(
																				'class'=>'navbar-form navbar-left',
																	)
				)); ?>
				
						<div class="form-group hidden-sm">
						<input type="text" class="form-control" placeholder="Busqueda" name="search_string"  role="search">
						<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
					</div>
			<?php $this->endWidget(); ?>
				

				

			</div>
			<!-- /.nav-collapse -->
		</div>
		<!-- /.container -->
	</nav>	
	
	<div class="row">
	<?php echo $content; ?>
	
	</div>
	
<div id="footer">

		<div class="container" align="center">
			
					Copyright &copy; <?php echo date('Y'); ?> Nukleus.<a href="#">
				Privacy</a>-<a href="#">T&eacute;rminos</a><br /> Algunos derechos reservados. <br />
				Todas las marcas y logotipos mostradas en este sitio se util&iacute;zan solo con fines informativos y est&aacute;n bajo la licencia de sus respectivos due&ntilde;os.<br />
				<p class="text text-center">
				<small>
				<?php if (Yii::app()->user->isGuest) { ?>
							
								<a	href="<?php echo Yii::app()->createUrl(Yii::app()->getModule('user')->loginUrl[0], array());?>"><?php echo "Acceso";//Yii::app()->getModule('user')->t('Login')?>
								</a>
							
						<?php }else{  ?>
						
							
							<?php if(Yii::app()->getModule('user')->isAdmin()) { ?>
								<a	href="<?php  echo Yii::app()->createUrl('admin/index', array())?>">admin</a>
							<?php }?>
					<a
						href="<?php echo Yii::app()->createUrl(Yii::app()->getModule('user')->logoutUrl[0], array());?>">
						<?php echo Yii::app()->getModule('user')->t("Logout"); ?> ( <?php echo Yii::app()->user->name; ?>)</a>
							
						<?php } ?>
						</small>
				</p>		
						
		</div>
</div>
	<!-- page -->

</body>
</html>

