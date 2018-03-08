<h3 class="text text-primary">Detalle del curso</h3>
		
		
		
		<div class="col-md-2 form-group">
		<?php echo CHtml::activeLabelEx($model,'ID'); ?>
		<?php echo CHtml::activeTextField($model,'ID', array('class'=>'form-control', 'readonly'=>'readonly')); ?>
		<?php echo CHtml::error($model,'ID'); ?>
		</div>
		<div class="col-md-10 form-group">
		<?php echo CHtml::activeLabelEx($model,'NAME'); ?>
		<?php echo CHtml::activeTextField($model,'NAME', array('class'=>'form-control', 'readonly'=>'readonly')); ?>
		<?php echo CHtml::error($model,'NAME'); ?>
		</div>
		<h3 class="text text-primary">Productos relacionados</h3>
		<table class="table table-hover">
			<thead>
				<tr>
					<th></th>
					<th># ID</th>
					<th>Nombre</th>
					<th>Disponibles</th>
					<th>Descripción</th>
					<th>Fecha Inicio</th>
					<th>Precio</th>
				</tr>
			</thead>
			<tbody>
				<tr />
				<?php foreach ($model->products as $product){?>
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