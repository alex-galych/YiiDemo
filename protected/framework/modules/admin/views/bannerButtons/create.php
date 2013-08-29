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
    'Home Page Banners'=>array((isset($_GET['bannerId']) ? '/admin/homePageBanners/view/id/'.$_GET['bannerId'] : 'admin/homePageBanners')),
	'Create',
);

$this->menu=array(
	array('label'=>'List BannerButtons', 'url'=>array('/admin'.(isset($_GET['bannerId'])? ('/banner/'.$_GET['bannerId']):'') .'/bannerButtons/index')),
	array('label'=>'Manage BannerButtons', 'url'=>array('/admin'.(isset($_GET['bannerId'])? ('/banner/'.$_GET['bannerId']):'') .'/bannerButtons/admin')),
);
?>

<h1>Create BannerButtons</h1>

<?php
    if( $model ){
        echo $this->renderPartial('_form', array('model'=>$model));
    }else{
        echo '<div class="flash-error">You can\'t create more then 2 buttons for 1 block!</div>';
    }
?>