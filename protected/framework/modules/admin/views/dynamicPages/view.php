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
	$model->title,
);

$this->menu=array(
	array('label'=>'List DynamicPages', 'url'=>array('index')),
	array('label'=>'Create DynamicPages', 'url'=>array('create')),
	array('label'=>'Update DynamicPages', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DynamicPages', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DynamicPages', 'url'=>array('admin')),
);
?>

<h1>View DynamicPages #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'uri',
		'title',
		'quote',
        array(
            'label'=>'image',
            'type'=>'html',
            'value'=>(!is_null($model->image) ? '<img width="150" height="30"  src="/uploads/DynamicPages/'. $model->id .'/'. $model->image .'"/>' : 'no image'),
        ),
		'content',
	),
)); ?>
