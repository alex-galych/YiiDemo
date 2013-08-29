<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $this SiteController */
/* @var $error array */

$this->pageTitle= $error->title;
$this->pageTitleImg = "/uploads/DynamicPages/".$error->id."/".$error->image;
$this->quote = $error->quote;
$this->breadcrumbs=array(
    $error->title,
);
?>
<article>
    <div class="shadow">
        <div class="contentholder">
            <div class="shadowcontentholder clearfix">
                <div class="content">
                    <div class="contactholder">
                        <div class="top-content">
                                <?php echo CHtml::decode($error->content); ?>
                        </div>
                    </div>
                </div>
                <div class="sidebar">
                    <ul>
                        <li class=""><a href="/services">Services</a></li>
                        <li class=""><a href="/contact">Contact Us</a></li>
                        <li class=""><a href="/faq">FAQ</a></li>
                        <? foreach( $dynamicPages as $page ): ?>
                            <li class=""><a href="/<?=$page->uri ?>"><?=$page->title ?></a></li>
                        <? endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</article>