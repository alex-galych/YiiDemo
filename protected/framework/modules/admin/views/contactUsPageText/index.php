<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $this ContactUsPageTextController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Contact Us Page Texts',
);

$this->menu=array(
	array('label'=>'Create ContactUsPageText', 'url'=>array('create')),
	array('label'=>'Manage ContactUsPageText', 'url'=>array('admin')),
);
?>

<h1>Contact Us Page Texts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
