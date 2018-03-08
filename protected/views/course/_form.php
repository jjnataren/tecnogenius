<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'course-form',
	'enableAjaxValidation'=>false,
)); ?>


	
	
<div class="row">
<p class="text text-warning text-right">
			Los campos con: <span class="required">(*)</span> son requeridos.
		</p>

	<div class="col-md-12">
	
	<div class="panel <?php echo ($model->isNewRecord)? 'panel-primary': 'panel-warning';?>">
			<div class="panel-heading">
				 <h3 class="panel-title"><span class="glyphicon glyphicon-bookmark"></span>&nbsp;&nbsp;<?php echo ($model->isNewRecord)? 'Curso': 'Curso';?></h3>
	
			</div>
	<div class="panel-body">
	

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
	<label>Tecnología y sub tecnología</label>
	<?php 
	
	$courseOriginalId = ( $model->HIERARCHY_ID > 0 ) ? $model->HIERARCHY_ID : -1;
	
	echo $form->dropDownList($model, 'HIERARCHY_ID',
			CHtml::listData(MentoringHyerarchy::model()->findAllBySql(
				'SELECT child.ID, CONCAT(parent.name, \' - \',child.name) as NAME FROM tbl_mentoring_hyerarchy child 
					inner join tbl_mentoring_hyerarchy parent on child.PARENT_ID = parent.ID  WHERE child.LEVEL_NUMBER = 1000   and child.ID  not in (select HIERARCHY_ID from tbl_course where STATUS = 1 and HIERARCHY_ID IS NOT NULL AND HIERARCHY_ID <> '. $courseOriginalId .'  ) order by 2 asc;'),'ID','NAME'), array('class'=>'form-control')); ?>
	<?php echo $form->error($model,'HIERARCHY_ID',array('class'=>'text-danger')); ?>
	</div>
	
	<div class="form-group">
	
	<?php echo $form->labelEx($model,'NAME'); ?>
    <?php echo $form->textField($model,'NAME',array('class'=>'form-control', 'size'=>60,'maxlength'=>300, 'placeholder'=>'Nombre del curso ')); ?>
     <?php echo $form->error($model,'NAME',array('class'=>'text-danger')); ?>	
	</div>
	
    
    <div class="form-group">	
    <?php echo $form->labelEx($model,'PUBLISHED_PRICE'); ?>
	<div class="input-group">
	 <span class="input-group-addon">$</span>
	 	<?php echo $form->textField($model,'PUBLISHED_PRICE',array( 'class'=>'form-control','size'=>60,'maxlength'=>300, 'placeholder'=>' Precio sugerido')); ?>
	</div>
    </div>  
    
	<div class="form-group">
	<?php echo $form->textAreaRow($model,'RESUME',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
	</div>
	
	<div class="form-group">
	
	<?php echo $form->textAreaRow($model,'PROFILE',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
	</div>
	
	<div class="form-group">
	<?php  echo $form->textAreaRow($model,'DESCRIPTION',array('rows'=>10, 'cols'=>50, 'class'=>'form-control')); ?>
    </div>
    
    <div class="form-group">
	<?php echo $form->labelEx($model,'ALIAS'); ?>
    <?php echo $form->textField($model,'ALIAS',array('class'=>'form-control', 'size'=>60,'maxlength'=>300, 'placeholder'=>'Alias del curso ')); ?>
    <?php echo $form->error($model,'ALIAS',array('class'=>'text-danger')); ?>	
	</div>		
			
			
	<div class="form-group">
	<?php echo $form->labelEx($model,'CONTENT'); ?>
	
	<?php  $this->widget('ext.editMe.widgets.ExtEditMe', array(
    'model'=>$model,
    'attribute'=>'CONTENT',
    //'optionName'=>'optionValue',
	'ckeConfig'=>array('extraAllowedContent' => 'pre(*)'),
	));
	?>
	</div>
	
	<div class="form-group">
	<?php echo $form->dropDownListRow($model, 'STATUS',array('1'=>'Disponible', '2'=>'No disponible'), array('class'=>'form-control')); ?>
    </div>
    
    
	<div class="form-group">
	<label>Ranking</label>
	<div class="checkbox">
	<?php echo $form->radioButtonList($model, 'RANKING',array(1=>'Normal',2=>'Interesante',3=>'Reelevante', 4=>'Muy irrelevante', 5=>'TOP')); ?>
	</div>
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
