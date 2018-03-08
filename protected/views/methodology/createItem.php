<?php
/* @var $this MethodologyController */
/* @var $model Methodology */

$this->breadcrumbs=array(
	'Methodologies'=>array('index'),
	'Create',
);

$this->menu=array(

	array('label'=>'Administrar items', 'url'=>array('manageItems',array('id'=>$model->ID))),
);
?>

<div class="row">
			 
		<div class="col-md-12">
				
			<div class="panel">
					
				<div class="panel-body">
					<h2>Crear item</h2>	
					<p class="text text-info">
						Crear nuevo item asociado a la metodología.
						
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