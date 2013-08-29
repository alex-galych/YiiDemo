<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $this HomePageBlocksController */
/* @var $data HomePageBlocks */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br /><br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
    <?php echo CHtml::image("/uploads/HomePageBlocks/". $data->id ."/".$data->image, "image", array("width"=>139,"height"=>55)); ?>
	<br /><br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('btnUrl')); ?>:</b>
	<?php echo CHtml::encode($data->btnUrl); ?>
	<br /><br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('btnImg')); ?>:</b>
    <?php echo CHtml::image("/uploads/HomePageBlocks/". $data->id ."/". $data->btnImg, "image", array("width"=>131,"height"=>28)); ?>
	<br />


</div>