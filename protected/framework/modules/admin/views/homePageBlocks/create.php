<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $this HomePageBlocksController */
/* @var $model HomePageBlocks */

$this->breadcrumbs=array(
	'Home Page Blocks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List HomePageBlocks', 'url'=>array('index')),
	array('label'=>'Manage HomePageBlocks', 'url'=>array('admin')),
);
?>

<h1>Create HomePageBlocks</h1>

<?php
if( $model ){
    echo $this->renderPartial('_form', array('model'=>$model));
}else{
    echo '<div class="flash-error">You can\'t create more then 3 blocks!</div>';
}
?>