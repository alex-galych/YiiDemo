<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $this SiteController */
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
    <script src="/js/modernizr-1.6.min.js"></script>
<!--    <script src="/js/jquery.js"></script>-->
    <meta charset="utf-8">
    <!--[if IE]><![endif]-->
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge;chrome=1"><![endif]-->
    <title>Lifetrust, LLC</title>
    <meta name="description" content="">
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css?v=1">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
</head>
<!--[if lt IE 7 ]>	<body class="ie ie6"> <![endif]-->
<!--[if IE 7 ]>		<body class="ie ie7"> <![endif]-->
<!--[if IE 8 ]>		<body class="ie ie8"> <![endif]-->
<!--[if IE 9 ]>		<body class="ie ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <body> <!--<![endif]-->
<div id="container">
    <header>
        <div class="supernav">
            <div class="frame clearfix">
                <ul>
                    <li><a href="/industry-overview">Industry Overview</a></li>
                    <li><a href="/sitemap">Sitemap</a></li>
                </ul>
            </div>
        </div>


        <nav class="mainnav">
            <div class="frame clearfix">
                <strong class="logo"><a href="/"><img src="/images/logo.png" alt="Lifetrust" /></a></strong>
                <ul>
                    <?foreach($this->allPages as $page): ?>
                        <? if( !isset($page['headMenuItem'])): ?>
                            <li class="<?=( $this->activePage == $page['url'] ? 'active' : '') ?>"><a href="/<?=$page['url']?>"><?=$page['title']?></a></li>
                        <? endif ?>
                    <? endforeach ?>
                </ul>
            </div>
        </nav>
        <div class="mainbanner">
            <div class="shadow">
                <? if( isset($this->isFrontPage) ): ?>
                    <?php Yii::app()->bootstrap->register();
                    $listDataProvider=new CArrayDataProvider($this->homePageBanners, array(
                        'pagination'=>false,//always false
                    ));

                    $this->widget('ext.bootSlider.BootSlider',
                        array('itemView'=>'_bannerItem',//_lsit is the php file to render
                            'id'=>'Mycarouse1',//id of Carousel
                            'slide'=>array(true,Yii::app()->params['bannersShowInterval']),//to slide after 2seconds
                            'dataProvider'=>$listDataProvider,
                            'coloumCount'=>1,//no of items to shown in slider
                        ));
                    ?>
                <? else: ?>
                    <div class="bannerholder clearfix">
                        <?php echo CHtml::image((isset($this->pageTitleImg) ? Yii::app()->baseUrl.$this->pageTitleImg : "/images/contact.jpg"), "image" ,  array('width'=> 342, 'height'=> 114)); ?>
                        <div class="textsection">
                            <table style="width:775px">
                                <tr>
                                    <td>
                                        <h1 class="pagetitle"><? echo $this->pageTitle ?></h1>
                                        <?php if(isset($this->breadcrumbs)):?>
                                            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                                                'links'=>$this->breadcrumbs,
                                            )); ?><!-- breadcrumbs -->
                                        <?php endif?>
                                    </td>
                                    <td>
                                        <blockquote><?= (isset($this->quote) ? $this->quote : '<div class="lalign">“our core value is that some mission statement</div><div class="ralign">or testimonial goes here in this area...”</div>') ?></blockquote>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                <? endif ?>
            </div>
        </div>
    </header>

    <?php echo $content; ?>

    <footer>
        <div class="frame">
            <div class="row clearfix">
                <ul>
                    <?foreach($this->allPages as $page): ?>
                        <? if( !isset($page['headMenuItem'])): ?>
                            <li><a href="/<?=$page['url']?>"><?=$page['title']?></a></li>
                        <? endif ?>
                    <? endforeach ?>
                </ul>
                <div class="privacy"><a href="/privacy-policy">Privacy Policy</a></div>
            </div>
            <div class="row clearfix">
                <div class="copy">&copy; 2010 LifeTrust. All Rights Reserved.</div>
                <div class="by"><a href="http://www.bluefountainmedia.com" target="_blank">Website Design</a> by <a href="http://www.bluefountainmedia.com/blog" target="_blank">Blue Fountain Media</a></div>
            </div>
        </div>
    </footer>
</div>
<? if('Services' == $this->pageTitle): ?>
    <script src="js/script.js?v=1"></script>
<? endif ?>
<!--[if lt IE 7 ]><script src="js/dd_belatedpng.js?v=1"></script><![endif]-->
</body>
</html>