<?php
$this->breadcrumbs=array(
	'Keywords'=>array('index'),
	$model->WORD=>array('view','id'=>$model->WORD),
	'Update',
);

$this->menu=array(
	array('label'=>'List Keyword','url'=>array('index')),
	array('label'=>'Create Keyword','url'=>array('create')),
	array('label'=>'View Keyword','url'=>array('view','id'=>$model->WORD)),
	array('label'=>'Manage Keyword','url'=>array('admin')),
);
?>

<h1>Update Keyword <?php echo $model->WORD; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>