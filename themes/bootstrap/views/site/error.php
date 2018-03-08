<?php
$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<h2>Error <?php echo $code; ?></h2>

<div class="error">
<?php echo CHtml::encode($message); ?>


Contactanos <a href="<?php echo Yii::app()->createUrl('site/contact', array())?>">aquí</a>


</div>