<?php
$this->breadcrumbs=array(
	'Hierarchy Levels'=>array('index'),
	$model->NAME,
);

$this->menu=array(
	
	array('label'=>'Crear jerarquía','url'=>array('create')),
	array('label'=>'Actualizar jerarquía','url'=>array('update','id'=>$model->LEVEL_NUMBER)),
	array('label'=>'Borrar jerarquía','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->LEVEL_NUMBER),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar jerarquias ','url'=>array('admin')),
);
?>

<h1>Ver jerarquía  Id <?php echo $model->LEVEL_NUMBER; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'LEVEL_NUMBER',
		'NAME',
		'DESCRIPTION',
	),
)); ?>






<?php 


if (isset($model)):

?>

<h2>Distribución</h2>


<div class="table-responsive">
	
	<br />
	
	<table class="table table-bordered">
		<thead>
		<tr>
			<td align="center"><strong><?=$model->NAME?></strong></td>
		</tr>	
		</thead>
		<tbody>
		<tr>
			<?php makeHyerarchy($model->hierarchyLevels)?>
		</tr>
		</tbody>
	</table>
	
	
</div>


<?php endif;?>

<?php 



 function makeHyerarchy($hyerarchies) {

 	echo '
 	
			<table class="table table-bordered">
 	
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