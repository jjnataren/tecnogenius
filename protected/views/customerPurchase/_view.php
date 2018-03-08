<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SALE_PROMOTION_ID')); ?>:</b>
	<?php echo CHtml::encode($data->SALE_PROMOTION_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CUSTOMER_ID')); ?>:</b>
	<?php echo CHtml::encode($data->CUSTOMER_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PRODUCT_ID')); ?>:</b>
	<?php echo CHtml::encode($data->PRODUCT_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PURCHASE_DATE')); ?>:</b>
	<?php echo CHtml::encode($data->PURCHASE_DATE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PRICE_CUSTOMER_PAID')); ?>:</b>
	<?php echo CHtml::encode($data->PRICE_CUSTOMER_PAID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ANOTHER_DETAIL')); ?>:</b>
	<?php echo CHtml::encode($data->ANOTHER_DETAIL); ?>
	<br />


</div>