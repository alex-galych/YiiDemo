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
	'Create',
);

$this->menu=array(
	array('label'=>'List HomePageBanners', 'url'=>array('index')),
	array('label'=>'Manage HomePageBanners', 'url'=>array('admin')),
);
?>

<h1>Create HomePageBanners</h1>
<?php
if( $model ){
    echo $this->renderPartial('_form', array('model'=>$model));
}else{
    echo '<div class="flash-error">You can\'t create more then 3 banners!</div>';
}
?>