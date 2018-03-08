<!DOCTYPE html>

<!-- 
  Theme Name: Enlight
  Theme URL: https://probootstrap.com/enlight-free-education-responsive-bootstrap-website-template
  Author: ProBootstrap.com
  Author URL: https://probootstrap.com
  License: Released for free under the Creative Commons Attribution 3.0 license (probootstrap.com/license)
-->

		<?php 
			  $adminEmail  =  isset(Yii::app()->params['adminEmail'])?Yii::app()->params['adminEmail']:'' ;
			  $line   =  isset(Yii::app()->params['line']['main'])?Yii::app()->params['line']['main']:'' ;
			  $address   =  isset(Yii::app()->params['address'])?Yii::app()->params['address']:'' ;
		  ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
     <meta name="description" content="Centro de capacitacion en lenguajes de programacion, consultoria y desarrollo de software">
    <meta name="keywords"  content="cursos de java, curso java, cursos de flex, curso flex, cursos de base de datos, curso sql, cursos de as3, curso flash, cursos de php, curso php, cursos de jquery, curso jquery" />
    
     
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="css/styles-merged.css">
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.min.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="probootstrap-search" id="probootstrap-search">
      <a href="#" class="probootstrap-close js-probootstrap-close"><i class="icon-cross"></i></a>
      <form action="#">
        <input type="search" name="s" id="search" placeholder="Search a keyword and hit enter...">
      </form>
    </div>
    
    <div class="probootstrap-page-wrapper">
      <!-- Fixed navbar -->
      
      <div class="probootstrap-header-top">
        <div class="container">
          <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-9 probootstrap-top-quick-contact-info">
              <span><i class="icon-location2"></i><?php echo $address;?></span>
              <span><i class="icon-phone2"></i><?php echo $line;?></span>
              <span><i class="icon-mail"></i><?php echo $adminEmail;?></span>
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

         <section class="flexslider">
        <ul class="slides">
        
        
              <?php $items = Carousel::model()->findAllByAttributes(array('STATUS'=>1)); 
      
      	$totalItems = count($items);
      	$contItem = 0;
      	$isActive = false;
      	$activeClass = '';
      	foreach ($items as $item):
      	
      	if ( $item->ORDER === 1 ){
      		
      		$isActive = true;
      		
      		$activeClass = 'item active';
      		
      	}else  $activeClass = 'item ';
      	
      	
      	if (!$isActive && ($contItem + 1) === $totalItems ){
      		
      		$activeClass = 'item active';
      		
      	}      	
      ?>
      

          <li style="background-image: url(<?= isset($item->documents[0]) ? $item->documents[0]->PATH :  'data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' ?>)" class="overlay">
          <div class="container">
          	<div class="row">
          		<div class="col-md-8 col-md-offset-2">
          			<div class="probootstrap-slider-text text-center">
          				 <h1 class="probootstrap-heading probootstrap-animate"><?=$item->TITLE; ?></h1>
          				  <p><?=$item->DESCRIPTION; ?></p>
          				  <?php 
              
              $url = $item->ACTION;
              
              if (!filter_var($item->ACTION, FILTER_VALIDATE_URL) === true) {
					  
              			$url = '#';		
              	
					} 
						
						
			   ?>
			  
              <a  href="<?= $url;?>" class="btn btn-lg btn-primary" ><?=$item->ACTION_NAME; ?></a>
          			</div>
          		</div>
          	</div>
          
     
          </div>
        </li>
        
      <?php
      
      $contItem ++;
      endforeach;?>
       
       
      <?php if (!$contItem):?>
      
      		<li style="background-image: url(img/slider_1.jpg)" class="overlay">
            <div class="container">
              <div class="row">
                <div class="col-md-8 col-md-offset-2">
                  <div class="probootstrap-slider-text text-center">
                    <h1 class="probootstrap-heading probootstrap-animate">Bienvenido a Tecnogenius</h1>
                  </div>
                </div>
              </div>
            </div>
          </li>
		
      
      
      <?php endif;?>  
 
        
        
        
        
        </ul>
      </section>
      
      
          <section class="probootstrap-section probootstrap-section-colored">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-left section-heading probootstrap-animate">
              <h2>Bienvenido a TECNOGENIUS</h2>
            </div>
          </div>
        </div>
      </section>

  <section class="probootstrap-section">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="probootstrap-flex-block">
                <div class="probootstrap-text probootstrap-animate">
                  <h3>Acerca de nosotros</h3>
                  <p>Somos tu mejor opción para aprender nuevas tecnologías, contamos con los mejores profesores certificados.</p>
                  <p><a href="/contacto.html" class="btn btn-primary">Contacto</a></p>
                </div>
                <div class="probootstrap-image probootstrap-animate" style="background-image: url(img/slider_3.jpg)">
                  <a href="/img/nucleus.mp4" class="btn-video popup-vimeo"><i class="icon-play3"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="probootstrap-section" id="probootstrap-counter">
        <div class="container">
          
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
              <div class="probootstrap-counter-wrap">
                <div class="probootstrap-icon">
                  <i class="icon-users2"></i>
                </div>
                <div class="probootstrap-text">
                  <span class="probootstrap-counter">
                    <span class="js-counter" data-from="0" data-to="200" data-speed="5000" data-refresh-interval="5">1</span>
                  </span>
                  <span class="probootstrap-counter-label">Estudiantes</span>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
              <div class="probootstrap-counter-wrap">
                <div class="probootstrap-icon">
                  <i class="icon-user-tie"></i>
                </div>
                <div class="probootstrap-text">
                  <span class="probootstrap-counter">
                    <span class="js-counter" data-from="0" data-to="20" data-speed="5000" data-refresh-interval="50">1</span>
                  </span>
                  <span class="probootstrap-counter-label">Profesores certificados</span>
                </div>
              </div>
            </div>
            <div class="clearfix visible-sm-block visible-xs-block"></div>
            <div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
              <div class="probootstrap-counter-wrap">
                <div class="probootstrap-icon">
                  <i class="icon-library"></i>
                </div>
                <div class="probootstrap-text">
                  <span class="probootstrap-counter">
                    <span class="js-counter" data-from="0" data-to="9" data-speed="5000" data-refresh-interval="50">1</span>%
                  </span>
                  <span class="probootstrap-counter-label">Academias</span>
                </div>
              </div>
            </div>
       
          </div>
        </div>
      </section>



      <section class="probootstrap-section probootstrap-bg-white probootstrap-border-top">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
              <h2>Tecnologias que impartimos</h2>
              <p class="lead">Somos expertos e impartimos cursos en las siguientes tecnologías</p>
            </div>
          </div>
          <!-- END row -->
          <div class="row">
         
          		      <?php 
        
                        	$technologies  =  MentoringHyerarchy::model()->findAllByAttributes(array('LEVEL_NUMBER'=>10));
                        	
                        	foreach ($technologies as $tech):
                        	
                        ?>
                        
            <div class="col-md-6">
           
              <div class="probootstrap-service-2 probootstrap-animate">
                <div class="image">
                  <div class="image-bg">
                  <?php if (isset($techImages[0])):?>
    	                <img src="<?=$techImages[0]->PATH; ?>" alt="Tecnología">
                   <?php else: ?>
	                   <img src="<?php echo Yii::app()->request->baseUrl.'/images/site/courses.png'; ?>" alt="Tecnología">
                   <?php endif;?> 
                  </div>
                </div>
                <div class="text">
                  <span class="probootstrap-meta"><i class="icon-calendar2"></i>2018</span>
                  <h3><?= $tech->NAME; ?></h3>
                  <p><?= $tech->DESCRIPTION;?></p>
                  <p><a  href="/cursos/top-cursos.html" class="btn btn-primary">Aprender más</a> <span class="enrolled-count">2,928 students enrolled</span></p>
                </div>
              </div>
             </div>
              			<?php endforeach;?>


        
          </div>
        </div>
      </section>

      
     
      
      <section class="probootstrap-cta">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2 class="probootstrap-animate" data-animate-effect="fadeInRight">Contactanos ahora mismo!</h2>
              <a href="/contacto.html" role="button" class="btn btn-primary btn-lg btn-ghost probootstrap-animate" data-animate-effect="fadeInLeft">Ir</a>
            </div>
          </div>
        </div>
      </section>
      
       <section class="probootstrap-section probootstrap-section-colored probootstrap-bg probootstrap-custom-heading probootstrap-tab-section" style="background-image: url(img/slider_2.jpg)">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center section-heading probootstrap-animate">
              <h2 class="mb0">Destacados</h2>
            </div>
          </div>
        </div>
        <div class="probootstrap-tab-style-1">
          <ul class="nav nav-tabs probootstrap-center probootstrap-tabs no-border">
            <li class="active"><a data-toggle="tab" href="#featured-news">Eventos</a></li>
            <li><a data-toggle="tab" href="#upcoming-events">Noticias</a></li>
          </ul>
        </div>
      </section>
      
      <section class="probootstrap-section probootstrap-section">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              
              <div class="tab-content">

                <div id="featured-news" class="tab-pane fade in active">
                  <div class="row">
                    <div class="col-md-12">
                      
                        <!-- END item -->
                        
                         <?php 
    
                            $rssFeed  =  Yii::app()->params['rssNews'];
                            $limitNews  =  isset(Yii::app()->params['limitNews'])?Yii::app()->params['limitNews']:3;
                        
                            $this->widget(
                            		'ext.yii-feed-widget.YiiFeedWidget',
                            		array('url'=>$rssFeed,'limit'=>$limitNews)
                            );
                            
                            ?>
                      </div>
                    </div>
                  
                  <!-- END row -->
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <p><a href="#" class="btn btn-primary">Ver todos los eventos</a></p>  
                    </div>
                  </div>
                  </div>
                <div id="upcoming-events" class="tab-pane fade">
                  <div class="row">
                    <div class="col-md-12">
                     
                        <!-- END item -->
                         <?php 
    
                            $rssFeed  =  Yii::app()->params['rssNews'];
                            $limitNews  =  isset(Yii::app()->params['limitNews'])?Yii::app()->params['limitNews']:3;
                        
                            $this->widget(
                            		'ext.yii-feed-widget.YiiFeedWidget',
                            		array('url'=>$rssFeed,'limit'=>$limitNews)
                            );
                            
                            ?>
                      </div>
                    </div>
                
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <p><a href="#" class="btn btn-primary">Ver todas las noticias</a></p>  
                    </div>
                  </div>
                </div>

              </div>
              </div>
            </div>
            </div>
      </section>
      
        <footer class="probootstrap-footer probootstrap-bg">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <div class="probootstrap-footer-widget">
                <h3>Acerca de nosotros</h3>
                <p>Somos tu mejor opción para aprender nuevas tecnologías, contamos con los mejores profesores certificados.</p>
                <h3>Social</h3>
                <ul class="probootstrap-footer-social">
                  <li><a href="#"><i class="icon-twitter"></i></a></li>
                  <li><a href="#"><i class="icon-facebook"></i></a></li>
                  <li><a href="#"><i class="icon-github"></i></a></li>
                  <li><a href="#"><i class="icon-dribbble"></i></a></li>
                  <li><a href="#"><i class="icon-linkedin"></i></a></li>
                  <li><a href="#"><i class="icon-youtube"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="col-md-3 col-md-push-1">
              <div class="probootstrap-footer-widget">
                <h3>Links</h3>
                <ul>
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
                  
                  <li>
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
						</li>
                  
                </ul>
              </div>
            </div>
            <div class="col-md-4">
              <div class="probootstrap-footer-widget">
                <h3>Contacto</h3>
                <ul class="probootstrap-contact-info">
                  <li><i class="icon-location2"></i> <span>C. Londres #114, Col. Juárez, Del. Cuauhtemoc, CDMX</span></li>
                  <li><i class="icon-mail"></i><span><?=$adminEmail; ?></span></li>
                  <li><i class="icon-phone2"></i><span><?=$line; ?></span></li>
                </ul>
              </div>
            </div>
           
          </div>
          <!-- END row -->
          
        </div>

        <div class="probootstrap-copyright">
          <div class="container">
            <div class="row">
              <div class="col-md-8 text-left">
                	Copyright &copy; <?php echo date('Y'); ?> Nukleus.<a href="#">
				Privacy</a>-<a href="#">T&eacute;rminos</a><br /> Algunos derechos reservados. <br />
				Todas las marcas y logotipos mostradas en este sitio se utilízan solo con fines informativos y están bajo la licencia de sus respectivos dueños.<br />
		
              </div>
              <div class="col-md-4 probootstrap-back-to-top">
                <p><a href="#" class="js-backtotop">Back to top <i class="icon-arrow-long-up"></i></a></p>
              </div>
            </div>
          </div>
        </div>
      </footer>	

    </div>
    <!-- END wrapper -->
    

    <script src="js/scripts.min.js"></script>
    <script src="js/main.min.js"></script>
    <script src="js/custom.js"></script>

  </body>
</html>