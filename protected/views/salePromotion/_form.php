

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sale-promotion-form',
	'enableAjaxValidation'=>false,
)); ?>

	
	
	
	<div class="row">
	
	<p class="text text-warning text-right">
			Los campos con: <span class="required">(*)</span> son requeridos.
		</p>
	<div class="col-md-10">
	
	<div class="panel <?php echo ($model->isNewRecord)? 'panel-primary': 'panel-warning';?>">
			<div class="panel-heading">
				 <h2 class="panel-title"><span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;<?php echo ($model->isNewRecord)? 'Crear promoción': 'Actualizar promoción';?></h2>
	
			</div>
	<div class="panel-body">
	
	<?php echo $form->errorSummary($model); ?>

		<div class="form-group">
		
		
<div class="form-group">
		<?php echo $form->labelEx($model,'NAME'); ?>
		<?php echo $form->textField($model,'NAME',array('class'=>'form-control', 'size'=>60,'maxlength'=>300, 'placeholder'=>'Alias')); ?>
		<?php echo $form->error($model,'NAME',array('class'=>'text-danger')); ?>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'START_DATE'); ?>
		
		<?php
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				    'model' => $model,
				    'attribute' => 'START_DATE',
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
				
		<?php echo $form->error($model,'START_DATE'); ?>
	 </div>
	 
<div class="form-group">
		<?php echo $form->labelEx($model,'END_DATE'); ?>
		
		<?php
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				    'model' => $model,
				    'attribute' => 'END_DATE',
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
		<?php echo $form->error($model,'END_DATE'); ?>
</div>


<div class="form-group">
		
		<?php echo $form->labelEx($model,'DESCRIPTION'); ?>
  	   <?php echo $form->textArea($model,'DESCRIPTION',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
				<?php echo $form->error($model,'DESCRIPTION',array('class'=>'text-danger')); ?>

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

