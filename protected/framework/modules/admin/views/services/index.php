<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $this ServicesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Services',
);

$this->menu=array(
	array('label'=>'Create Services', 'url'=>array('create')),
	array('label'=>'Manage Services', 'url'=>array('admin')),
);
?>

<h1>Services</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
