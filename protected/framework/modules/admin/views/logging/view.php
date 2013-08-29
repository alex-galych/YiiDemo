<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $this LoggingController */
/* @var $model Logging */

$this->breadcrumbs=array(
    'Logging'=>array('index'),
    'View Session',
);

$this->menu=array(
	array('label'=>'Delete Session', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$sessionId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Logging', 'url'=>array('index')),
);
?>

<h1>View Logging Session <?php echo $sessionId; ?></h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'logging-grid',
    'dataProvider'=>$model,
    'columns'=>array(
        'url',
        'visitTime',
        array('name'=>'secondsOnPage',
            'header' => 'Seconds On Page',
            'type'=>'html',
            'value'=> '$data->secondsOnPage'
        ),
        array(
            'class'=>'CButtonColumn',
            'template'=>'',
        ),
    ),
)); ?>
