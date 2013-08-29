<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $this SiteController */
/* @var $services array of Services */
/* @var $dynamicPages array of DynamicPages */

$this->pageTitle= 'Services';
$this->pageTitleImg = "/images/services.jpg";
$this->breadcrumbs=array(
    'Services',
);
?>
<article>
    <div class="shadow">
        <div class="contentholder">
            <div class="shadowcontentholder clearfix">
                <div class="content service-content">
                    <div class="contactbox">
                        <div class="imgsection"><img src="/images/contactman.png" alt="" /></div>
                        <div class="contacts">
                            <div class="title">Call us today!</div>
                            <dl>
                                <dt>Tel:</dt>
                                <dd>212.653.0840</dd>
                                <dt>Fax:</dt>
                                <dd>212.653.0844</dd>
                            </dl>
                            <div class="btnsection"><a href="contact" class="btn contactus">contact us</a></div>
                        </div>
                    </div>
                    <div class="ohidden">
                        <ul class="services">
                            <?php $this->widget('zii.widgets.CListView', array(
                                    'dataProvider'=>$services,
                                    'itemView'=>'_serviceItem',
                                    'template'=>"{sorter}{items}{pager}",
                                    'enablePagination'=>true,
                                    'enableSorting' => true,
                                    'sortableAttributes'=>array(
                                        'name'=>'Name',
                                    ),
                                    'pager' => array(
                                        'header' => '',
                                    ),
                                    'pagerCssClass'=>'pagination',
                                ));
                            ?>
                        </ul>
                        <div class="service"></div>
                    </div>
                </div>
                <div class="sidebar">
                    <ul>

                        <li class="active"><a href="/services">Services</a></li>
                        <li class=""><a href="/contact">Contact Us</a></li>
                        <li class=""><a href="/faq">FAQ</a></li>
                        <? foreach( $dynamicPages as $page ): ?>
                            <li class="">
                                <a href="/<?php echo $page->uri; ?>"><?php echo $page->title; ?></a>
                            </li>
                        <? endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="backgroundPopup" onclick="disablePopup();"></div>
</article>
