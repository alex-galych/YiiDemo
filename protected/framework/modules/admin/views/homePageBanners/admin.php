<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $this HomePageBannersController */
/* @var $model HomePageBanners */

$this->breadcrumbs=array(
	'Home Page Banners'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List HomePageBanners', 'url'=>array('index')),
	array('label'=>'Create HomePageBanners', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#home-page-banners-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Home Page Banners</h1>

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
$assetsDir = dirname(__FILE__).'/../assets';
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'home-page-banners-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
        array('name'=>'description',
            'type'=>'html',
            'value'=> 'substr(CHtml::decode($data->description),0,200)'
        ),
        array('name'=>'image',
            'type'=>'html',
            'header'=>'Picture',
            'value'=> '( !is_null($data->image) ? CHtml::image("/uploads/HomePageBanners/". $data->id ."/". $data->image, "image", array("width"=>94,"height"=>33)) : \'\')',
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
