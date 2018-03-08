

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'mentoring-hyerarchy-form',
	'enableAjaxValidation'=>false,
)); ?>

	 	
	
	<div class="row">
		<p class="text text-warning text-right">
			Los campos con: <span class="required">(*)</span> son requeridos.
		</p>

	
	<div class="col-md-12">
	
	   <div class="panel <?php echo ($model->isNewRecord)? 'panel-primary': 'panel-warning';?>">
			<div class="panel-heading">
				 <h3 class="panel-title"><span class="glyphicon glyphicon-align-justify"></span>&nbsp;&nbsp;<?php echo ($model->isNewRecord)? 'Crear nuevo item': 'Actualizar item';?></h3>
	
			</div>
	    <div class="panel-body">
	
	
	
	
	
	<div class="panel panel-danger">
	<?php echo $form->errorSummary($model); ?>
	</div>

	
	<div class="form-group">
		<?php echo $form->labelEx($model,'STAFF_ID'); ?>
		<?php echo $form->dropDownList($model, 'STAFF_ID',CHtml::listData(Staff::model()->findAll(),'ID','NAME'), array('class'=>'form-control')); ?>
	    <?php echo $form->error($model,'STAFF_ID',array('class'=>'text-danger')); ?>	
			
			</div>
			
	<div class="form-group">
	<?php //echo $form->textFieldRow($model,'LEVEL_NUMBER',array('class'=>'form-control')); ?>
	
	<?php echo CHtml::label("Jerarquía",'') ?>
	
	 <?php  echo CHtml::dropDownList('MentoringHyerarchy[LEVEL_NUMBER]',$model->LEVEL_NUMBER, 
  CHtml::listData(HierarchyLevel::model()->findAllBySql('select * from tbl_hierarchy_level where level_number <> 0'),'LEVEL_NUMBER','NAME'),
   array(
    'prompt'=>'Seleccione',
   	'class'=>'form-control',	
    'ajax' => array(
    'type'=>'POST', 
    'url'=>Yii::app()->createUrl('mentoringHyerarchy/getParents'), //or $this->createUrl('loadcities') if '$this' extends CController
    'update'=>'#MentoringHyerarchy_PARENT_ID', //or 'success' => 'function(data){...handle the data in the way you want...}',
  'data'=>array('level_id'=>'js:this.value'),
  ))); ?>
	
	</div>
	
	<div class="form-group">
	<?php //echo  $form->textFieldRow($model,'PARENT_ID',array('class'=>'form-control')); ?>
	<?php echo $form->dropDownListRow($model, 'PARENT_ID',$model->isNewRecord?array():isset($model->pARENT)?CHtml::listData(array($model->pARENT),'ID','NAME') : array(), array('class'=>'form-control','prompt'=>'Seleccione')); ?>
		
	</div>
	
<div class="form-group">
		<?php echo $form->labelEx($model,'NAME'); ?>
		<?php echo $form->textField($model,'NAME',array('class'=>'form-control', 'size'=>60,'maxlength'=>300, 'placeholder'=>'')); ?>
	    <?php echo $form->error($model,'NAME',array('class'=>'text-danger')); ?>	
			</div>
			
<div class="form-group">
	<?php echo $form->textAreaRow($model,'DESCRIPTION',array('class'=>'form-control','maxlength'=>300)); ?>
</div>
	
	</div>
	</div>
	</div>
	</div>
	
	
	 <div class="row">
		 
			<div class="col-md-12">
			
			<div class="panel panel-default">
		
		<div class="panel-body">	
				<button type="submit" class="btn btn-success btn-lg"><?php echo ($model->isNewRecord)? 'Crear': 'Guardar';?></button>
			</div>	
		</div>
		</div>	
	</div>
<?php $this->endWidget(); ?>
