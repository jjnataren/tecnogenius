

<?php
$form = $this->beginWidget ( 'CActiveForm', array (
		'id' => 'customer-purchase-form',
		'enableAjaxValidation' => false 
) );



$isFromStudent  = isset($_REQUEST['studentId']) && $_REQUEST['studentId'] > 0 && 
						isset($_REQUEST['courseId']) && $_REQUEST['courseId'] > 0;


?>


<div class="row">
	<p class="text text-warning text-right">
		Los campos con: <span class="required">*</span> son requeridos.
	</p>

<div class="col-md-12">
	
	<?php echo $form->errorSummary($model); ?>

	<div class="panel <?php echo ($model->isNewRecord)? 'panel-primary': 'panel-warning';?>">
		<div class="panel-heading">
			<h3 class="panel-title"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Cliente</h3>

		</div>
		<div class="panel-body">
		
		<h3 class="text text-primary">Detalle del cliente</h3>
		
		<div class="content" id="customerDiv">
		
				<div class="col-md-8">
		
		<?php if(!isset($model->cUSTOMER)) $model->cUSTOMER = new Customer(); ?>
	<div class="form-group">	
	<?php echo 	CHtml::activeLabelEx($model->cUSTOMER,'ID'); ?>
	<?php echo CHtml::activeTextField($model->cUSTOMER,'ID',array('id'=>'CID', 'size'=>10,'maxlength'=>300, 'class'=>'form-control', 'readonly'=>'readonly', 'placeholder'=>'nuevo')); ?>
	<?php echo CHtml::error($model->cUSTOMER,'ID',array('class'=>'text-danger')); ?>
	</div>
	<div class="form-group">	
	<?php echo CHtml::activelabelEx($model->cUSTOMER,'NAME'); ?>
	<?php echo CHtml::activetextField($model->cUSTOMER,'NAME',array('id'=>'CNAME',($isFromStudent)?'':'readonly'=>'readonly' , 'size'=>60,'maxlength'=>300, 'class'=>'form-control')); ?>
	<?php echo CHtml::error($model->cUSTOMER,'NAME',array('class'=>'text-danger')); ?>
	</div>
	<div class="form-group">
		<?php echo CHtml::activeLabelEx($model->cUSTOMER,'EMAIL'); ?>
		<?php echo CHtml::activeTextField($model->cUSTOMER,'EMAIL',array('id'=>'CEMAIL', ($isFromStudent)?'':'readonly'=>'readonly' , 'class'=>'form-control', 'size'=>60,'maxlength'=>300)); ?>
		<?php echo CHtml::error($model->cUSTOMER,'EMAIL',array('class'=>'text-danger')); ?>
	</div>
	<div class="form-group">	
		<?php echo CHtml::activelabelEx($model->cUSTOMER,'ADDRESS'); ?>
		<?php echo CHtml::activetextField($model->cUSTOMER,'ADDRESS',array('id'=>'CADDRESS', ($isFromStudent)?'':'readonly'=>'readonly' ,'class'=>'form-control', 'size'=>60,'maxlength'=>300)); ?>
		<?php echo CHtml::error($model->cUSTOMER,'ADDRESS',array('class'=>'text-danger')); ?>
	</div>
	<div class="form-group">	
					<?php echo CHtml::activelabelEx($model->cUSTOMER,'TAX_ADDRESS'); ?>
		<?php echo CHtml::activetextField($model->cUSTOMER,'TAX_ADDRESS',array('id'=>'CTAX_ADDRESS',($isFromStudent)?'':'readonly'=>'readonly' ,'class'=>'form-control', 'size'=>60,'maxlength'=>300)); ?>
		<?php echo CHtml::error($model->cUSTOMER,'TAX_ADDRESS',array('class'=>'text-danger')); ?>
	</div>
	<div class="form-group">
		<?php echo CHtml::activelabelEx($model->cUSTOMER,'TAX_ADDRESS_2'); ?>
		<?php echo CHtml::activetextField($model->cUSTOMER,'TAX_ADDRESS_2',array('id'=>'CTAX_ADDRESS_2',($isFromStudent)?'':'readonly'=>'readonly' ,'class'=>'form-control', 'size'=>60,'maxlength'=>300)); ?>
		<?php echo CHtml::error($model->cUSTOMER,'TAX_ADDRESS_2',array('class'=>'text-danger')); ?>
	</div>

	</div>
<div class="col-md-4">
				<div class="form-group">
				<?php echo $form->labelEx($model->cUSTOMER,'RFC'); ?>
		<?php echo $form->textField($model->cUSTOMER,'RFC',array('id'=>'CRFC',($isFromStudent)?'':'readonly'=>'readonly' ,'class'=>'form-control', 'size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model->cUSTOMER,'RFC',array('class'=>'text-danger')); ?>
				</div>		
				<div class="form-group">
				<?php echo $form->labelEx($model->cUSTOMER,'CURP'); ?>
		<?php echo $form->textField($model->cUSTOMER,'CURP',array('id'=>'CCURP', ($isFromStudent)?'':'readonly'=>'readonly' ,'class'=>'form-control', 'size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model->cUSTOMER,'CURP',array('class'=>'text-danger')); ?>
			</div>
		<?php //echo $form->labelEx($model->cUSTOMER,'BIRTH_DATE'); ?>
		<?php //echo $form->textField($model->cUSTOMER,'BIRTH_DATE',array('id'=>'CBIRTH_DATE', 'class'=>'form-control','size'=>20,'maxlength'=>20)); ?>
		<?php //echo $form->error($model->cUSTOMER,'BIRTH_DATE',array('class'=>'text-danger')); ?>
		
						<div class="form-group">
				<?php echo $form->labelEx($model->cUSTOMER,'BIRTH_DATE'); ?>
					
						<?php
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				    'model' => $model ->cUSTOMER,
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
				    		($isFromStudent)?'':'readonly'=>'readonly' ,
						'class'=>'form-control'
				    ),
				));
				?>
				</div>
					
			<div class="form-group">		
						<?php echo $form->labelEx($model->cUSTOMER,'GENDER'); ?>
						<?php echo $form->dropDownList($model->cUSTOMER,'GENDER',array('1'=>'Femenino', '2'=>'Masculino'), array('class'=>'form-control', ($isFromStudent)?'':'readonly'=>'readonly' )); ?>
						<?php echo $form->error($model->cUSTOMER,'GENDER',array('class'=>'text-danger')); ?>
					
			</div>
			
				<div class="form-group">	
					<?php echo CHtml::activelabelEx($model->cUSTOMER,'PHONE'); ?>
					<?php echo CHtml::activetextField($model->cUSTOMER,'PHONE',array('id'=>'PHONE', ($isFromStudent)?'':'readonly'=>'readonly' ,'class'=>'form-control', 'size'=>60,'maxlength'=>300)); ?>
					<?php echo CHtml::error($model->cUSTOMER,'PHONE',array('class'=>'text-danger')); ?>
				</div>
					
				<div class="form-group">	
					<?php echo CHtml::activelabelEx($model->cUSTOMER,'LINE'); ?>
					<?php echo CHtml::activetextField($model->cUSTOMER,'LINE',array('id'=>'LINE', ($isFromStudent)?'':'readonly'=>'readonly' ,'class'=>'form-control', 'size'=>60,'maxlength'=>300)); ?>
					<?php echo CHtml::error($model->cUSTOMER,'LINE',array('class'=>'text-danger')); ?>
				</div>
			
		
		</div>
	
	</div>
	
	</div>
		<div class="panel-footer">
			<button type="button" id="_newButton" class="btn btn-info btn-lg">Nuevo</button>
			<button type="button" data-toggle="modal" data-target="#myModal"
				class="btn btn-lg btn-info">Buscar</button>

		</div>
	</div>

	<div class="panel <?php echo ($model->isNewRecord)? 'panel-primary': 'panel-warning';?>">
		<div class="panel-heading">
			 <h3 class="panel-title"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;&nbsp;Producto</h3>
			<?php if(!isset($model->pRODUCT)) $model->pRODUCT = new Product(); ?>
		</div>
		<div class="panel-body">
		<div class="content" id="CourseDiv">
			<h3 class="text text-primary">Detalle del curso</h3>
		
		<?php if(!isset($model->pRODUCT->cOURSE)) $model->pRODUCT->cOURSE = new Course(); ?>
		
		
		<div class="col-md-2 form-group">
		<?php echo CHtml::activeLabelEx($model->pRODUCT->cOURSE,'ID'); ?>
		<?php echo CHtml::activeTextField($model->pRODUCT->cOURSE,'ID', array('class'=>'form-control', ($isFromStudent)?'':'readonly'=>'readonly')); ?>
		<?php echo CHtml::error($model->pRODUCT->cOURSE,'ID'); ?>
		</div>
		<div class="col-md-10 form-group">
		<?php echo CHtml::activeLabelEx($model->pRODUCT->cOURSE,'NAME'); ?>
		<?php echo CHtml::activeTextField($model->pRODUCT->cOURSE,'NAME', array('class'=>'form-control', ($isFromStudent)?'':'readonly'=>'readonly')); ?>
		<?php echo CHtml::error($model->pRODUCT->cOURSE,'NAME'); ?>
		</div>
		<h3 class="text text-primary">Productos relacionados</h3>
		<table class="table table-hover">
			<thead>
				<tr>
					<th></th>
					<th># ID</th>
					<th>Nombre</th>
					<th>Disponibles</th>
					<th>Descripcion</th>
					<th>Fecha Inicio</th>
					<th>Precio</th>
				</tr>
			</thead>
			<tbody>
				<tr />
				<?php foreach ($model->pRODUCT->cOURSE->products as $product){?>
				<tr class="<?php echo (($product->TOTAL_PEOPLE - count($product->oRDERS))> 0 )? '':'danger';?>">
					<td>						
						<?php echo CHtml::activeRadioButton($product,'ID',array(
																			    'value'=>$product->ID,
																			    'checked'=>(($product->TOTAL_PEOPLE - count($product->oRDERS))> 0 )?'checked':'',
																				'disabled'=>(($product->TOTAL_PEOPLE - count($product->oRDERS))> 0 )?'':'disabled'
																)); ?>
						<?php echo CHtml::error($product,'ID'); ?>
					</td>
					<td><?php echo $product->ID; ?></td>
					<td><?php echo $product->NAME; ?></td>
					<td><?php echo ($product->TOTAL_PEOPLE - count($product->oRDERS));?></td>
					<td><?php echo $product->DESCRIPTION; ?></td>					
					<td><?php echo $product->START_DATE; ?></td>
					<td>$&nbsp;<?php echo $product->RECOMMENDED_RETAIL_PRICE; ?></td>
				</tr>
				
				<?php }?>
				
			</tbody>
		</table>

					</div>
		</div>
		<div class="panel-footer">
			<button type="button" data-toggle="modal" data-target="#SearchCourseModal"
				class="btn btn-link">Buscar</button>	
		</div>
	</div>

	<div class="panel panel-success">
		<div class="panel-heading">
			 <h3 class="panel-title"><span class="glyphicon glyphicon-pushpin"></span>&nbsp;&nbsp;Orden</h3>
		</div>
		<div class="panel-body">
		
		<!-- <p class="text-primary"><strong>Detalles de la orden</strong></p>  -->
		
		<h3 class="text text-primary">Detalle de la  orden de compra</h3>
		
		<div class="form-group col-md-3">
		<label>Importe pagado ($)</label>
		<?php echo $form->textField($model,'PRICE_CUSTOMER_PAID',array('size'=>10,'maxlength'=>10, 'class'=>'form-control' )); ?>
		<?php echo $form->error($model,'PRICE_CUSTOMER_PAID'); ?>
		</div>
		
		<div class="form-group col-md-12">
		<label>Detalles por considerar en esta orden</label>
		<?php echo $form->textArea($model,'ANOTHER_DETAIL',array('row'=>8, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'ANOTHER_DETAIL'); ?>
		</div>
		
		<div class="col-md-12">
		<h3 class="text text-primary">Promociones que pueden aplicar</h3>
			
		
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th></th>
					<th>#</th>
					<th>Nombre</th>
					<th>Descripción</th>
					<th>Fecha inicio</th>
					<th>Fecha fin</th>
				</tr>
			</thead>
			<tbody>
		
		<?php 
		$promotions = SalePromotion::model()->findAll();
		
		foreach ($promotions  as $promotion){ ?>
			
				<tr>
					<td>						
						<?php echo $form->radioButton($promotion,'ID',array(
																			    'value'=>$promotion->ID,
																			    'uncheckValue'=>null,
																)); ?>
						
					</td>
					<td><?php echo $promotion->ID; ?></td>
					<td><?php echo $promotion->NAME; ?></td>
					<td><?php echo $promotion->DESCRIPTION; ?></td>
					<td><?php echo $promotion->START_DATE; ?></td>
					<td><?php echo $promotion->END_DATE; ?></td>
				</tr>
		
		<?php 	
		}
		?>
		
				<tr class="warning">
					<td>						
						<?php echo CHtml::activeRadioButton($promotion,'ID',array(
																			    'value'=>'-1',
																			    'uncheckValue'=>null,
																)); ?>
					</td>
					<td><?php echo ''; ?></td>
					<td><?php echo 'No aplica'; ?></td>
					<td><?php echo 'Sin promoción'; ?></td>
					<td></td>
					<td></td>
				</tr>
		
				</tbody>
		</table>
		</div>

		</div>
		<div class="panel-footer">
			<small><a>Ayuda</a></small>
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
	
	
	
	
	
	
	
	
	
	
</div>
</div>
<!-- form -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="false">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Buscar cliente</h4>
			</div>
			<div class="modal-body">
				<p class="text-primary text-center">Selecciona el cliente de la orden de compra</p>
				<?php echo $this->renderPartial('../customer/_searchModal', array('model'=>new Customer())); ?>
			</div>
			<div class="modal-footer">
				
				
			</div>
		</div>
	</div>
</div>

<!-- A Search modal for Courses -->
<div class="modal fade" id="SearchCourseModal" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="false">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Buscar curso</h4>
			</div>
			<div class="modal-body">
				<p class="text-primary text-center">Selecciona el curso</p>
				<?php echo $this->renderPartial('../course/_searchModal', array('model'=>new Course())); ?>
			</div>
			<div class="modal-footer">
				
				
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

	$( "#_newButton" ).click(function() {

	$("#CID").val("NUEVO");
	$("#CNAME").attr("readonly", false);
	$("#CNAME").val("");

	$("#CEMAIL").attr("readonly", false);
	$("#CEMAIL").val("");

	$("#CADDRESS").attr("readonly", false);
	$("#CADDRESS").val("");

	$("#CTAX_ADDRESS").attr("readonly", false);
	$("#CTAX_ADDRESS").val("");

	$("#CTAX_ADDRESS_2").attr("readonly", false);
	$("#CTAX_ADDRESS_2").val("");

	$("#CRFC").attr("readonly", false);
	$("#CRFC").val("");

	$("#CCURP").attr("readonly", false);
	$("#CCURP").val("");

	$("#CBIRTH_DATE").attr("readonly", false);
	$("#CBIRTH_DATE").val("");

	$("#CGENDER").attr("readonly", false);
	$("#CGENDER").val("");
	
	});

</script>