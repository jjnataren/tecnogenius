<?php
$this->breadcrumbs=array(
	'Hierarchy Levels'=>array('index'),
	'Create',
);

$this->menu=array(
	
	array('label'=>'Administrar jerarquias','url'=>array('admin')),
);
?>

<div class="row">
			 
		<div class="col-md-12">
				
			<div class="panel">
					
				<div class="panel-body">
					<h2>Crear jerarquía</h2>	
					<p class="help-block">
						Crear una nueva jerarquía.
					</p>
				</div>	
			</div>
		</div>	
</div>





<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>