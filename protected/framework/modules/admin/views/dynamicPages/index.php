<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $this DynamicPagesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dynamic Pages',
);

$this->menu=array(
	array('label'=>'Create DynamicPages', 'url'=>array('create')),
	array('label'=>'Manage DynamicPages', 'url'=>array('admin')),
);
?>

<h1>Dynamic Pages</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
