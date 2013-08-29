<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $this ContactUsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Contact Us',
);

$this->menu=array(
	array('label'=>'Create ContactUs', 'url'=>array('create')),
	array('label'=>'Manage ContactUs', 'url'=>array('admin')),
	array('label'=>'Manage Inquries', 'url'=>array('/admin/inqury')),
	array('label'=>'Manage ContactUs Text', 'url'=>array('/admin/contactUsPageText')),
);
?>

<h1>Contact Us</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
