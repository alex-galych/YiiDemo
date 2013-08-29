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
	$model->id,
);

$this->menu=array(
	array('label'=>'List BannerButtons', 'url'=>array('/admin'.(isset($_GET['bannerId'])? ('/banner/'.$_GET['bannerId']):'') .'/bannerButtons/index')),
	array('label'=>'Create BannerButtons', 'url'=>array('/admin'.(isset($_GET['bannerId'])? ('/banner/'.$_GET['bannerId']):'') .'/bannerButtons/create')),
	array('label'=>'Update BannerButtons', 'url'=>array('/admin'.(isset($_GET['bannerId'])? ('/banner/'.$_GET['bannerId']):'') .'/bannerButtons/update', 'id'=>$model->id)),
	array('label'=>'Delete BannerButtons', 'url'=>'/admin'.(isset($_GET['bannerId'])? ('/banner/'.$_GET['bannerId']):'') .'/bannerButtons/#', 'linkOptions'=>array('submit'=>array('/admin'.(isset($_GET['bannerId'])? ('/banner/'.$_GET['bannerId']):'') .'/bannerButtons/delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BannerButtons', 'url'=>array('/admin'.(isset($_GET['bannerId'])? ('/banner/'.$_GET['bannerId']):'') .'/bannerButtons/admin')),
);
?>

<h1>View BannerButtons #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
        array(
            'label'=>'image',
            'type'=>'html',
            'value'=>(!is_null($model->image) ? '<img width="90" height="21"  src="/uploads/BannerButtons/' . $model->id . '/'.$model->image . '"/>': 'no image'),
        ),
		'url',
	),
)); ?>
