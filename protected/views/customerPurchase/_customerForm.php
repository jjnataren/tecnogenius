			<?php echo $form->labelEx($model->cUSTOMER,'ID'); ?>
			<?php echo $form->textField($model->cUSTOMER,'ID',array('size'=>10,'maxlength'=>300, 'class'=>'form-control', 'readonly'=>'readonly', 'placeholder'=>'nuevo')); ?>
			<?php echo $form->error($model->cUSTOMER,'ID'); ?>
		
			<?php echo $form->labelEx($model->cUSTOMER,'NAME'); ?>
			<?php echo $form->textField($model->cUSTOMER,'NAME',array('size'=>60,'maxlength'=>300, 'class'=>'form-control')); ?>
			<?php echo $form->error($model->cUSTOMER,'NAME'); ?>
	


		<?php echo $form->labelEx($model->cUSTOMER,'EMAIL'); ?>
		<?php echo $form->textField($model->cUSTOMER,'EMAIL',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model->cUSTOMER,'EMAIL'); ?>
		
		<?php echo $form->labelEx($model->cUSTOMER,'ADDRESS'); ?>
		<?php echo $form->textField($model->cUSTOMER,'ADDRESS',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model->cUSTOMER,'ADDRESS'); ?>
		
					<?php echo $form->labelEx($model->cUSTOMER,'TAX_ADDRESS'); ?>
		<?php echo $form->textField($model->cUSTOMER,'TAX_ADDRESS',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model->cUSTOMER,'TAX_ADDRESS'); ?>

		<?php echo $form->labelEx($model->cUSTOMER,'TAX_ADDRESS_2'); ?>
		<?php echo $form->textField($model->cUSTOMER,'TAX_ADDRESS_2',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model->cUSTOMER,'TAX_ADDRESS_2'); ?>