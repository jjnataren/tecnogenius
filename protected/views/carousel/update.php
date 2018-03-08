<?php
/* @var $this CarouselController */
/* @var $model Carousel */

$this->breadcrumbs=array(
	'Carousels'=>array('index'),
	$model->TITLE=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Carousel', 'url'=>array('index')),
	array('label'=>'Create Carousel', 'url'=>array('create')),
	array('label'=>'View Carousel', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Manage Carousel', 'url'=>array('admin')),
);
?>

<h1>Update Carousel <?php echo $model->ID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>