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
	'Create',
);

$this->menu=array(
	array('label'=>'List DynamicPages', 'url'=>array('index')),
	array('label'=>'Manage DynamicPages', 'url'=>array('admin')),
);
?>

<h1>Create DynamicPages</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>