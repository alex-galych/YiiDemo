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
	'Logging',
);

$this->menu=array();
?>

<h1>Manage Logging</h1>

<?php
    $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'logging-grid',
	'dataProvider'=>$model,
	'columns'=>array(
		'sessionId',
        'startTime',
		'sessionTime',
        array('name'=>'visitedPageCount',
            'header' => 'Visited Page',
            'type'=>'html',
            'value'=> '$data->visitedPageCount'
        ),
        array('name'=>'secondsOnPage',
            'header' => 'Average Seconds On Page',
            'type'=>'html',
            'value'=> '$data->secondsOnPage'
        ),
		array(
			'class'=>'CButtonColumn',
            'template'=>'{view}{delete}',
            'viewButtonUrl'=>'Yii::app()->controller->createUrl("/admin/logging/view/",array( "id"=>$data["sessionId"]) )',
            'deleteButtonUrl'=>'Yii::app()->controller->createUrl("/admin/logging/delete/", array( "id"=>$data["sessionId"] ) )',
		),
	),
)); ?>
