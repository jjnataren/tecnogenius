<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('LEVEL_NUMBER')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->LEVEL_NUMBER),array('view','id'=>$data->LEVEL_NUMBER)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NAME')); ?>:</b>
	<?php echo CHtml::encode($data->NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DESCRIPTION')); ?>:</b>
	<?php echo CHtml::encode($data->DESCRIPTION); ?>
	<br />


</div>

