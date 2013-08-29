<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $this DynamicPagesController */
/* @var $model DynamicPages */

$this->breadcrumbs=array(
	'Dynamic Pages'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DynamicPages', 'url'=>array('index')),
	array('label'=>'Create DynamicPages', 'url'=>array('create')),
	array('label'=>'View DynamicPages', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DynamicPages', 'url'=>array('admin')),
);
?>

<h1>Update DynamicPages <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>