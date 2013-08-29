<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $this ContactUsPageTextController */
/* @var $model ContactUsPageText */

$this->breadcrumbs=array(
	'Contact Us Page Texts'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ContactUsPageText', 'url'=>array('index')),
	array('label'=>'Create ContactUsPageText', 'url'=>array('create')),
	array('label'=>'View ContactUsPageText', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ContactUsPageText', 'url'=>array('admin')),
);
?>

<h1>Update ContactUsPageText <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>