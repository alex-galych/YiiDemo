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
/* @var $categories FaqCategories */

$this->breadcrumbs=array(
	'Faq Questions'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List FaqQuestions', 'url'=>array('/admin/faqQuestions')),
	array('label'=>'Create FaqQuestion', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#faq-body-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Faq Bodies</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<!--<div class="search-form" style="display:none">-->
<?php $this->renderPartial('_search',array(
	'model'=>$model,
	'categories'=>FaqCategories::model()->getCategories(),
)); ?>
<!--</div>--><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'faq-body-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
        array(
            'name'=>'faqCategory',
            'value'=>array($model,'getFaqCategoryName'),
            'type'=>'raw',
        ),
        array('name'=>'ask',
            'type'=>'html',
            'value'=> 'substr(CHtml::decode($data->ask),0,200)'
        ),
        array('name'=>'answer',
            'type'=>'html',
            'value'=> 'substr(CHtml::decode($data->answer),0,200)'
        ),
        array(
            'name'=>'isActive',
            'value'=>'CHtml::checkBox(null,$data->isActive,array())',
            'type'=>'raw',
            'htmlOptions'=>array('width'=>5),
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
