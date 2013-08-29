<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $this ContactUsPageTextController */
/* @var $model ContactUsPageText */

$this->breadcrumbs=array(
	'Contact Us Page Texts'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ContactUsPageText', 'url'=>array('index')),
	array('label'=>'Create ContactUsPageText', 'url'=>array('create')),
	array('label'=>'Update ContactUsPageText', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ContactUsPageText', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ContactUsPageText', 'url'=>array('admin')),
);
?>

<h1>View ContactUsPageText #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'text',
	),
)); ?>
