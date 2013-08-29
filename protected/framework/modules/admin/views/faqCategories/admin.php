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
	'Manage',
);

$this->menu=array(
	array('label'=>'List FaqCategories', 'url'=>array('index')),
	array('label'=>'Create FaqCategories', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#faq-categories-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Faq Categories</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php
    $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'faq-categories-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        'id',
        array(
            'class'=>'CButtonColumn',
            'buttons'=>array(
                'up'=>array(
                    'label'=>'up',
                    'imageUrl'=>'/assets/43b0bb01/gridview/up.png',
                    'url'=>'Yii::app()->createUrl("/admin/faqCategories/reposition", array("id"=>$data->id, "direction"=>"up", "orderCategory" => $data->orderCategory))',
                ),
                'down'=>array(
                    'label'=>'down',
                    'imageUrl'=>'/assets/43b0bb01/gridview/down.jpg',
                    'url'=>'Yii::app()->createUrl("/admin/faqCategories/reposition", array("id"=>$data->id, "direction"=>"down", "orderCategory" => $data->orderCategory))',
                ),
            ),
            'header'=>yii::t('core','Actions'),
            'template'=> '{up} {down}',
        ),
		'name',
		'orderCategory',
        array(
            'name'=>'isActive',
            'value'=>'CHtml::checkBox(null,$data->isActive,array())',
            'type'=>'raw',
            'htmlOptions'=>array('width'=>5),
        ),
		//'isActive',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
