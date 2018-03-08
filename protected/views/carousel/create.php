<?php
/* @var $this CarouselController */
/* @var $model Carousel */

$this->breadcrumbs=array(
	'Carousels'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Administrar carrusel', 'url'=>array('admin')),
);
?>

<h1>Create Carousel</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>