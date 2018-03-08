<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HIERARCHY_ID')); ?>:</b>
	<?php echo CHtml::encode($data->HIERARCHY_ID); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('CONTENT')); ?>:</b>
	<?php echo CHtml::encode($data->CONTENT); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('RANKING')); ?>:</b>
	<?php echo CHtml::encode($data->RANKING); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PUBLISHED_DATE')); ?>:</b>
	<?php echo CHtml::encode($data->PUBLISHED_DATE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AUTHOR')); ?>:</b>
	<?php echo CHtml::encode($data->AUTHOR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->STATUS); ?>
	<br />

	*/ ?>

</div>