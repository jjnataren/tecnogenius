<?php
$this->breadcrumbs=array(
	'Tutorials'=>array('index'),
	'Create',
);

$this->menu=array(
	
	array('label'=>'Administrar tutoriales', 'url'=>array('admin')),
);


$this->help = array(	

		array('label'=>'Requisito','content'=>'Debe generar primero un item con el tipo de jerarquía <b>Tutorial</b> en la parte de <a href="'.Yii::app()->createUrl('mentoringHyerarchy/admin').'"> Organización </a> <b> > <a href="'.Yii::app()->createUrl('mentoringHyerarchy/create').'"> Crear nuevo</a> </b>'),
		
		array('label'=>'Tip','content'=>'Si desea que el curso aparezca dentro de los mas leidos debera seleccionar la opción <b>TOP</b> del apartado <b> Clasificar </b>.')
		
		
);


?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->createAbsoluteUrl('').'/css/jqueryui/overcast/jquery-ui.css'); ?>




<div class="row">
			 
		<div class="col-md-12">
				
			<div class="panel">
					
				<div class="panel-body">
					<h2>Creación de  nuevo tutorial.</h2>	
					<p class="help-block">
						Crear un nuevo tutorial que pueda ser visualizado en el portal principal.
					</p>
				</div>	
			</div>
		</div>	
</div>



<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>