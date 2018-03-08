

<div class="content" id="customerDiv">
	<div class="col-md-8" >
		
	<?php echo 	CHtml::activeLabelEx($model,'ID'); ?>
	<?php echo CHtml::activeTextField($model,'ID',array('id'=>'CID', 'size'=>10,'maxlength'=>300, 'class'=>'form-control', 'readonly'=>'readonly', 'placeholder'=>'nuevo')); ?>
	<?php echo CHtml::error($model,'ID'); ?>
		
	<?php echo CHtml::activelabelEx($model,'NAME'); ?>
	<?php echo CHtml::activetextField($model,'NAME',array('id'=>'CNAME', 'size'=>60,'maxlength'=>300, 'class'=>'form-control', 'readonly'=>'readonly',)); ?>
	<?php echo CHtml::error($model,'NAME'); ?>

		<?php echo CHtml::activeLabelEx($model,'EMAIL'); ?>
		<?php echo CHtml::activeTextField($model,'EMAIL',array('id'=>'CEMAIL', 'class'=>'form-control', 'readonly'=>'readonly',  'size'=>60,'maxlength'=>300)); ?>
		<?php echo CHtml::error($model,'EMAIL'); ?>
		
		<?php echo CHtml::activelabelEx($model,'ADDRESS'); ?>
		<?php echo CHtml::activetextField($model,'ADDRESS',array('id'=>'CADDRESS', 'class'=>'form-control', 'readonly'=>'readonly', 'size'=>60,'maxlength'=>300)); ?>
		<?php echo CHtml::error($model,'ADDRESS'); ?>
		
					<?php echo CHtml::activelabelEx($model,'TAX_ADDRESS'); ?>
		<?php echo CHtml::activetextField($model,'TAX_ADDRESS',array('id'=>'CTAX_ADDRESS', 'class'=>'form-control', 'readonly'=>'readonly',  'size'=>60,'maxlength'=>300)); ?>
		<?php echo CHtml::error($model,'TAX_ADDRESS'); ?>

		<?php echo CHtml::activelabelEx($model,'TAX_ADDRESS_2'); ?>
		<?php echo CHtml::activetextField($model,'TAX_ADDRESS_2',array('id'=>'CTAX_ADDRESS_2', 'class'=>'form-control', 'readonly'=>'readonly',  'size'=>60,'maxlength'=>300)); ?>
		<?php echo CHtml::error($model,'TAX_ADDRESS_2'); ?>
	

	</div>
	<div class="col-md-4">
				<?php echo CHtml::activelabelEx($model,'RFC'); ?>
		<?php echo CHtml::activetextField($model,'RFC',array('id'=>'CRFC', 'class'=>'form-control', 'readonly'=>'readonly',  'size'=>20,'maxlength'=>20)); ?>
		<?php echo CHtml::error($model,'RFC'); ?>
		
				<?php echo CHtml::activelabelEx($model,'CURP'); ?>
		<?php echo CHtml::activetextField($model,'CURP',array('id'=>'CCURP', 'class'=>'form-control', 'readonly'=>'readonly',  'size'=>20,'maxlength'=>20)); ?>
		<?php echo CHtml::error($model,'CURP'); ?>
		
		<?php echo CHtml::activelabelEx($model,'BIRTH_DATE'); ?>
		<?php echo CHtml::activetextField($model,'BIRTH_DATE',array('id'=>'CBIRTH_DATE', 'class'=>'form-control', 'readonly'=>'readonly',  'size'=>20,'maxlength'=>20)); ?>
		<?php echo CHtml::error($model,'BIRTH_DATE'); ?>
		
		
			<?php echo CHtml::activelabelEx($model,'GENDER'); ?>
			<?php echo CHtml::activetextField($model,'GENDER',array('id'=>'CGENDER', 'class'=>'form-control', 'readonly'=>'readonly',  'size'=>20,'maxlength'=>20)); ?>
			<?php echo CHtml::error($model,'GENDER'); ?>
		
	</div>
</div>