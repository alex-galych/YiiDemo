<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $this BannerButtonsController */
/* @var $dataProvider CActiveDataProvider */

    $this->breadcrumbs=array(
        'Home Page Banners'=>array((isset($_GET['bannerId']) ? '/admin/homePageBanners/view/id/'.$_GET['bannerId'] : 'admin/homePageBanners')),
        'List'
    );

    $this->menu=array(
        array('label'=>'Create BannerButtons', 'url'=>array('/admin'.(isset($_GET['bannerId'])? ('/banner/'.$_GET['bannerId']):'') .'/bannerButtons/create')),
        array('label'=>'Manage BannerButtons', 'url'=>array('/admin'.(isset($_GET['bannerId'])? ('/banner/'.$_GET['bannerId']):'') .'/bannerButtons/admin')),
    );
?>

<h1>Banner Buttons</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));
?>
