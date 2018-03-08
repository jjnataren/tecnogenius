<?php

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

<p>
También puede escribir un operador de comparación  (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) al inicio de cada uno de los valores de búsqueda para especificar cómo se debe hacer la comparación.
</p>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'course-grid',
	'selectableRows' => 1,
	'ajaxUrl' => $this->createUrl('customerPurchase/searchCustomer'),
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'ID',
			'value'=>'CHtml::ajaxLink($data->ID, Yii::app()->createUrl("course/select", array("id"=>$data->ID) ), array("update"=>"#CourseDiv"), $htmlOptions=array ("id"=>"btc_".$data->ID) )',				
			'htmlOptions'=>array('width'=>'80px'),
			'type'=>'raw',						
			),
		array(
			'name'=>'NAME',
			'value'=>'$data->NAME',
			'htmlOptions'=>array('width'=>'180px'),
		),
		array(
				'name'=>'HIERARCHY_ID',
				'value'=>'$data->HIERARCHY_ID',
				'htmlOptions'=>array('width'=>'180px'),
		),
		array(
		'name'=>'PUBLISHED_PRICE',
		'value'=>'$data->PUBLISHED_PRICE',
		'htmlOptions'=>array('width'=>'180px'),
		),
		
	),
)); ?>

<script type="text/javascript">
    function updateABlock(data) {
 
    //    var keyId = $.fn.yiiGridView.getSelection(grid_id);
     //   keyId  = keyId[0]; //above function returns an array with single item, so get the value of the first item
			
        //$('#customerDiv').html(data);
    /*    $.ajax({
            url: '<?php echo $this->createUrl('PartUpdate'); ?>',
            data: {id: keyId},
            type: 'GET',
            success: function(data) {
                $('#part-block').html(data);
            }
        });*/
    }
</script>
