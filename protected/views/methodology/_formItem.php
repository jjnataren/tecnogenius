<?php
/* @var $this MethodologyController */
/* @var $model Methodology */
/* @var $form CActiveForm */
?>



<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'methodology-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>




	<div class="row">
		<p class="text text-warning text-right">
			Los campos con: <span class="required">(*)</span> son requeridos.
		</p>

	
	<div class="col-md-12">
	
	   <div class="panel <?php echo ($modelItem->isNewRecord)? 'panel-primary': 'panel-warning';?>">
			<div class="panel-heading">
				 <h3 class="panel-title"><span class="glyphicon glyphicon-road"></span>&nbsp;&nbsp;<?php echo ($modelItem->isNewRecord)? 'Crear item': 'Actualizar item';?></h3>
	
			</div>
	    <div class="panel-body">
	
	
	
	<?php echo $form->errorSummary($modelItem); ?>

		
		<div class="form-group">	
		<?php echo $form->labelEx($modelItem,'NAME'); ?>
		<?php echo $form->textField($modelItem,'NAME',array('class'=>'form-control', 'size'=>60,'maxlength'=>300, 'placeholder'=>' Nombre item')); ?>
	    <?php echo $form->error($modelItem,'NAME',array('class'=>'text-danger')); ?>	
	    </div>  
	

	<div class="form-group">
		<?php echo $form->labelEx($modelItem,'RESUME'); ?>
	    <?php echo $form->textArea($modelItem,'RESUME',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
	    <?php echo $form->error($modelItem,'RESUME'); ?>
	</div>
	
	

	<div class="form-group">
		<?php echo $form->labelEx($modelItem,'DESCRIPTION'); ?>
	<?php echo $form->textArea($modelItem,'DESCRIPTION',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
				<?php echo $form->error($modelItem,'DESCRIPTION'); ?>
	</div>

	

	<div class="form-group">	
		<?php echo $form->labelEx($modelItem,'ALIAS'); ?>
		<?php echo $form->textField($modelItem,'ALIAS',array('class'=>'form-control', 'size'=>60,'maxlength'=>300, 'placeholder'=>'Alias del item')); ?>
	    <?php echo $form->error($modelItem,'ALIAS',array('class'=>'text-danger')); ?>	
	    </div>  
	
	 
	<div class="form-group">	
    <?php echo $form->labelEx($modelItem,'RANK'); ?>
	<div class="input-group">
	 <span class="input-group-addon">#</span>
	 	<?php echo $form->textField($modelItem,'RANK',array( 'class'=>'form-control','size'=>60,'maxlength'=>300, 'placeholder'=>' Nivel de ordenamiento')); ?>
	</div>
    </div>
    
   
	<div class="form-group">
	<?php echo $form->labelEx($modelItem,'STATUS'); ?>
	<?php echo $form->dropDownList($modelItem, 'STATUS',array('1'=>'Disponible', '2'=>'No disponible'), array('class'=>'form-control')); ?>
    </div>
	
	

	</div>
	</div>
	</div>
	
	
		 
			<div class="col-md-12">
			
			<div class="panel panel-default">
		
			<div class="panel-body">	
				<button type="submit" class="btn btn-success btn-lg"><?php echo ($modelItem->isNewRecord)? 'Crear': 'Guardar';?></button>
			</div>	
			</div>
			</div>
	</div>
<?php $this->endWidget(); ?>
	