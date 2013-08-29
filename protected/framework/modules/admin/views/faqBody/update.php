<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $this FaqBodyController */
/* @var $model FaqBody */
/* @var $category FaqCategories */

$this->breadcrumbs=array(
	'Faq Questions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FaqQuestion', 'url'=>array('/admin/faqQuestions')),
	array('label'=>'Create FaqQuestion', 'url'=>array('create')),
	array('label'=>'View FaqQuestion', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FaqQuestion', 'url'=>array('admin')),
);
?>

<h1>Update FaqQuestion <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array(
    'model'=>$model,
    'category'=>$category,
)); ?>