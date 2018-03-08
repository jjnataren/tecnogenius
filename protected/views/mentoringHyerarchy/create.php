<?php
$this->pageTitle=Yii::app()->name.' Admin item';



$this->breadcrumbs=array(
	'Mentoring Hyerarchies'=>array('index'),
	'Create',
);

$this->menu=array(

	array('label'=>'Administrar  items','url'=>array('admin')),
);
?>

<div class="row">
			 
		<div class="col-md-12">
				
			<div class="panel">
					
				<div class="panel-body">
					<h2>Crear nuevo item</h2>	
					<p class="help-block">
						Crear un nuevo item.
					</p>
				</div>	
			</div>
		</div>	
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>