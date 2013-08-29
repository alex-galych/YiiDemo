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
	'Create',
);

$this->menu=array(
	array('label'=>'List FaqQuestions', 'url'=>array('/admin/faqQuestions')),
	array('label'=>'Manage FaqQuestions', 'url'=>array('admin')),
);
?>

<h1>Create FaqQuestion</h1>

<?php echo $this->renderPartial('_form', array(
                    'model'=>$model,
                    'category'=>$category,
                )); ?>