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
	$model->name,
);

$this->menu=array(
	array('label'=>'List FaqCategories', 'url'=>array('index')),
	array('label'=>'Create FaqCategories', 'url'=>array('create')),
	array('label'=>'Update FaqCategories', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FaqCategories', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FaqCategories', 'url'=>array('admin')),
);
?>

<h1>View FaqCategories #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'orderCategory',
        array(
            'label'=>'Is Active',
            'type'=>'html',
            'value'=>($model->isActive ? 'yes' : 'no'),
        ),
	),
)); ?>
