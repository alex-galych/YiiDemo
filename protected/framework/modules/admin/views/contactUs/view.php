<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $this ContactUsController */
/* @var $model ContactUs */

$this->breadcrumbs=array(
	'Contact Us'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ContactUs', 'url'=>array('index')),
	array('label'=>'Create ContactUs', 'url'=>array('create')),
	array('label'=>'Update ContactUs', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ContactUs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ContactUs', 'url'=>array('admin')),
    array('label'=>'Manage Inquries', 'url'=>array('/admin/inqury')),
    array('label'=>'Manage ContactUs Text', 'url'=>array('/admin/contactUsPageText')),
);
?>

<h1>View ContactUs #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
        array(
            'label'=>'Inqury',
            'type'=>'html',
            'value'=>ContactUs::model()->getInquryName($model),
        ),
		'name',
		'email',
		'phone',
		'message',
        'date',
	),
)); ?>
