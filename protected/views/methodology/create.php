<?php
/* @var $this MethodologyController */
/* @var $model Methodology */

$this->breadcrumbs=array(
	'Methodologies'=>array('index'),
	'Create',
);

$this->menu=array(

	array('label'=>'Administrar metodologías', 'url'=>array('admin')),
);
?>

<div class="row">
			 
		<div class="col-md-12">
				
			<div class="panel">
					
				<div class="panel-body">
					<h2>Crear metodología</h2>	
					<p class="help-block">
						Creación de nueva metodología de desarrollo.
					</p>
				</div>	
			</div>
		</div>	
</div>
	

<?php $this->renderPartial('_form', array('model'=>$model)); ?>