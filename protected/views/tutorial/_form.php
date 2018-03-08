

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tutorial-form',
	'enableAjaxValidation'=>false,
)); ?>
	
	
	<div class="row">
	<p class="text text-warning text-right">
			Los campos con: <span class="required">(*)</span> son requeridos.
		</p>
	
	<div class="col-md-12">
	
	<div class="panel <?php echo ($model->isNewRecord)? 'panel-primary': 'panel-warning';?>">
			<div class="panel-heading">
				 <h3 class="panel-title"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;<?php echo ($model->isNewRecord)? 'Crear tutorial': 'Actualizar tutorial';?></h3>
	
			</div>
	<div class="panel-body">
	

	<?php echo $form->errorSummary($model); ?>

	
	
	    <div class="form-group">
	    <?php echo $form->labelEx($model,'HIERARCHY_ID'); ?>
		<?php //echo $form->dropDownList($model, 'HIERARCHY_ID',CHtml::listData(MentoringHyerarchy::model()->findAllByAttributes(array('LEVEL_NUMBER'=>'2000')),'ID','NAME'), array('class'=>'form-control','prompt'=>'Seleccione tutorial base')); ?>
		
		<?php 	$courseOriginalId = ( $model->HIERARCHY_ID > 0 ) ? $model->HIERARCHY_ID : -1;
	
	echo $form->dropDownList($model, 'HIERARCHY_ID',
			CHtml::listData(MentoringHyerarchy::model()->findAllBySql(
				'SELECT child.ID, CONCAT(parent.name, \' - \',child.name) as NAME FROM tbl_mentoring_hyerarchy child 
					inner join tbl_mentoring_hyerarchy parent on child.PARENT_ID = parent.ID  WHERE child.LEVEL_NUMBER = 2000   and child.ID  not in (select HIERARCHY_ID from tbl_tutorial where STATUS = 1 and HIERARCHY_ID IS NOT NULL AND HIERARCHY_ID <> '. $courseOriginalId .'  ) order by 2 asc;'),'ID','NAME'), array('class'=>'form-control','prompt'=>'Seleccione')); ?>
	<?php echo $form->error($model,'HIERARCHY_ID',array('class'=>'text-danger')); ?>
		
	    </div>

        <div class="form-group">
		<?php echo $form->labelEx($model,'NAME'); ?>
		<?php echo $form->textField($model,'NAME',array('class'=>'form-control', 'size'=>60,'maxlength'=>300, 'placeholder'=>'  ')); ?>
	    <?php echo $form->error($model,'NAME',array('class'=>'text-danger')); ?>			
	    </div>
	
         <div class="form-group">
		 <?php echo $form->labelEx($model,'RESUME'); ?>
		 <?php  echo $form->textArea($model,'RESUME',array('rows'=>10, 'cols'=>50, 'class'=>'form-control')); ?>
	     <?php echo $form->error($model,'RESUME',array('class'=>'text-danger')); ?>
	     </div>

        
        <div class="form-group">
		<?php echo $form->labelEx($model,'DESCRIPTION'); ?>
		<?php  echo $form->textArea($model,'DESCRIPTION',array('rows'=>10, 'cols'=>50, 'class'=>'form-control')); ?>
	    <?php echo $form->error($model,'DESCRIPTION'); ?>
	    </div>

	     <div class="form-group">
		<?php echo $form->labelEx($model,'ALIAS'); ?>
		<?php echo $form->textField($model,'ALIAS',array('class'=>'form-control', 'size'=>60,'maxlength'=>300, 'placeholder'=>' ')); ?>
	    <?php echo $form->error($model,'ALIAS',array('class'=>'text-danger')); ?>	
	    </div>

<div class="form-group">

<label for="">Contenido del tutorial</label>
 <?php  $this->widget('ext.editMe.widgets.ExtEditMe', array(
    'model'=>$model,
    'attribute'=>'CONTENT',
    //'optionName'=>'optionValue',
    //'extraAllowedContent'=>'div(*)'
 		'ckeConfig'=>array('extraAllowedContent' => 'pre(*)'), //this change just allows <pre> elements 
	));
	?>
</div>

<br />





	    <div class="form-group">
    <?php echo $form->labelEx($model,'RANKING'); ?>
	<div class="checkbox">
	<?php echo $form->radioButtonList($model, 'RANKING',array(1=>'Normal',2=>'Interesante',3=>'Reelevante', 4=>'Muy irrelevante', 5=>'TOP')); ?>
	</div>
	</div>
		
		
		
		<div class="form-group">
		<?php echo $form->labelEx($model,'PUBLISHED_DATE'); ?>
		
		<?php
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				    'model' => $model,
				    'attribute' => 'PUBLISHED_DATE',
				'language' => 'es',
						'options' => array(
						'showOn' => 'both',             // also opens with a button
						'dateFormat' => 'yy-mm-dd',     // format of "2012-12-25"
						'showOtherMonths' => true,      // show dates in other months
						'selectOtherMonths' => true,    // can seelect dates in other months
						'changeYear' => true,           // can change year
						'changeMonth' => true,          // can change month
						'yearRange' => '2013:2050',     // range of year
						'minDate' => '2013-01-01',      // minimum date
						'maxDate' => '2099-12-31',      // maximum date
						'showButtonPanel' => true,      // show button panel
				),
				    'htmlOptions' => array(
				        'size' => '10',         // textField size
				        'maxlength' => '10',    // textField maxlength
						'class'=>'form-control'
				    ),
				));?>
		<?php echo $form->error($model,'PUBLISHED_DATE'); ?>		
		</div>

	    <div class="form-group">
	    <?php echo $form->labelEx($model,'AUTHOR'); ?>
		<?php echo $form->textField($model,'AUTHOR',array('class'=>'form-control', 'size'=>60,'maxlength'=>300, 'placeholder'=>' ')); ?>
	    <?php echo $form->error($model,'AUTHOR',array('class'=>'text-danger')); ?>	
	    </div>
	
        <div class="form-group">
		<?php echo $form->labelEx($model,'STATUS'); ?>
		<?php echo $form->dropDownList($model, 'STATUS',array('1'=>'Disponible', '2'=>'No disponible'), array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'STATUS',array('class'=>'text-danger')); ?>	
	    </div>
	
</div>
	</div>
	</div>
	</div>

	<div class="col-md-1"></div>

	
	
	 <div class="row">
		 
		 <div class="col-md-1"></div>
			<div class="col-md-12">
			
			<div class="panel panel-default">
		
		<div class="panel-body">	
				<button type="submit" class="btn btn-success"><?php echo ($model->isNewRecord)? 'Crear': 'Guardar';?></button>
			</div>	
		</div>
		</div>	
	</div>
	    
<?php $this->endWidget(); ?>
