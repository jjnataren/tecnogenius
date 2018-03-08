<?php
$this->pageTitle=Yii::app()->name.' Admin orden de compra';

$this->breadcrumbs=array(
	'Customer Purchases'=>array('index'),
	'Manage',
);

$this->menu=array(
	
	array('label'=>'Nueva orden de compra', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('customer-purchase-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h2>Administración ordenes de compra.</h2>

<p>
También puede escribir un operador de comparación  (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>)al inicio de cada uno de los valores de búsqueda para especificar cómo se debe hacer la comparación. 
</p>

<?php echo CHtml::link('Búsqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'customer-purchase-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ID',
		'PRODUCT_ID',
		'PURCHASE_DATE',
		'PRICE_CUSTOMER_PAID',
		'CUSTOMER_ID',
		'SALE_PROMOTION_ID',
		
		/*
		'ANOTHER_DETAIL',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
