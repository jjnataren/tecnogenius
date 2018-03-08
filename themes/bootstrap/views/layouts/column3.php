
<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main_app'); ?>
<div class="row">
	
	<div class="hidden-xs hidden-sm col-md-1">	
	<div class="the_left_side">
			<?php
			
			$fbpage  =  isset(Yii::app()->params['fbpage'])?Yii::app()->params['fbpage']:'https://www.facebook.com/' ;
			$twpage  =  isset(Yii::app()->params['twpage'])?Yii::app()->params['twpage']:'' ;
			
			$this->widget('application.extensions.social.social', array(
			    'style'=>'vertical', 
			        'networks' => array(
			        'twitter'=>array(
			            'data-via'=>$twpage, //http://twitter.com/#!/YourPageAccount if exists else leave empty
			            ), 
			        'googleplusone'=>array(
			            "size"=>"medium",
			            "annotation"=>"bubble",
			        ), 
			        'facebook'=>array(
			            'href'=>$fbpage,//asociate your page http://www.facebook.com/page 
			            'action'=>'like',//recommend, like
			            'colorscheme'=>'light',
			            'width'=>'120px',
			            )
			        )
			));?>
	</div>
	</div>
	<div class="col-xs-12 col-sm-8 col-md-8">
		
		 <?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget ( 'bootstrap.widgets.TbBreadcrumbs', array (
											'links' => $this->breadcrumbs 
									) );
									?>
			<!-- breadcrumbs -->
		<?php endif?>
        	
            <?php echo $content; ?>
        
		<!-- content -->

	</div>

	<div class="col-xs-12 col-sm-4 col-md-3">
	
	 
	 

	<?php if(!isset($this->dateDetailsMenu)) {?>
	
        
   <div class="panel panel-default">
	  <div class="panel-heading">
	    <h1 class="panel-title"><span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;<strong>Promociones</strong></h1>
	    <small class="text text-muted">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aprovecha estas promociones!</small>
	  </div>
	  <div class="panel-body">
	  
		
		<?php 		if(isset($this->promotionItems) && $this->promotionItems!= null){
			
					$aImages = array();
					$aAlts = array();
					
					$fields = array();
			
					foreach ($this->promotionItems as $item){
								
							if (isset($item->documents[0])){
								
								
								$fields = explode('/', $item->documents[0]->PATH);
								$aImages[] = end($fields);

							}else{
								
								$aImages[] = 'defaultFile.png';

							}
							
							$aAlts[] = $item->DESCRIPTION;
							
							}
			
					$this->widget('ext.slider.slider', array(
							'sliderBase'=>'/uploads/',
							'container'=>'slideshow',
							'width'=>260,
							'imagesPath'=>'promotion',
							'height'=>300,
							'timeout'=>6000,
							'infos'=>true,
							'constrainImage'=>true,
							'images'=>$aImages,//array('01.jpg','02.jpg','03.jpg','04.jpg'),
							'alts'=>$aAlts,//array('No esperes mas e inicia tu formación!','Promoción valida hasta el 12/05/2014','Que no se te pase inscribete a este curso!', '¿Necesitas actualizarte?',),
							'defaultUrl'=>Yii::app()->request->hostInfo
					)
					); }?>
					
		</div>
 		 <div class="panel-footer"> 		
 				<p class="text text-muted">
 					<small>
 					Todas nuestras promociones están sujetas a disponibilidad y cambios sin previo aviso.
 					</small>
 				</p>
		</div>
	</div>

        
        <?php }else{?>
        
            
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h1 class="panel-title"><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;<strong>Costos e información</strong></h1>
	    <small class="text text-muted">Si tienes alguna duda no dudes en contactarnos <a>aquí</a>.</small>
	  </div>
	  <div class="panel-body">
        <?php 
        
				        $this->widget('bootstrap.widgets.TbMenu', array(
											'items'=>$this->menu,
											'encodeLabel' =>false,
											'htmlOptions'=>array('class'=>'nav nav-pills nav-stacked'),
									));
        
       		 ?>
        
				


 </div>
 		 <div class="panel-footer">
 				<small class="text text-muted">Los precios publicados NO incluyen IVA, y estan sujetos a cambios sin previo aviso.</small>
		</div>
	</div>

        
	<div class="panel">
	  <div class="panel-heading">
	    <h1 class="panel-title"><span class="glyphicon glyphicon-calendar"></span>&nbsp;<strong>Proximas fechas</strong></h1>
	    <small class="text text-muted">Proximas fechas de inicio para este curso.</small>
	  </div>
	  <div class="panel-body">
	     
	        	<?php
	        	
	        	$avaliableDate = '"1900-01-01"';        	
	        	foreach ($this->dateDetailsMenu as $aDate){
	        		
					$avaliableDate = $avaliableDate.',"'.$aDate.'"';
	        	}
	        	
						$this->widget('zii.widgets.jui.CJuiDatePicker',array(
						    'name'=>'datepicker-Inline',
						    'flat'=>true,//remove to hide the datepicker
						    'options'=>array(
						        'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
								
								'beforeShowDay' => 'js:function(date){
																var avaliableDays = ['.$avaliableDate.'];    
						                                        var m = (date.getMonth() + 1).toString(), d = date.getDate().toString(), y = date.getFullYear();
															//	alert(m);											
						            for (i = 0; i < avaliableDays.length; i++) {
						                if($.inArray(y + "-" + (m[1]?m:"0"+m) + "-" + (d[1]?d:"0"+d[0]), avaliableDays) != -1) {
						                    //return [false];
						                    return [true, "highlight", "Cursos con dispocisión"];
						                }//else return [true, "highlight", "Cursos con dispocision"];
						            }
						            return [true];
						
						                          }'
						
						    ),
						    'htmlOptions'=>array(
						 
						

						    ),
						));
	
	
				?>
				
 		 </div>
 		
				
 		 <div class="panel-footer">
 				<ul class="">
				  <li >
					<h5><span class="label label-success">&nbsp;</span> Proximos cursos</h5>				 		 
				  </li>				 
				</ul>
		</div>
	</div>
        
        <?php }?>
			
<div class="panel panel-info">
	  <div class="panel-heading">
	    <h1 class="panel-title"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;<strong>Contactanos</strong></h1>
	    <small class="text text-muted">Contactanos ahora y no te arrepentiras.</small>
	  </div>
	  <div class="panel-body">
	  
		<div class="list-group">
		  <a href="#" class="list-group-item">
		    <h4 class="list-group-item-heading">Por telefono</h4>
		    
		    <?php 
		    
		    	if (isset(Yii::app()->params['line'])){
		    	
		    		foreach (Yii::app()->params['line'] as $phone){
		    ?>
		    <p class="list-group-item-text">
		    	<span class="glyphicon glyphicon-phone-alt"></span>&nbsp; Local:<?=$phone; ?>
		    </p>
		   
		   			<?php }?>
		   	<?php }?> 
		    
		    <?php 
		    
		    	$mobile = isset(Yii::app()->params['mobile'])?Yii::app()->params['mobile']:'';
		    
		    ?>
		     <p class="list-group-item-text">
		    	<span class="glyphicon glyphicon-phone"></span>&nbsp; Movil: <?=$mobile;?>
		    </p>
		    
		  </a>
		  
		  <?php 
		  
		 
		  $adminEmail  =  isset(Yii::app()->params['adminEmail'])?Yii::app()->params['adminEmail']:'' ;
		  
		  ?>
		  
		  <a href="mailto:<?=$adminEmail; ?>" class="list-group-item">
		    <h4 class="list-group-item-heading">Por email</h4>
		    <p class="list-group-item-text">
		    	<span class="gglyphicon glyphicon-envelope"></span>&nbsp; <?=$adminEmail; ?>
		    </p>
		  </a>
		  
		  <a href="<?=$fbpage; ?>" target="_blank" class="list-group-item">
		    <h4 class="list-group-item-heading">Por medios sociales</h4>
		    <p class="list-group-item-text">
		    	<span class="glyphicon glyphicon-info-sign"></span>&nbsp; Facebook: <?=$fbpage; ?>
		    </p>
		  </a>
		</div> 
 		 </div>
 		
</div>

		<div class="panel">			 
			  <div class="panel-body">
			  
				<?php $this->widget('ext.yii-facebook-opengraph.plugins.LikeBox', array(
					   'href' => 'www.facebook.com/mentoringit', //Yii::app()->createAbsoluteUrl("tutorial/detail", array("id"=>$tutorial->ID) ), // if omitted Facebook will use the OG meta tag
					   //'layout'=>'button_count',
					   'show_faces'=>true,
						'width'=>'260',
					   //'send' => true
					)); ?>
			  		
		 		 </div>		
		</div>
	
	</div>
</div>
<?php $this->endContent(); ?>