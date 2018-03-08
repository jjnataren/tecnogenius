<?php

$this->pageTitle=Yii::app()->name.' Admin Registro aspirante';

$this->breadcrumbs=array(
	'Registro de aspirantes'=>array('index'),
	$model->student->NAME,
);

$this->menu=array(
	array('label'=>'Índice', 'url'=>array('admin')),
	array('label'=>'Actualizar registro', 'url'=>array('update', 'courseId'=>$model->COURSE_ID, 'studentId'=>$model->STUDENT_ID,)),
	array('label'=>'Borrar registro', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','courseId'=>$model->COURSE_ID, 'studentId'=>$model->STUDENT_ID,),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>Aspirante</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=> $model->student,
	'attributes'=>array(
		'ID',
		'NAME',
		'EMAIL',		
		'PHONE',
		'ADDRESS',
		
	),
)); ?>

<h1>Curso deseado</h1>

<?php if (isset($model->course)):?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=> $model->course,
	'attributes'=>array(
		'ID',
		'NAME',
		'DESCRIPTION',
		'PUBLISHED_PRICE',
		'RANKING',
		'STATUS',
	),
)); ?>

<?php else:?>

<p>No asignado</p>

<?php endif;?>

<h1>Detalle registro</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=> $model,
	'attributes'=>array(
		'DATE_JOINED',
		'COMMENT',	
		'STATUS',
	),
)); ?>
