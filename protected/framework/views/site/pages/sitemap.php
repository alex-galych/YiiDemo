<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $this SiteController */

$this->pageTitle= "SITEMAP";
$this->breadcrumbs=array(
    'Sitemap',
);
?>
<article>
    <div class="shadow">
        <div class="contentholder">
            <div class="shadowcontentholder clearfix">
                <div class="content">
                    <div class="contactholder sitemap">
                        <div class="sitemap-block">
                            <h1><a href="/">Home</a>
                                <ul>
                                    <? foreach($this->allPages as $page): ?>
                                        <? if(isset($page['headMenuItem']) && !$page['headMenuItem']): ?>
                                            <li>
                                                <a href="/<?php echo $page['url']; ?>"><?php echo $page['title']; ?></a>
                                            </li>
                                        <? endif ?>
                                    <? endforeach ?>
                                </ul>
                            </h1>
                            <? foreach($this->allPages as $page):?>
                                <? if(!isset($page['headMenuItem']) || (isset($page['headMenuItem']) && $page['headMenuItem'])): ?>
                                    <h1>
                                        <a href="/<?php echo $page['url'];?>"><?php echo $page['title'];?></a>
                                    </h1>
                                <? endif ?>
                            <? endforeach ?>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</article>
