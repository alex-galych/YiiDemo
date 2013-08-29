<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $this FaqBodyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Faq Questions',
);

$this->menu=array(
	array('label'=>'Create FaqQuestion', 'url'=>array('create')),
	array('label'=>'Manage FaqQuestion', 'url'=>array('admin')),
);
?>

<h1>Faq FaqQuestions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
