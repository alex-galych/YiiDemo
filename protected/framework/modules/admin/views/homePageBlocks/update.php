<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $this HomePageBlocksController */
/* @var $model HomePageBlocks */

$this->breadcrumbs=array(
	'Home Page Blocks'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List HomePageBlocks', 'url'=>array('index')),
	array('label'=>'Create HomePageBlocks', 'url'=>array('create')),
	array('label'=>'View HomePageBlocks', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage HomePageBlocks', 'url'=>array('admin')),
);
?>

<h1>Update HomePageBlocks <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>