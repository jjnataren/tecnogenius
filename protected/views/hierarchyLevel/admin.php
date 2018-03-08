<?php
$this->breadcrumbs=array(
	'Hierarchy Levels'=>array('index'),
	'Manage',
);

$this->menu=array(
	
	array('label'=>'Crear jerarquía','url'=>array('create')),
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('hierarchy-level-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Clasifiacadores</h1>


<p class="text text-info">
	Los clasificadores definen como esta organizada la empresa.	
</p>



<?php echo CHtml::link('Búsqueda avanzada','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">

<div class="row">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView',array(
	'id'=>'hierarchy-level-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'LEVEL_NUMBER',
		'NAME',
		'DESCRIPTION',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>



<?php 

$orga = HierarchyLevel::model()->findByPk(0);

if (isset($orga)):

?>

<h2>Distribución</h2>


<div class="table-responsive">
	
	<br />
	
	<table class="table ">
		<thead>
		<tr>
			<td align="center"><strong><?=$orga->NAME?></strong></td>
		</tr>	
		</thead>
		<tbody>
		<tr>
			<?php makeHyerarchy($orga->hierarchyLevels)?>
		</tr>
		</tbody>
	</table>
	
	
</div>


<?php endif;?>

<?php 



 function makeHyerarchy($hyerarchies) {

 	echo '
 	
			<table class="table ">
 	
				<tr>';
 	
	foreach ($hyerarchies as $hierarchy){
		
		echo '
					<td align="center"><strong>'.$hierarchy->NAME.'</strong>';
			
							makeHyerarchy($hierarchy->hierarchyLevels);	
			
		echo '</td>';
	}
	
	echo '</tr></table>';

	return ;
}


?>

