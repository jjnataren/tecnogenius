<?php
$this->breadcrumbs=array(
	'Mentoring Hyerarchies'=>array('index'),
	$model->NAME,
);

$this->menu=array(
	array('label'=>'Administrar items','url'=>array('admin')),
	array('label'=>'Crear item','url'=>array('create')),
	array('label'=>'Actualizar item','url'=>array('update','id'=>$model->ID)),
	array('label'=>'Documentos','url'=>array('manageDocuments','id'=>$model->ID)),
	array('label'=>'Borrar item','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>Ver item  <?php echo $model->ID; ?></h1>




<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
			'ID',
			'NAME',
			array('label'=>'Encargado', 'value'=>($model->sTAFF)?$model->sTAFF->NAME:''),
			array('label'=>'Jerarquía', 'value'=>($model->lEVELNUMBER)?$model->lEVELNUMBER->NAME:''),
			array('label'=>'Jerarquía padre', 'value'=>($model->pARENT)?$model->pARENT->NAME:''),
	
	
		array('label'=>'Estatus', 'value'=>($model->STATUS)?'Activo':'Inactivo'),
	),
)); ?>

<h2>Distribución</h2>


<div class="table-responsive">
	
	<br />
	
	<table class="table">
		<thead>
		<tr>
			<td align="center"><h4><?= $model->pARENT->NAME;?></h4>
			<small>[<?= ($model->pARENT->lEVELNUMBER)?$model->pARENT->lEVELNUMBER->NAME : ''  ?>]</small>
			</td>
		</tr>	
		</thead>
		<tr>
			<td align="center" >
			<h3 class="text text-primary"><?= $model->NAME; ?>
				</h3>
				<small>[<?= ($model->lEVELNUMBER)?$model->lEVELNUMBER->NAME : ''  ?>]</small>
				
				<?php makeHyerarchy($model->mentoringHyerarchies);?>			
			</td>
		</tr>
		
	</table>
	
	
</div>

<?php 



 function makeHyerarchy($hyerarchies) {

	
	foreach ($hyerarchies as $hierarchy){
		
		echo '
		
			<table class="table">
				<tr>
					<td align="center"><strong>'.$hierarchy->NAME.'</strong>
						<br />
						<small>['.$hierarchy->lEVELNUMBER->NAME.']</small>
						<br />';
			
							makeHyerarchy($hierarchy->mentoringHyerarchies);	
			
		echo '			</td>
				</tr>
				
			</table>
		
		';
	}

	return ;
}


?>
