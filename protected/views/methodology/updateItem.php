<?php
/* @var $this MethodologyController */
/* @var $model Methodology */

$this->breadcrumbs=array(
	'Methodologies'=>array('index'),
	$model->NAME=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'Administrar items', 'url'=>array('manageItems','id'=>$model->ID)),	
	array('label'=>'Documentos', 'url'=>array('manageDocuments','id'=>$modelItem->ID)),
	
	
);
?>




<div class="row">
			 
		<div class="col-md-12">
				
			<div class="panel">
					
				<div class="panel-body">
				<h1>Actualizar item Id <?php echo $model->ID; ?></h1>
					<p class="text text-info">
						Actualizacion de item asociado a la metodología: <strong><?=$model->NAME ?></strong>
						
						<?php $this->widget('zii.widgets.CDetailView', array(
							'data'=>$model,
							'attributes'=>array(
								'ID',
								'NAME',
								'RESUME',
								'DESCRIPTION',
								'ALIAS',
							),
						)); ?>
						
					</p>
				</div>	
			</div>
		</div>	
</div>
	

<?php $this->renderPartial('_formItem', array('model'=>$model,'modelItem'=>$modelItem)); ?>