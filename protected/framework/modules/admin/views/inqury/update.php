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
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Inqury', 'url'=>array('index')),
	array('label'=>'Create Inqury', 'url'=>array('create')),
	array('label'=>'View Inqury', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Inqury', 'url'=>array('admin')),
);
?>

<h1>Update Inqury <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>