<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID'); ?>
		<?php echo $form->textField($model,'ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SALE_PROMOTION_ID'); ?>
		<?php echo $form->textField($model,'SALE_PROMOTION_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CUSTOMER_ID'); ?>
		<?php echo $form->textField($model,'CUSTOMER_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PRODUCT_ID'); ?>
		<?php echo $form->textField($model,'PRODUCT_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PURCHASE_DATE'); ?>
		<?php echo $form->textField($model,'PURCHASE_DATE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PRICE_CUSTOMER_PAID'); ?>
		<?php echo $form->textField($model,'PRICE_CUSTOMER_PAID',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ANOTHER_DETAIL'); ?>
		<?php echo $form->textField($model,'ANOTHER_DETAIL',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->