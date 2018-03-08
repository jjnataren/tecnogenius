<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form TbActiveForm */

$this->pageTitle = Yii::app ()->name . ' - Encuentranos';
$this->breadcrumbs = array (
		'Ubicanos' 
);
?>

<div class="row-fluid">

<h2>Encuentranos</h2>


<p class="text-muted">Con gusto te atenderemos en nuestras oficninas.</p>

<div class="col-sm-4">
<blockquote>
	
	<address>
		<strong>Nukleus, S.A de C.V.</strong><br> Los reyes la paz no. 5,
		depto. 600<br> Estado de Mexico, CP 56507<br> <abbr title="Phone">Tel:</abbr>
		(0155) 585-645-56
	</address>

	<address>
		<strong>Correo E.</strong><br> <a href="mailto:contacto@mentoring.com">contacto@mentoring.com</a>
	</address>
</blockquote>

</div>

<div class="col-sm-4 hidden-xs">
<?php

Yii::import ( 'ext.EGMap.*' );

$gMap = new EGMap ();
$gMap->zoom = 10;
$mapTypeControlOptions = array (
		'position' => EGMapControlPosition::LEFT_BOTTOM,
		'style' => EGMap::MAPTYPECONTROL_STYLE_DROPDOWN_MENU 
);

$gMap->mapTypeControlOptions = $mapTypeControlOptions;


$gMap->setCenter ( 19.3639908, -98.9567761 );

// Create GMapInfoWindows
$info_window_a = new EGMapInfoWindow ( '<div>I am a marker with custom image!</div>' );
$info_window_b = new EGMapInfoWindow ( 'Hey! I am a marker with label!' );

$icon = new EGMapMarkerImage ( "http://google-maps-icons.googlecode.com/files/gazstation.png" );

$icon->setSize ( 32, 35 );
$icon->setAnchor ( 16, 16.5 );
$icon->setOrigin ( 0, 0 );


// Create marker
$marker = new EGMapMarker ( 19.353939, -98.977837, array (
		'title' => 'Marker With Custom Image',
		'icon' => $icon 
) );
$marker->addHtmlInfoWindow ( $info_window_a );
//$gMap->addMarker ( $marker );

// Create marker with label
$marker = new EGMapMarkerWithLabel ( 19.353939, -98.977837, array (
		'title' => 'Nukleus, S.A de C.V.
Los reyes la paz no. 5, depto. 600' 
) );

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
$marker->labelContent = 'Nukleus';
$marker->labelStyle = $label_options;
$marker->draggable = true;
$marker->labelClass = 'labels';
$marker->raiseOnDrag = true;

$marker->setLabelAnchor ( new EGMapPoint ( 30, 0 ) );

$marker->addHtmlInfoWindow ( $info_window_b );

$gMap->addMarker ( $marker );

// enabling marker clusterer just for fun
// to view it zoom-out the map
$gMap->enableMarkerClusterer ( new EGMapMarkerClusterer () );

$gMap->renderMap ();
?>

</div>


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

</div>