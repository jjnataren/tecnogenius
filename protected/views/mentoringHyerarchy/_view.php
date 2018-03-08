<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID),array('view','id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STAFF_ID')); ?>:</b>
	<?php echo CHtml::encode($data->STAFF_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LEVEL_NUMBER')); ?>:</b>
	<?php echo CHtml::encode($data->LEVEL_NUMBER); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PARENT_ID')); ?>:</b>
	<?php echo CHtml::encode($data->PARENT_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NAME')); ?>:</b>
	<?php echo CHtml::encode($data->NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->STATUS); ?>
	<br />


</div>