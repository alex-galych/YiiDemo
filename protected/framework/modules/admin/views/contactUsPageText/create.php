<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $this ContactUsPageTextController */
/* @var $model ContactUsPageText */

$this->breadcrumbs=array(
	'Contact Us Page Texts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ContactUsPageText', 'url'=>array('index')),
	array('label'=>'Manage ContactUsPageText', 'url'=>array('admin')),
);
?>

<h1>Create ContactUsPageText</h1>

<?php
    if( $model ){
        echo $this->renderPartial('_form', array('model'=>$model));
    }else{
        echo '<div class="flash-error">You can\'t create more then 1 Contact Us Page Text!</div>';
    }
?>