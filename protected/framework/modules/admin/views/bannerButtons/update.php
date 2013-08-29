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
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BannerButtons', 'url'=>array('/admin'.(isset($_GET['bannerId'])? ('/banner/'.$_GET['bannerId']):'') .'/bannerButtons/index')),
	array('label'=>'Create BannerButtons', 'url'=>array('/admin'.(isset($_GET['bannerId'])? ('/banner/'.$_GET['bannerId']):'') .'/bannerButtons/create')),
	array('label'=>'View BannerButtons', 'url'=>array('/admin'.(isset($_GET['bannerId'])? ('/banner/'.$_GET['bannerId']):'') .'/bannerButtons/view', 'id'=>$model->id)),
	array('label'=>'Manage BannerButtons', 'url'=>array('/admin'.(isset($_GET['bannerId'])? ('/banner/'.$_GET['bannerId']):'') .'/bannerButtons/admin')),
);
?>

<h1>Update BannerButtons <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>