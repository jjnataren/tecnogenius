<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NAME')); ?>:</b>
	<?php echo CHtml::encode($data->NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMAIL')); ?>:</b>
	<?php echo CHtml::encode($data->EMAIL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ADDRESS')); ?>:</b>
	<?php echo CHtml::encode($data->ADDRESS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BIRTH_DATE')); ?>:</b>
	<?php echo CHtml::encode($data->BIRTH_DATE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TAX_ADDRESS')); ?>:</b>
	<?php echo CHtml::encode($data->TAX_ADDRESS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TAX_ADDRESS_2')); ?>:</b>
	<?php echo CHtml::encode($data->TAX_ADDRESS_2); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('RFC')); ?>:</b>
	<?php echo CHtml::encode($data->RFC); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GENDER')); ?>:</b>
	<?php echo CHtml::encode($data->GENDER); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CURP')); ?>:</b>
	<?php echo CHtml::encode($data->CURP); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->STATUS); ?>
	<br />

	*/ ?>

</div>