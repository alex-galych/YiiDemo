<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $this InquryController */
/* @var $model Inqury */

$this->breadcrumbs=array(
	'Inquries'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Inqury', 'url'=>array('index')),
	array('label'=>'Manage Inqury', 'url'=>array('admin')),
);
?>

<h1>Create Inqury</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>