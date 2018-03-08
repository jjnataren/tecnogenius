<?php
$this->breadcrumbs=array(
	'Customer Purchases'=>array('index'),
	$model->ID,
);

$this->menu=array(
	array('label'=>'Administar ordenes de compra', 'url'=>array('admin')),
	array('label'=>'Crear orden de compra', 'url'=>array('create')),
	array('label'=>'Actualizar orden de compra', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Borrar orden de compra', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<h1>Orden de compra Id <?php echo $model->ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'SALE_PROMOTION_ID',
		'CUSTOMER_ID',
		'PRODUCT_ID',
		'PURCHASE_DATE',
		'PRICE_CUSTOMER_PAID',
		'ANOTHER_DETAIL',
	),
)); ?>
