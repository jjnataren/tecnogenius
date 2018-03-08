<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>


 <section class="flexslider">
        <ul class="slides">
          <li style="background-image: url(img/slider_1.jpg)" class="overlay">
            <div class="container">
              <div class="row">
                <div class="col-md-8 col-md-offset-2">
                  <div class="probootstrap-slider-text text-center">
                    <h1 class="probootstrap-heading probootstrap-animate">Your Bright Future is Our Mission</h1>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li style="background-image: url(img/slider_2.jpg)" class="overlay">
            <div class="container">
              <div class="row">
                <div class="col-md-8 col-md-offset-2">
                  <div class="probootstrap-slider-text text-center">
                    <h1 class="probootstrap-heading probootstrap-animate">Education is Life</h1>
                  </div>
                </div>
              </div>
            </div>
            
          </li>
          <li style="background-image: url(img/slider_3.jpg)" class="overlay">
            <div class="container">
              <div class="row">
                <div class="col-md-8 col-md-offset-2">
                  <div class="probootstrap-slider-text text-center">
                    <h1 class="probootstrap-heading probootstrap-animate">Helping Each of Our Students Fulfill the Potential</h1>
                  </div>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </section>




<div data-ride="carousel" class="carousel slide" id="myCarousel" >
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li class="" data-slide-to="0" data-target="#myCarousel"></li>
        <li data-slide-to="1" data-target="#myCarousel" class="active"></li>
        <li data-slide-to="2" data-target="#myCarousel" class=""></li>
      </ol>
      <div class="carousel-inner">
      
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

        <div class="<?= $activeClass ?>">
        
        
          <img alt="<?=$item->CAPTION ?>" src=<?= isset($item->documents[0]) ? $item->documents[0]->PATH :  'data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' ?>>
          <div class="container">
            <div class="carousel-caption"> 
              <h1><?=$item->TITLE; ?></h1>
              <p><?=$item->DESCRIPTION; ?></p>
              
              <?php 
              
              $url = $item->ACTION;
              
              if (!filter_var($item->ACTION, FILTER_VALIDATE_URL) === true) {
					  
              			$url = '#';		
              	
					} 
						
						
			   ?>
			   <p>
              <a  href="<?= $url;?>" class="btn btn-lg btn-primary" ><?=$item->ACTION_NAME; ?></a>
              </p>
            </div>
          </div>
        </div>
        
      <?php
      
      $contItem ++;
      endforeach;?>
       
       
      <?php if (!$contItem):?>
      
      		  <div class="item active">
          <img class="Nuestra empresa" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Bienvenido</h1>
              <p>Explore nuestro contenido!</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Buscar</a></p>
            </div>
          </div>
        </div>
		
      
      
      <?php endif;?>  
 
        
        
      </div>
      <a data-slide="prev" href="#myCarousel" class="left carousel-control"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a data-slide="next" href="#myCarousel" class="right carousel-control"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
    
    
<div class="container marketing">

      <h1>Tecnologías que Impartimos</h1>

      <!-- Three columns of text below the carousel -->
      <div class="row">
        
        
        <?php 
        
        	$technologies  =  MentoringHyerarchy::model()->findAllByAttributes(array('LEVEL_NUMBER'=>10));
        	
        	foreach ($technologies as $tech):
        	
        ?>
        
        
        
        
        <div class="col-lg-4">
         <?php
         	
         	$techImages = HierarchyDocument::model()->findAllByAttributes(array('DOCUMENT_TYPE'=>1,'HIERARCHY_ID'=>$tech->ID));
         	
         	if (isset($techImages[0])):
         
         ?>
          <img alt="140x140" data-src="holder.js/140x140" class="img-rounded" style="width: 140px; height: 140px;" src=<?=$techImages[0]->PATH; ?> >
          
          <?php else:
          ?>
          
          <img alt="140x140" data-src="holder.js/140x140" class="img-rounded" style="width: 140px; height: 140px;" src=<?php echo Yii::app()->request->baseUrl.'/images/site/courses.png'; ?> >
          
          <?php endif;?>
          
          <h2><?= $tech->NAME; ?> </h2>
          <p><?= $tech->DESCRIPTION; ?></p>
          <p><a role="button" href="/cursos/top-cursos.html" class="btn btn-default">Aprender más</a></p>
        </div><!-- /.col-lg-4 -->
        

        <?php endforeach;?>
        
        
      </div><!-- /.row -->


      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider" />
			
			
	<div class="col-md-12 col-xs-12 col-sm-12">
			
  <h1>Ultimas noticias</h1>
  			
    <?php 
    
    $rssFeed  =  Yii::app()->params['rssNews'];
    $limitNews  =  isset(Yii::app()->params['limitNews'])?Yii::app()->params['limitNews']:3;

    $this->widget(
    		'ext.yii-feed-widget.YiiFeedWidget',
    		array('url'=>$rssFeed,'limit'=>$limitNews)
    );
    
    ?>
   
      <hr class="featurette-divider" />

      <!-- /END THE FEATURETTES -->
	</div>

    </div>
    
    
    
    
    
    
    