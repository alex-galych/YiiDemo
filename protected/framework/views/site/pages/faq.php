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
/* @var $faqArr array of FAQ Body and Categories */

$this->pageTitle='FAQ';
$this->breadcrumbs=array(
	'Faq',
);
?>
<article>
    <div class="shadow">
        <div class="contentholder">
            <div class="shadowcontentholder clearfix">
                <div class="content">
                    <div class="contactholder">
                        <?php
                            foreach($faqArr as $key=>$value){
                                $faqArr[$key] = $this->renderPartial('_faqItem',array('items'=>$value['Items']),true,false,true);
                            }
                            $this->widget('zii.widgets.jui.CJuiAccordion', array(
                                'panels'=>$faqArr,
                                'skin'=>'default',
                                'options'=>array(
                                    'collapsible'=>true,
                                    'active'=>0,
                                    'animated'=>'bounceslide',
                                ),
                                'htmlOptions'=>array(
                                    'style'=>'width:705px;',
                                    'class'=> 'accordion',
                                ),
                            ));
                        ?>
                    </div>
                </div>
                <div class="sidebar">
                    <ul>
                        <li class=""><a href="/services">Services</a></li>
                        <li class=""><a href="/contact">Contact Us</a></li>
                        <li class="active"><a href="/faq">FAQ</a></li>
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
</article>
