<style type="text/css">
.labels {
	color: red;
	background-color: white;
	font-family: "Lucida Grande", "Arial", sans-serif;
	font-size: 10px;
	font-weight: bold;
	text-align: center;
	width: 40px;
	border: 2px solid black;
	white-space: nowrap;
}
</style>


<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form TbActiveForm */

$this->pageTitle=Yii::app()->name . ' - Ubicanos';
$this->breadcrumbs=array(
	'Ubicanos',
);
?>

<h2>Encuentranos</h2>
<p class="text text-muted">Con gusto te atenderemos en nuestras oficinas.</p>

<div class="col-xs-12 col-sm-4 col-md-4">

<blockquote>	
	<address>
	<strong>Distrito Federal</strong><br/>
		Calle Londres #114. CP.06600, Col. Ju&aacute;rez, Delegaci&oacute;n Cuauhtemoc.
	</address>
</blockquote>


<?php if(Yii::app()->user->hasFlash('contact')): ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('contact'),
    )); ?>

<?php else: ?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableAjaxValidation'=>false,
)); ?>

<!-- 	<p class="note">Los campos con: <span class="required">*</span> son requeridos.</p> -->

	<?php echo $form->errorSummary($model ); ?>
		
		
    <?php echo $form->textField($model,'name', array('class'=>'form-control', 'placeholder'=>"* Nombre")); ?>
	 <?php echo $form->error($model,'name',array('class'=>'text-danger')); ?>
	 
	 <br />
	<?php echo $form->textField($model,'email', array('class'=>'form-control', 'placeholder'=>"* Email")); ?>
	 <?php echo $form->error($model,'email',array('class'=>'text-danger')); ?>

	 <br />
	 <?php echo $form->textField($model,'subject',array('class'=>'form-control','size'=>60,'maxlength'=>128, 'placeholder'=>"* Asunto")); ?>
     <?php echo $form->error($model,'subject',array('class'=>'text-danger')); ?>
    
    <br />
    <?php echo $form->textArea($model,'body',array('rows'=>6, 'class'=>'form-control', 'placeholder'=>"Mensaje")); ?>
     <?php echo $form->error($model,'body',array('class'=>'text-danger')); ?>

 
    
    	<?php if(CCaptcha::checkRequirements()): ?>
	    	<?php $this->widget('CCaptcha'); ?>
			<?php echo $form->textField($model,'verifyCode',array('class'=>'form-control')); ?>
	    	<?php echo $form->error($model,'verifyCode'); ?>        
		<?php endif; ?>
	
		<br />
		<?php $this->widget('bootstrap.widgets.TbButton',array(
            'buttonType'=>'submit',
            'type'=>'primary',
            'label'=>'Enviar',
        )); ?>
	

<?php $this->endWidget(); ?>



<?php endif; ?>

</div>

<div class="col-md-8 col-sm-8  hidden-xs">

<?php

Yii::import ( 'ext.EGMap.*' );

$gMap = new EGMap ();
$gMap->zoom = 15;
$mapTypeControlOptions = array (
		'position' => EGMapControlPosition::LEFT_BOTTOM,
		'style' => EGMap::MAPTYPECONTROL_STYLE_DROPDOWN_MENU 
);

$gMap->mapTypeControlOptions = $mapTypeControlOptions;


$gMap->setCenter ( 19.4253796,-99.1661029 );

// Create GMapInfoWindows
$info_window_a = new EGMapInfoWindow ( '<div>Nukleus Sede, Te estamos esperando!</div>' );
$info_window_b = new EGMapInfoWindow ( 'Te estamos esperando, Nukleus.' );

$image = Yii::app()->baseUrl.'/images/nukleus_maps.jpg';

$icon = new EGMapMarkerImage (Yii::app()->baseUrl.'/images/site/nukleus_maps.jpg' );



$latitude = isset(Yii::app()->params['maps_latitude'])?Yii::app()->params['maps_latitude']:19.4253796;
$longitude = isset(Yii::app()->params['maps_longitude'])?Yii::app()->params['maps_longitude']:-99.1661029;


// Create marker
$marker = new EGMapMarker ( $latitude,$longitude, array (
		'title' => 'Nukleus ',
		'icon' => $icon 
) );
$marker->addHtmlInfoWindow ( $info_window_a );


//$gMap->addMarker ( $marker );

// Create marker with label
//$marker = new EGMapMarkerWithLabel ( 19.353939, -98.977837, array (
		//'title' => 'Nukleus, S.A de C.V.
//Los reyes la paz no. 5, depto. 600' 
//) );

$label_options = array (
		'backgroundColor' => 'yellow',
		'opacity' => '0.75',
		'width' => '100px',
		'color' => 'blue' 
);

/*
 * // Two ways of setting options // ONE WAY: $marker_options = array( 'labelContent'=>'$9393K', 'labelStyle'=>$label_options, 'draggable'=>true, // check the style ID // afterwards!!! 'labelClass'=>'labels', 'labelAnchor'=>new EGMapPoint(22,2), 'raiseOnDrag'=>true ); $marker->setOptions($marker_options);
 */

// SECOND WAY:
//$marker->labelContent = 'Nukleus';
//$marker->labelStyle = $label_options;
$marker->draggable = true;
//$marker->labelClass = 'labels';
$marker->raiseOnDrag = true;



//$marker->setLabelAnchor ( new EGMapPoint ( 30, 0 ) );

$marker->addHtmlInfoWindow ( $info_window_b );


$gMap->addMarker ( $marker );

// enabling marker clusterer just for fun
// to view it zoom-out the map
$gMap->enableMarkerClusterer ( new EGMapMarkerClusterer () );




$gMap->renderMap ();
?>

</div>