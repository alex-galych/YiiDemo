<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $this InquryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Inquries',
);

$this->menu=array(
	array('label'=>'Create Inqury', 'url'=>array('create')),
	array('label'=>'Manage Inqury', 'url'=>array('admin')),
);
?>

<h1>Inquries</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
