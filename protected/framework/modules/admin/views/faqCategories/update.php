<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $this FaqCategoriesController */
/* @var $model FaqCategories */

$this->breadcrumbs=array(
	'Faq Categories'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FaqCategories', 'url'=>array('index')),
	array('label'=>'Create FaqCategories', 'url'=>array('create')),
	array('label'=>'View FaqCategories', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FaqCategories', 'url'=>array('admin')),
);
?>

<h1>Update FaqCategories <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>