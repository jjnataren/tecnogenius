<?php
/* @var $this MethodologyController */
/* @var $data Methodology */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HIERARCHY_ID')); ?>:</b>
	<?php echo CHtml::encode($data->HIERARCHY_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PARENT_ID')); ?>:</b>
	<?php echo CHtml::encode($data->PARENT_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NAME')); ?>:</b>
	<?php echo CHtml::encode($data->NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RESUME')); ?>:</b>
	<?php echo CHtml::encode($data->RESUME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DESCRIPTION')); ?>:</b>
	<?php echo CHtml::encode($data->DESCRIPTION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ALIAS')); ?>:</b>
	<?php echo CHtml::encode($data->ALIAS); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('RANK')); ?>:</b>
	<?php echo CHtml::encode($data->RANK); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->STATUS); ?>
	<br />

	*/ ?>

</div>