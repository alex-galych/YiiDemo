<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $this FaqCategoriesController */
/* @var $data FaqCategories */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('orderCategory')); ?>:</b>
	<?php echo CHtml::encode($data->orderCategory); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isActive')); ?>:</b>
	<?php echo CHtml::encode($data->isActive ? 'yes' : 'no'); ?>
	<br />


</div>