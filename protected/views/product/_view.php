<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COURSE_ID')); ?>:</b>
	<?php echo CHtml::encode($data->COURSE_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NAME')); ?>:</b>
	<?php echo CHtml::encode($data->NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DESCRIPTION')); ?>:</b>
	<?php echo CHtml::encode($data->DESCRIPTION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('START_DATE')); ?>:</b>
	<?php echo CHtml::encode($data->START_DATE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TOTAL_PEOPLE')); ?>:</b>
	<?php echo CHtml::encode($data->TOTAL_PEOPLE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->STATUS); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('RECOMMENDED_RETAIL_PRICE')); ?>:</b>
	<?php echo CHtml::encode($data->RECOMMENDED_RETAIL_PRICE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ANOTHER_DETAILS')); ?>:</b>
	<?php echo CHtml::encode($data->ANOTHER_DETAILS); ?>
	<br />

	*/ ?>

</div>