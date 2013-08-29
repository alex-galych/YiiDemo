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

$this->breadcrumbs=array(
	'Faq Questions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List FaqQuestions', 'url'=>array('/admin/faqQuestions')),
	array('label'=>'Create FaqQuestion', 'url'=>array('create')),
	array('label'=>'Update FaqQuestion', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FaqQuestion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FaqQuestions', 'url'=>array('admin')),
);
?>

<h1>View FaqQuestion #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
        array(
            'label'=>'Faq Category',
            'type'=>'html',
            'value'=>FaqBody::model()->getFaqCategoryName($model),
        ),
		'ask',
		'answer',
        array(
            'label'=>'Is Active',
            'type'=>'html',
            'value'=>($model->isActive ? 'yes' : 'no'),
        ),
	),
)); ?>
