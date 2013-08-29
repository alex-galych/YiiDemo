<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $this HomePageBannersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Home Page Banners',
);

$this->menu=array(
	array('label'=>'Create HomePageBanners', 'url'=>array('create')),
	array('label'=>'Manage HomePageBanners', 'url'=>array('admin')),
);
?>

<h1>Home Page Banners</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
