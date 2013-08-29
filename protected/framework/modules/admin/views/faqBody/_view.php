<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $this FaqBodyController */
/* @var $data FaqBody */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('faqCategory')); ?>:</b>
    <?php echo CHtml::encode(FaqBody::model()->getFaqCategoryName($data)); ?>
    <br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ask')); ?>:</b>
	<?php echo CHtml::encode($data->ask); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('answer')); ?>:</b>
	<?php echo CHtml::encode($data->answer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isActive')); ?>:</b>
    <?php echo CHtml::encode($data->isActive ? 'yes' : 'no'); ?>
	<br />

</div>