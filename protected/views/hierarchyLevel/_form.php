<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'hierarchy-level-form',
	'enableAjaxValidation'=>false,
		'htmlOptions'=>array('class'=>'form-horizonta'),
)); ?>

<div class="row">
	<p class="text text-warning text-right">
			Los campos con: <span class="required">(*)</span> son requeridos.
		</p>

	<div class="col-md-12 col-xs-12 col-sm-12">
	
	<div class="panel <?php echo ($model->isNewRecord)? 'panel-primary': 'panel-warning';?>">
			<div class="panel-heading">
				 <h3 class="panel-title"><span class="glyphicon glyphicon-tower"></span>&nbsp;&nbsp;<?php echo ($model->isNewRecord)? 'Crear jerarquía': 'Actualizar jerarquía';?></h3>
	
			</div>
	<div class="panel-body">
	
	<div class="panel panel-danger">
	<?php echo $form->errorSummary($model); ?>
	</div>
	
	
	
	 <div class="form-group">
		<?php echo $form->labelEx($model,'LEVEL_NUMBER'); ?>
		<?php echo $form->textField($model,'LEVEL_NUMBER',array('class'=>'form-control', 'size'=>60,'maxlength'=>300, 'placeholder'=>'Numero de nivel')); ?>
		<?php echo $form->error($model,'LEVEL_NUMBER',array('class'=>'text-danger')); ?>
			</div>
		
		<div class="form-group">	
		<?php echo $form->labelEx($model,'NAME'); ?>
		<?php echo $form->textField($model,'NAME',array('class'=>'form-control', 'size'=>60,'maxlength'=>300, 'placeholder'=>' Apelativo nivel')); ?>
	    <?php echo $form->error($model,'NAME',array('class'=>'text-danger')); ?>	
	    </div>
	    
	    <?php if(isset($model) && $model->LEVEL_NUMBER ==! 0): ?>
	    
	    <div class="form-group">
			<?php echo $form->labelEx($model,'PARENT'); ?>
			<?php echo $form->dropDownList($model, 'PARENT',CHtml::listData(HierarchyLevel::model()->findAll(),'LEVEL_NUMBER','NAME'), array('class'=>'form-control')); ?>
	    <?php echo $form->error($model,'PARENT',array('class'=>'text-danger')); ?>	
			
		</div>
	     
	    <?php endif;?>
	    <div class="form-group">
  	   <?php echo $form->textAreaRow($model,'DESCRIPTION',array('class'=>'form-control','maxlength'=>300)); ?>
  	   </div>
  	   
  	   </div>
</div>
</div>
</div>


 <div class="row">
		 
			<div class="col-md-10">
			
			<div class="panel panel-default">
		
		<div class="panel-body">	
				<button type="submit" class="btn btn-success"><?php echo ($model->isNewRecord)? 'Crear': 'Guardar';?></button>
			</div>	
		</div>
		</div>	
	</div>


<?php $this->endWidget(); ?>
