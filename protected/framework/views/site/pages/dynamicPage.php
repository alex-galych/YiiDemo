<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $this SiteController */
/* @var $page DynamicPages */
/* @var $dynamicPages array of DynamicPages */

$this->pageTitle= $page->title;
$this->pageTitleImg = "/uploads/DynamicPages/".$page->id."/".$page->image;
$this->quote = $page->quote;
$this->breadcrumbs=array(
    $page->title,
);
?>
<article>
    <div class="shadow">
        <div class="contentholder">
            <div class="shadowcontentholder clearfix">
                <div class="content">
                    <div class="contactholder cms">
                        <? echo CHtml::decode($page->content); ?>
                    </div>
                </div>
                <div class="sidebar">
                    <ul>
                        <li class=""><a href="/services">Services</a></li>
                        <li class=""><a href="/contact">Contact Us</a></li>
                        <li class=""><a href="/faq">FAQ</a></li>
                        <? foreach( $dynamicPages as $row ): ?>
                            <li class="<?php echo ( $row->uri == $page->uri ? 'active' : '' ); ?>">
                                <a href="/<?php echo $row->uri; ?>"><?php echo $row->title; ?></a>
                            </li>
                        <? endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</article>

