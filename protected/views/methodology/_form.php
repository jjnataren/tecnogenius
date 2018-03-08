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
	
	   <div class="panel <?php echo ($model->isNewRecord)? 'panel-primary': 'panel-warning';?>">
			<div class="panel-heading">
				 <h3 class="panel-title"><span class="glyphicon glyphicon-road"></span>&nbsp;&nbsp;<?php echo ($model->isNewRecord)? 'Crear metodología': 'Actualizar metodología';?></h3>
	
			</div>
	    <div class="panel-body">
	
	
	
	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
	<label>Metodología base</label>
		<?php echo $form->dropDownList($model, 'HIERARCHY_ID',CHtml::listData(MentoringHyerarchy::model()->findAllBySql(
				'select ID, NAME from tbl_mentoring_hyerarchy where LEVEL_NUMBER = 20 
				and ID not in (select hierarchy_id from tbl_methodology )'),'ID','NAME'), array('class'=>'form-control','prompt'=>'-- Seleccione --')); ?>
		<?php echo $form->error($model,'HIERARCHY_ID',array('class'=>'text-danger')); ?>
	</div>

<!-- 
	<div class="form-group">
		<?php echo $form->labelEx($model,'PARENT_ID'); ?>
		<?php echo $form->dropDownList($model, 'PARENT_ID',CHtml::listData(Methodology::model()->findAll('PARENT_ID is null'),'ID','NAME'), array('class'=>'form-control','prompt'=>'ROOT')); ?>
		<?php echo $form->error($model,'PARENT_ID'); ?>
	</div>
 -->

		
		<div class="form-group">	
		<?php echo $form->labelEx($model,'NAME'); ?>
		<?php echo $form->textField($model,'NAME',array('class'=>'form-control', 'size'=>60,'maxlength'=>300, 'placeholder'=>' Nombre metodología')); ?>
	    <?php echo $form->error($model,'NAME',array('class'=>'text-danger')); ?>	
	    </div>  
	

	<div class="form-group">
		<?php echo $form->labelEx($model,'RESUME'); ?>
	    <?php echo $form->textArea($model,'RESUME',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
	    <?php echo $form->error($model,'RESUME'); ?>
	</div>
	
	

	<div class="form-group">
		<?php echo $form->labelEx($model,'DESCRIPTION'); ?>
	<?php echo $form->textArea($model,'DESCRIPTION',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
				<?php echo $form->error($model,'DESCRIPTION'); ?>
	</div>

	

	<div class="form-group">	
		<?php echo $form->labelEx($model,'ALIAS'); ?>
		<?php echo $form->textField($model,'ALIAS',array('class'=>'form-control', 'size'=>60,'maxlength'=>300, 'placeholder'=>' Nombre metodología')); ?>
	    <?php echo $form->error($model,'ALIAS',array('class'=>'text-danger')); ?>	
	    </div>  
	
	 
	<div class="form-group">	
    <?php echo $form->labelEx($model,'RANK'); ?>
	<div class="input-group">
	 <span class="input-group-addon">#</span>
	 	<?php echo $form->textField($model,'RANK',array( 'class'=>'form-control','size'=>60,'maxlength'=>300, 'placeholder'=>' Nivel de ordenamiento')); ?>
	</div>
    </div>
    
   
	<div class="form-group">
	<?php echo $form->labelEx($model,'STATUS'); ?>
	<?php echo $form->dropDownList($model, 'STATUS',array('1'=>'Disponible', '2'=>'No disponible'), array('class'=>'form-control')); ?>
    </div>
	
	

	</div>
	</div>
	</div>
	
	
		 
			<div class="col-md-12">
			
			<div class="panel panel-default">
		
			<div class="panel-body">	
				<button type="submit" class="btn btn-success btn-lg"><?php echo ($model->isNewRecord)? 'Crear': 'Guardar';?></button>
			</div>	
			</div>
			</div>
	</div>
<?php $this->endWidget(); ?>
	