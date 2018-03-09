<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'staff-form',
	'enableAjaxValidation'=>false,
)); ?>
	
	
	<div class="row">
	
	<p class="text text-warning text-right">
			Los campos con: <span class="required">(*)</span> son requeridos.
		</p>
	<div class="col-md-10">
	
	<div class="panel <?php echo ($model->isNewRecord)? 'panel-primary': 'panel-warning';?>">
			<div class="panel-heading">
				 <h3 class="panel-title"><span class="glyphicon glyphicon-tower"></span>&nbsp;&nbsp;<?php echo ($model->isNewRecord)? 'Crear item': 'Actualizar item';?></h3>
	
			</div>
	<div class="panel-body">
	
	
	
	

	<?php echo $form->errorSummary($model); ?>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'NAME'); ?>
		<?php echo $form->textField($model,'NAME',array('class'=>'form-control', 'size'=>60,'maxlength'=>300, 'placeholder'=>'Nombre completo del personal ')); ?>
	    <?php echo $form->error($model,'NAME',array('class'=>'text-danger')); ?>	
	</div>
	
		<div class="form-group">		
		<?php echo $form->labelEx($model,'GENDER'); ?>
		<?php echo $form->dropDownList($model, 'STATUS',array('1'=>'Femenino', '2'=>'Maculino'), array('class'=>'form-control')); ?>
        <?php echo $form->error($model,'GENDER',array('class'=>'text-danger')); ?>					
      </div>
      
	<div class="form-group">
		<?php echo $form->labelEx($model,'DATE_JOINED'); ?>
		</div>
		
			<div class="form-group">
		<?php
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				    'model' => $model,
				    'attribute' => 'DATE_JOINED',
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
		<?php echo $form->error($model,'DATE_JOINED'); ?>
	</div>  
	
		<div class="form-group">
		<?php echo $form->labelEx($model,'DATE_LEFT'); ?>
		
		<?php
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				    'model' => $model,
				    'attribute' => 'DATE_LEFT',
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
		<?php echo $form->error($model,'DATE_LEFT'); ?>
       </div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'DATE_BIRTH'); ?>
		
		<?php
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				    'model' => $model,
				    'attribute' => 'DATE_BIRTH',
				'language' => 'es',
						'options' => array(
						'showOn' => 'both',             // also opens with a button
						'dateFormat' => 'yy-mm-dd',     // format of "2012-12-25"
						'showOtherMonths' => true,      // show dates in other months
						'selectOtherMonths' => true,    // can seelect dates in other months
						'changeYear' => true,           // can change year
						'changeMonth' => true,          // can change month
						'yearRange' => '1940:2050',     // range of year
						'minDate' => '1940-01-01',      // minimum date
						'maxDate' => '2099-12-31',      // maximum date
						'showButtonPanel' => true,      // show button panel
				),
				    'htmlOptions' => array(
				        'size' => '10',         // textField size
				        'maxlength' => '10',    // textField maxlength
						'class'=>'form-control'
				    ),
				));?>
		<?php echo $form->error($model,'DATE_BIRTH'); ?>
</div>

	<div class="form-group">
		<?php echo $form->dropDownListRow($model,'ROLE',array('1'=>'Profesor', '2'=>'Asesor'), array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'ROLE',array('class'=>'text-danger')); ?>	
			</div>
			
			
	
		<div class="form-group">
    	<?php echo $form->dropDownListRow($model, 'STATUS',array('1'=>'Disponible', '2'=>'No disponible'), array('class'=>'form-control')); ?>
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
