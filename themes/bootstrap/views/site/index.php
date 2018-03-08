<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>






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
 
    
    
    
    
    
    
    