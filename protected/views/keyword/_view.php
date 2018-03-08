<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('WORD')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->WORD),array('view','id'=>$data->WORD)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->STATUS); ?>
	<br />


</div>