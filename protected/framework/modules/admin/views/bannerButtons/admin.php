<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $this BannerButtonsController */
/* @var $model BannerButtons */

$this->breadcrumbs=array(
	'Home Page Banners'=>array( (isset($_GET['bannerId']) ? '/admin/homePageBanners/view/id/'.$_GET['bannerId'] : 'admin/homePageBanners') ),
	'Manage',
);

$this->menu=array(
	array('label'=>'List BannerButtons', 'url'=>array('/admin'.(isset($_GET['bannerId'])? ('/banner/'.$_GET['bannerId']):'') .'/bannerButtons/index')),
	array('label'=>'Create BannerButtons', 'url'=>array('/admin'.(isset($_GET['bannerId'])? ('/banner/'.$_GET['bannerId']):'') .'/bannerButtons/create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#banner-buttons-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Banner Buttons</h1>

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
    if(isset($_GET['bannerId']))
        $model->bannerId = $_GET['bannerId'];

    $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'banner-buttons-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        array('name'=>'image',
            'type'=>'html',
            'header'=>'Picture',
            'value'=> 'CHtml::image("/uploads/BannerButtons/".$data->id."/".$data->image, "image", array("width"=>90,"height"=>21))',
        ),
		'url',
		array(
			'class'=>'CButtonColumn',
            'template'=>'{view}{update}{delete}',
            'buttons'=>array
            (
                'view' => array
                (
                    'url'=>'CController::createUrl("/admin'.(isset($_GET['bannerId'])? ('/banner/'.$_GET['bannerId']):'') .'/bannerButtons/view", array("id"=>$data->id))'
                ),
                'update' => array
                (
                    'url'=>'CController::createUrl("/admin'.(isset($_GET['bannerId'])? ('/banner/'.$_GET['bannerId']):'') .'/bannerButtons/update", array("id"=>$data->id))'
                ),
                'delete' => array
                (
                    'url'=>'CController::createUrl("/admin'.(isset($_GET['bannerId'])? ('/banner/'.$_GET['bannerId']):'') .'/bannerButtons/delete", array("id"=>$data->id))'
                ),
            ),
		),
	),
)); ?>
