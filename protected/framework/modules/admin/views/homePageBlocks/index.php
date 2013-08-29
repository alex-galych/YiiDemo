<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $this HomePageBlocksController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Home Page Blocks',
);

$this->menu=array(
	array('label'=>'Create HomePageBlocks', 'url'=>array('create')),
	array('label'=>'Manage HomePageBlocks', 'url'=>array('admin')),
);
?>

<h1>Home Page Blocks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
