<?php
$this->pageTitle=Yii::app()->name.' Admin Cursos';
$this->breadcrumbs=array(
	'Courses'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'Lista cursos','url'=>array('index')),
	array('label'=>'Administrar Cursos','url'=>array('admin')),
);
?>



<div class="row">
			 
		<div class="col-md-12">
				
			<div class="panel">
					
				<div class="panel-body">
					<h2>Crear curso</h2>	
					<p class="help-block">
						Creación de un nuevo curso.
					</p>
				</div>	
			</div>
		</div>	
</div>
	

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>