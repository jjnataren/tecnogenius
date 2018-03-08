
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'customer-form',
	'enableAjaxValidation'=>false,
)); ?>


	
	
	<div class="row">
	
		<p class="text text-warning text-right">
			Los campos con: <span class="required">(*)</span> son requeridos.
		</p>
		<div class="col-md-12">
				
				<div class="panel <?php echo ($model->isNewRecord)? 'panel-primary': 'panel-warning';?>">
					<div class="panel-heading">
						<h3 class="panel-title"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;<?php echo ($model->isNewRecord)? 'Crear cliente': 'Actualizar cliente';?></h3>
				
					</div>
					<div class="panel-body">
			
						<?php echo $form->errorSummary($model); ?>
					
							<div class="form-group">
						
								<?php echo $form->labelEx($model,'NAME'); ?>
							<?php echo $form->textField($model,'NAME',array('class'=>'form-control', 'size'=>60,'maxlength'=>300, 'placeholder'=>' Apelativo nombre')); ?>
						    <?php echo $form->error($model,'NAME',array('class'=>'text-danger')); ?>	
								
						</div>
						
					
					
					
							<div class="form-group">
							<?php echo $form->labelEx($model,'EMAIL'); ?>
							<?php echo $form->textField($model,'EMAIL',array('class'=>'form-control', 'size'=>60,'maxlength'=>300, 'placeholder'=>' Correo electronico')); ?>
						    <?php echo $form->error($model,'EMAIL',array('class'=>'text-danger')); ?>
						</div>
						
								<div class="form-group">
							<?php echo $form->labelEx($model,'PHONE'); ?>
							<?php echo $form->textField($model,'PHONE',array('class'=>'form-control', 'size'=>45,'maxlength'=>45 )); ?>
						    <?php echo $form->error($model,'PHONE',array('class'=>'text-danger')); ?>
						</div>
					
						<div class="form-group">	
								<?php echo $form->labelEx($model,'LINE'); ?>
							<?php echo $form->textField($model,'LINE',array('class'=>'form-control', 'size'=>45,'maxlength'=>45)); ?>
						    <?php echo $form->error($model,'LINE',array('class'=>'text-danger')); ?>
						</div>
					
						<div class="form-group">	
								<?php echo $form->labelEx($model,'ADDRESS'); ?>
							<?php echo $form->textField($model,'ADDRESS',array('class'=>'form-control', 'size'=>60,'maxlength'=>300, 'placeholder'=>' Domicilio')); ?>
						    <?php echo $form->error($model,'ADDRESS',array('class'=>'text-danger')); ?>
						</div>
					
							<div class="form-group">
							<?php echo $form->labelEx($model,'BIRTH_DATE'); ?>
							
							<?php
									$this->widget('zii.widgets.jui.CJuiDatePicker', array(
									    'model' => $model,
									    'attribute' => 'BIRTH_DATE',
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
							<?php echo $form->error($model,'BIRTH_DATE'); ?>
						</div>
					
							<div class="form-group">
							<?php echo $form->labelEx($model,'TAX_ADDRESS'); ?>
							<?php echo $form->textField($model,'TAX_ADDRESS',array('class'=>'form-control', 'size'=>60,'maxlength'=>300, 'placeholder'=>' ')); ?>
						    <?php echo $form->error($model,'TAX_ADDRESS',array('class'=>'text-danger')); ?>
						</div>
					
						<div class="form-group">
							<?php echo $form->labelEx($model,'TAX_ADDRESS_2'); ?>
							<?php echo $form->textField($model,'TAX_ADDRESS_2',array('class'=>'form-control', 'size'=>60,'maxlength'=>300, 'placeholder'=>' ')); ?>
						    <?php echo $form->error($model,'TAX_ADDRESS_2',array('class'=>'text-danger')); ?>
							</div>
					
								<div class="form-group">
						    <?php echo $form->labelEx($model,'RFC'); ?>
							<?php echo $form->textField($model,'RFC',array('class'=>'form-control', 'size'=>60,'maxlength'=>300, 'placeholder'=>' ')); ?>
						    <?php echo $form->error($model,'RFC',array('class'=>'text-danger')); ?>
						</div>
					
					
					
					
						<div class="form-group">
							<?php echo $form->labelEx($model,'GENDER'); ?>
	                        <?php echo $form->dropDownList($model, 'STATUS',array('1'=>'Femenino', '2'=>'Masculino'), array('class'=>'form-control')); ?>
    				    <?php echo $form->error($model,'GENDER',array('class'=>'text-danger')); ?>
						</div>
					
							<div class="form-group">
						     <?php echo $form->labelEx($model,'CURP'); ?>
							<?php echo $form->textField($model,'CURP',array('class'=>'form-control', 'size'=>60,'maxlength'=>300, 'placeholder'=>' ')); ?>
						    <?php echo $form->error($model,'CURP',array('class'=>'text-danger')); ?>
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

<!-- form -->