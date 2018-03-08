<?php
$this->breadcrumbs=array(
	'Keywords'=>array('index'),
	'Create',
);

$this->menu=array(
		
	array('label'=>'Lista palabras','url'=>array('index')),
	array('label'=>'Administrar palabras','url'=>array('admin')),
);
?>

<h1>Crear palabras</h1>

  <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
  