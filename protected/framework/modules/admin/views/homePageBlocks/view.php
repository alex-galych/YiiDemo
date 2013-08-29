<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $this HomePageBlocksController */
/* @var $model HomePageBlocks */

$this->breadcrumbs=array(
	'Home Page Blocks'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List HomePageBlocks', 'url'=>array('index')),
	array('label'=>'Create HomePageBlocks', 'url'=>array('create')),
	array('label'=>'Update HomePageBlocks', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete HomePageBlocks', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage HomePageBlocks', 'url'=>array('admin')),
);
?>

<h1>View HomePageBlocks #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'description',
        array(
            'label'=>'Image',
            'type'=>'html',
            'value'=>( !is_null($model->image) ? '<img width="139" height="55"  src="/uploads/HomePageBlocks/'.$model->id.'/'. $model->image .'"/>' : 'no image' ),
        ),
		'btnUrl',
        array(
            'label'=>'btnImg',
            'type'=>'html',
            'value'=> ( !is_null($model->btnImg) ? '<img width="131" height="28"  src="/uploads/HomePageBlocks/'. $model->id .'/'. $model->btnImg .'"/>' : 'no image' ),
        ),
	),
)); ?>
