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
	'Manage',
);

$this->menu=array(
	array('label'=>'List DynamicPages', 'url'=>array('index')),
	array('label'=>'Create DynamicPages', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#dynamic-pages-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Dynamic Pages</h1>

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

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'dynamic-pages-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'uri',
		'title',
		'quote',
        array('name'=>'image',
            'type'=>'html',
            'header'=>'Picture',
            'value'=> '( !is_null($data->image) ? CHtml::image("/uploads/DynamicPages/". $data->id ."/".$data->image, "image", array("width"=>150,"height"=>30)) : \'\')'
        ),
        array('name'=>'content',
            'type'=>'html',
            'value'=> 'substr(CHtml::decode($data->content),0,200)'
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
