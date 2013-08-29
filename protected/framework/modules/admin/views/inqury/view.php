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
	$model->name,
);

$this->menu=array(
	array('label'=>'List Inqury', 'url'=>array('index')),
	array('label'=>'Create Inqury', 'url'=>array('create')),
	array('label'=>'Update Inqury', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Inqury', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Inqury', 'url'=>array('admin')),
);
?>

<h1>View Inqury #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
