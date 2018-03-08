<?php

$this->pageTitle=Yii::app()->name.' Admin Cursos';

$this->breadcrumbs=array(
	'Courses'=>array('index'),
	'Manage',
);

$this->menu=array(

	array('label'=>'Crear curso','url'=>array('create')),
);


$this->help = array(	array('label'=>'Curso','content'=>'Puede crear un curso para que sea visualizado en el portal de inicio.'),
		
		array('label'=>'Crear curso','content'=>'Para crear un curso hacer clic en: <b>Opciones > Crear curso</b>'),
		
		array('label'=>'Requisito','content'=>'Debe generar primero un item con el tipo de jerarquía <b>curso</b> en la parte de <a href="'.Yii::app()->createUrl('mentoringHyerarchy/admin').'"> Organización </a> <b> > <a href="'.Yii::app()->createUrl('mentoringHyerarchy/create').'"> Crear nuevo</a> </b>')
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('course-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h2>Administración de cursos.</h2>

<p>
Administrar los cursos que imparte la empresa
</p>


<?php $this->widget('zii.widgets.grid.CGridView',array(
	'id'=>'course-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ID',
		
		'NAME',
		array(
		'name'=>'HIERARCHY_ID',
		'value'=>'($data->hIERARCHY)?$data->hIERARCHY->NAME:"-- no asignado --"',
		),
		//'DESCRIPTION',
		'ALIAS',
		//'CONTENT',
		/*
		'STATUS',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
