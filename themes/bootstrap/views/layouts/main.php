<html lang="es">
<?php 
			  $adminEmail  =  isset(Yii::app()->params['adminEmail'])?Yii::app()->params['adminEmail']:'' ;
			  $line   =  isset(Yii::app()->params['line']['main'])?Yii::app()->params['line']['main']:'' ;
		  ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta name="description" content="Centro de capacitacion en lenguajes de programacion, consultoria y desarrollo de software">
    <meta name="keywords"  content="cursos de java, curso java, cursos de flex, curso flex, cursos de base de datos, curso sql, cursos de as3, curso flash, cursos de php, curso php, cursos de jquery, curso jquery" />
    
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="/css/styles-merged.css">
    <link rel="stylesheet" href="/css/style.min.css">
    <link rel="stylesheet" href="/css/custom.css">

    <!--[if lt IE 9]>
      <script src="/js/vendor/html5shiv.min.js"></script>
      <script src="/js/vendor/respond.min.js"></script>
    <![endif]-->
  </head>



<!-- NAVBAR
================================================== -->
<body>


<div class="probootstrap-search" id="probootstrap-search">
      <a href="#" class="probootstrap-close js-probootstrap-close"><i class="icon-cross"></i></a>
      
      	<?php $form=$this->beginWidget('CActiveForm',array(
												'id'=>'keyword-form',
												'enableAjaxValidation'=>false,
												'method'=>'get',
												'action'=> Yii::app()->createUrl('site/search'),
											
				)); ?>
				
						<input type="search" name="s" id="search" placeholder="Buscar...">
			<?php $this->endWidget(); ?>
      
    </div>

<div class="probootstrap-page-wrapper">
	<div class="probootstrap-header-top">
        <div class="container">
          <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-9 probootstrap-top-quick-contact-info">
              <span><i class="icon-location2"></i>C. Londres #114, Col. Juárez, Del. Cuauhtemoc, CDMX</span>
              <span><i class="icon-phone2"></i><?=$line;?></span>
              <span><i class="icon-mail"></i><?=$adminEmail;?></span>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 probootstrap-top-social">
              <ul>
                <li><a href="#"><i class="icon-twitter"></i></a></li>
                <li><a href="#"><i class="icon-facebook2"></i></a></li>
                <li><a href="#"><i class="icon-instagram2"></i></a></li>
                <li><a href="#"><i class="icon-youtube"></i></a></li>
                <li><a href="#" class="probootstrap-search-icon js-probootstrap-search"><i class="icon-search"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <nav class="navbar navbar-default probootstrap-navbar">
        <div class="container">
          <div class="navbar-header">
            <div class="btn-more js-btn-more visible-xs">
              <a href="#"><i class="icon-dots-three-vertical "></i></a>
            </div>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html" title="ProBootstrap:Enlight">Enlight</a>
          </div>

          <div id="navbar-collapse" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
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
          </div>
        </div>
      </nav>
      
	
</div>

	<?php echo $content; ?>
	
	
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

