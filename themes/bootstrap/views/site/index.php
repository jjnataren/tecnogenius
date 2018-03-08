<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>


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
                  <p><a href="#" class="btn btn-primary">Conctacto</a></p>
                </div>
                <div class="probootstrap-image probootstrap-animate" style="background-image: url(img/slider_3.jpg)">
                  <a href="https://www.youtube.com/watch?v=QK2N2PmZuM0" class="btn-video popup-vimeo"><i class="icon-play3"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

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
 
    
    
    
    
    
    
    