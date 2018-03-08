<?php
$this->pageTitle=Yii::app()->name.' Admin clasificadores';

$this->breadcrumbs=array(
	'Mentoring Hyerarchies'=>array('index'),
	'Manage',
);

$this->menu=array(
	
	array('label'=>'Crear nuevo item','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('mentoring-hyerarchy-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h2>Administrar items.  </h2>



<?php echo CHtml::link('Búsqueda avanzada','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView',array(
	'id'=>'mentoring-hyerarchy-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'ID',
		'NAME',
		//array('name'=>'STAFF_ID', 'value'=>'$data->sTAFF->NAME'),
	
		array('name'=>'LEVEL_NUMBER', 'value'=>'$data->lEVELNUMBER->NAME'),
		array('name'=>'PARENT_ID', 'value'=>'$data->pARENT->NAME'),
		//'STAFF_ID',
		//'LEVEL_NUMBER',
		//'PARENT_ID',
		
		//array('name'=>'STATUS','value'=>'($data->STATUS == 0)?"No disponible" : "Disponible"'),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>



<?php 

$technologies = MentoringHyerarchy::model()->findAllByAttributes(array('LEVEL_NUMBER'=>array(10,20)));
?>






<h2>Organización</h2>


<div class="table-responsive">
	
	<br />
	
	<table class="table">
		<thead>
		<tr>
			<td align="center"><h3>Empresa</h3></td>
		</tr>	
		</thead>
		<tr>
			<?php makeHyerarchy($technologies)?>
		</tr>
		
	</table>
	
	
</div>

<?php 



 function makeHyerarchy($hyerarchies) {

 	echo '
 	
			<table class="table">
 	
				<tr>';
 	
	foreach ($hyerarchies as $hierarchy){
		
		echo '
	
					<td align="center"><strong>'.$hierarchy->NAME.'</strong>
						<br />
						<small>['.$hierarchy->lEVELNUMBER->NAME.']</small>
						<br />';
		
			
							makeHyerarchy($hierarchy->mentoringHyerarchies);	
		
			
		echo '</td>';
	}
	
	echo '</tr></table>';

	return ;
}


?>