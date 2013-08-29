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
	'Manage',
);

$this->menu=array(
	array('label'=>'List HomePageBlocks', 'url'=>array('index')),
	array('label'=>'Create HomePageBlocks', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#home-page-blocks-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Home Page Blocks</h1>

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
	'id'=>'home-page-blocks-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
        array('name'=>'description',
            'type'=>'html',
            'value'=> 'substr(CHtml::decode($data->description),0,200)'
        ),
        array('name'=>'image',
            'type'=>'html',
            'header'=>'Picture',
            'value'=> '( !is_null($data->image) ? CHtml::image("/uploads/HomePageBlocks/". $data->id ."/".$data->image, "image", array("width"=>139,"height"=>55)) : \'\')'
        ),
		'btnUrl',
        array('name'=>'btnImg',
            'type'=>'html',
            'header'=>'btnImg',
            'value'=> '( !is_null($data->btnImg) ? CHtml::image("/uploads/HomePageBlocks/". $data->id ."/".$data->btnImg, "image", array("width"=>131,"height"=>28)): \'\')'
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
