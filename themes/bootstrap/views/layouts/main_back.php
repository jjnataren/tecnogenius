<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" >

<meta name="language" content="es" />

<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->theme->baseUrl; ?>/css/sticky-footer.css" />


<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<?php Yii::app()->bootstrap->register(); ?>
	
<!--[if IE 8]>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/respond.js"></script>
<![endif]-->	
</head>

<body>


	<div role="navigation" class="navbar-fixed-top navbar-inverse" >

		<div class="container">
			<div class="navbar-header">
				<button data-target=".navbar-collapse" data-toggle="collapse"
					class="navbar-toggle" type="button">
						<span class="sr-only">Toggle navigation</span> 
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
				</button>
				
			
			<a href="#"  class="navbar-brand">
				Nukleus
			</a>	
			</div>				
		
		
			
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a
						href="<?php echo Yii::app()->createUrl('site/index', array())?>">Home</a></li>
						<li	<?php echo (!strcmp($this->pageTitle,'Nukleus Cursos'))? "class='active'":'' ?>>
						<a
						href=<?php echo Yii::app()->createUrl('site/topCourses')?>>Cursos</a>
					</li>
					
					<li	<?php echo (!strcmp($this->pageTitle,'Nukleus Tutoriales'))? "class='active'":'' ?>>
                    	<a href=<?php echo Yii::app()->createUrl('site/topTuto')?>>Tutoriales</a>
                    </li>
				
					<li><a href="<?php echo Yii::app()->createUrl('site/topMethodology'); ?>">Metodología</a></li>
                    
                    
					<li
						<?php echo (!strcmp($this->pageTitle,'Nukleus - Ubicanos'))? "class='active'":'' ?>>
						<a
						href=<?php echo Yii::app()->createUrl('site/contact', array())?>>Ubicanos</a>
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
	</div>

	<div class="container-fluid" id="page">

		<br /> <br /> <br />

	
	<?php echo $content; ?>

	 	
			<br /> <br /> <br />

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
