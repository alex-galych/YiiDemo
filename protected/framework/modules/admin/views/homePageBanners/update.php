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
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List HomePageBanners', 'url'=>array('index')),
	array('label'=>'Create HomePageBanners', 'url'=>array('create')),
	array('label'=>'View HomePageBanners', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage HomePageBanners', 'url'=>array('admin')),
    array('label'=>'Manage BannerButtons', 'url'=>array('/admin/banner/'. $model->id .'/bannerButtons/admin')),
);
?>

<h1>Update HomePageBanners <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array(
                'model'=>$model,
            )); ?>