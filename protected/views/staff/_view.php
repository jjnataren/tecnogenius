<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID),array('view','id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NAME')); ?>:</b>
	<?php echo CHtml::encode($data->NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GENDER')); ?>:</b>
	<?php echo CHtml::encode($data->GENDER); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DATE_JOINED')); ?>:</b>
	<?php echo CHtml::encode($data->DATE_JOINED); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DATE_LEFT')); ?>:</b>
	<?php echo CHtml::encode($data->DATE_LEFT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DATE_BIRTH')); ?>:</b>
	<?php echo CHtml::encode($data->DATE_BIRTH); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ROLE')); ?>:</b>
	<?php echo CHtml::encode($data->ROLE); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('PHOTO_FILENAME')); ?>:</b>
	<?php echo CHtml::encode($data->PHOTO_FILENAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->STATUS); ?>
	<br />

	*/ ?>

</div>