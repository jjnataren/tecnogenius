<?php

$this->pageTitle=Yii::app()->name.' Admin Registro aspirante';

$this->breadcrumbs=array(
	'Registros'=>array('index'),
	'Administrar',
);

$this->menu=array(
	//array('label'=>'Nuevo registro', 'url'=>array('index')),
	
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('product-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h2>Registro de alumnos.</h2>

<p>
También puede escribir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al inicio de cada uno de los valores de búsqueda para especificar cómo se debe hacer la comparación.
</p>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'product-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
			array(
					'name'=>'DATE_JOINED',
					'value'=>'$data->DATE_JOINED',
					'htmlOptions'=>array('width'=>'80px'),
			),
		array(
			'name'=>'STUDENT_ID',
			'header'=>'ID',
			'value'=>'$data->STUDENT_ID',
			'htmlOptions'=>array('width'=>'30px'),
		),
		
		array(            // display 'author.username' using an expression
			'name'=>'student_search',
			'value'=>'$data->student->NAME',
			
		),
		array(            // display 'author.username' using an expression
		'name'=>'student_email',
		'value'=>'$data->student->EMAIL',
		'header'=>'Email',
		'filter'=>false		
		),
		array(            // display 'author.username' using an expression
		'name'=>'student_phone',
		'value'=>'$data->student->PHONE',
		'header'=>'Telefono',
		'filter'=>false
		),
		array(
			'name'=>'COURSE_ID',
			'value'=>'$data->COURSE_ID',
			'htmlOptions'=>array('width'=>'40px'),
		),
		array(            // display 'author.username' using an expression
				'name'=>'course_search',
				'value'=>'isset($data->course->NAME)? $data->course->NAME : "-- sin asignar --" ',
			
			),
		array(
		'name'=>'STATUS',
		'value'=>array($this, 'gridRegistrationState'),
		'htmlOptions'=>array('width'=>'40px'),
),
/*
array(
		'name'=>'COMMENT',
		'value'=>'$data->COMMENT',
		'filter'=>false
),*/


		
		array(
			'class'=>'CButtonColumn',
			'header'=>'Opción',
			'template' => '{view}{update}{delete}{sell}',
			'buttons'=>array(
							'sell' => array(
						'label'=>'<span class="glyphicon glyphicon-barcode" />',
						'visible'=>'true',
						//'imageUrl'=>false,
						//'imageUrl'=>Yii::app()->request->baseUrl.'/images/email.png',
						'url'=>'Yii::app()->createUrl("customerPurchase/create", array("courseId"=>$data->COURSE_ID, "studentId"=>$data->STUDENT_ID),"Vender")',
									
											),
						'update'=> array(
								'url'=>'Yii::app()->createUrl("registration/update", array("courseId"=>$data->COURSE_ID, "studentId"=>$data->STUDENT_ID))',
						),
						'view'=> array(
								'url'=>'Yii::app()->createUrl("registration/view", array("courseId"=>$data->COURSE_ID, "studentId"=>$data->STUDENT_ID))',
						),
						'delete'=> array(
						'url'=>'Yii::app()->createUrl("registration/delete", array("courseId"=>$data->COURSE_ID, "studentId"=>$data->STUDENT_ID))',
),



			
			),
			'htmlOptions'=>array('width'=>'90px'),
		),
	),
)); ?>
