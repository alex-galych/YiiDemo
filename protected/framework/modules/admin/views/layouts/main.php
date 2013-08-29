<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $this Controller */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo">Admin Page</div>
	</div><!-- header -->
	<div id="mainmenu">
        <?php $this->widget('zii.widgets.CMenu',array(
            'items'=>array(
                array('label'=>'Services', 'url'=>array('/admin/services'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Home Banners', 'url'=>array('/admin/homePageBanners'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Home Blocks', 'url'=>array('/admin/homePageBlocks'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Dynamic Pages', 'url'=>array('/admin/dynamicPages'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'FAQ Categories', 'url'=>array('/admin/faqCategories'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'FAQ Questions', 'url'=>array('/admin/faqQuestions'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Contact Page', 'url'=>array('/admin/contactUs'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Logging', 'url'=>array('/admin/logging'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),
        )); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
			'homeLink' => CHtml::link('Admin',array('/admin')),
		)); ?><!-- breadcrumbs -->
	<?php endif?>


	<?php   //content
        echo $content;
    ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Zfort.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
