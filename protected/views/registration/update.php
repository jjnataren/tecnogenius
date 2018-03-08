<?php

$this->pageTitle=Yii::app()->name.' Admin Registro aspirante';

$this->breadcrumbs = array (
		'Registro aspirantes' => array (
				'index' 
		),
		$model->student->NAME => array (
				'view',
				'courseId' => $model->COURSE_ID,
				'studentId' => $model->STUDENT_ID 
		),
		'Update' 
);



$this->menu = array (
		array (
				'label' => 'Índice',
				'url' => array (
						'index' 
				) 
		),
		array (
				'label' => 'Ver detalle',
				'url' => array (
						'view',
						'courseId' => $model->COURSE_ID,
						'studentId' => $model->STUDENT_ID 
				) 
		) 
);
?>





<div class="row">
			 
		<div class="col-md-12">
				
			<div class="panel">
					
				<div class="panel-body">
					<h2>Actualizar registro de aspirante.</h2>	
					<p class="help-block">
						Modificar información del aspirante.
					</p>
				</div>	
			</div>
		</div>	
</div>
	
	
	<?php
	
	$form = $this->beginWidget ( 'bootstrap.widgets.TbActiveForm', array (
			'id' => 'course-form',
			'enableAjaxValidation' => false 
	) );
	?>
	
	
<div class="row">

	<p class="text text-warning text-right">
		Los campos con: <span class="required">(*)</span> son requeridos.
	</p>
	<div class="col-md-6">
	
	<div class="panel panel-primary">
			<div class="panel-heading">
				 <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Aspirante</h3>
	
			</div>
	<div class="panel-body">
	
		
	<?php echo $form->errorSummary($model); ?>
	
		<?php //echo $form->textFieldRow($model,'HIERARCHY_ID',array('class'=>'form-control')); ?>
	<div class="form-group">
	
					<?php echo $form->labelEx($model->student,'NAME'); ?>
					<?php echo $form->textField($model->student,'NAME',array('class'=>'form-control', 'size'=>60,'maxlength'=>300, 'placeholder'=>'Nombre del curso ')); ?>
				    <?php echo $form->error($model->student,'NAME',array('class'=>'text-danger')); ?>	
	</div>
	 	<div class="form-group">						
					<?php echo $form->labelEx($model->student,'EMAIL'); ?>
					<?php echo $form->textField($model->student,'EMAIL',array('class'=>'form-control', 'size'=>60,'maxlength'=>300, 'placeholder'=>'')); ?>
				    <?php echo $form->error($model->student,'EMAIL',array('class'=>'text-danger')); ?>	
		</div>
		<div class="form-group">				
					<?php echo $form->labelEx($model->student,'PHONE'); ?>
					<?php echo $form->textField($model->student,'PHONE',array('class'=>'form-control', 'size'=>60,'maxlength'=>300, 'placeholder'=>' ')); ?>
				    <?php echo $form->error($model->student,'PHONE',array('class'=>'text-danger')); ?>	
		</div>
		<div class="form-group">				
					<?php echo $form->labelEx($model->student,'ADDRESS'); ?>
					<?php echo $form->textField($model->student,'ADDRESS',array('class'=>'form-control', 'size'=>60,'maxlength'=>300, 'placeholder'=>'')); ?>
				    <?php echo $form->error($model->student,'ADDRESS',array('class'=>'text-danger')); ?>					
	
			</div>			
		</div>
	</div>
	</div>
	
	<div class="col-md-6">
	
	<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Detalles del registro</h3>
	
			</div>
			<div class="panel-body">	
				
				<div class="form-group">
					<?php echo $form->labelEx($model,'STATUS'); ?>
					 <?php echo $form->dropDownList($model, 'STATUS',$model->getAStatus(), array('class'=>'form-control')); ?>
				 <?php echo $form->error($model,'STATUS',array('class'=>'text-danger')); ?>
				 </div>
				<div class="form-group">				 
					<?php echo $form->labelEx($model,'COMMENT'); ?>
					<?php echo $form->textArea($model,'COMMENT',array('class'=>'form-control', 'size'=>60,'maxlength'=>300, 'placeholder'=>'Nombre del curso ')); ?>
				    <?php echo $form->error($model,'COMMENT',array('class'=>'text-danger')); ?>					
				</div>
				<div class="form-group">
					 <label>Curso deseado</label>
					 <?php if (isset($model->course) ):?>
					 
					<?php echo $form->textField($model->course,'NAME',array('class'=>'form-control','readonly'=>'readonly', 'size'=>60,'maxlength'=>300, 'placeholder'=>'Nombre del curso ')); ?>
				    <?php echo $form->error($model->course,'NAME',array('class'=>'text-danger')); ?>

					<?php else:?>
				    
				    
				    	<p>No asignado</p>
				    	
				     <?php endif;?>
				    					
				</div>	
				
	</div>
	</div>			
				
	
	</div>

</div>



	 <div class="row">
		 
			<div class="col-md-12">
			
			<div class="panel panel-default">
		
		<div class="panel-body">	
				<button type="submit" class="btn btn-success"><?php echo ($model->isNewRecord)? 'Crear': 'Guardar';?></button>
			</div>	
		</div>
		</div>	
	</div>

<?php $this->endWidget(); ?>
