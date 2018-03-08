<ul class="actions">
<?php 
if(UserModule::isAdmin()) {
?>
<li><?php echo CHtml::link(UserModule::t('Manage User'),array('/user/admin')); ?></li>
<li><?php echo CHtml::link(UserModule::t('List User'),array('/user')); ?></li>
<?php 
} else {
?>

<?php
}
?>

<li><?php echo CHtml::link(UserModule::t('Profile'),array('/user/profile')); ?></li>
<li><?php echo CHtml::link(UserModule::t('Edit'),array('edit')); ?></li>
<li><?php echo CHtml::link(UserModule::t('Change password'),array('changepassword')); ?></li>
<li><?php echo CHtml::link(UserModule::t('Logout'),array('/user/logout')); ?></li>
<br />
<li><a href="<?php echo Yii::app()->createUrl('admin/index', array('id'=>0));?>"><strong>Administrar sitio</strong></a></li>
<br />


</ul>