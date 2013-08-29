<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $homePageBanners homePageBanners */
/* @var $homePageBlocks homePageBlocks */

/* @var $this SiteController */
    $this->isFrontPage = true;
    $this->homePageBanners = $homePageBanners;
?>
<article>
    <div class="shadow">
        <div class="homecontent">
            <div class="homeboxes clearfix">

                <?php
                    $listDataProvider=new CArrayDataProvider($homePageBlocks, array(
                        'pagination'=>false,//always false
                    ));
                    $this->widget('zii.widgets.CListView', array(
                        'dataProvider'=>$listDataProvider,
                        'itemView'=>'_blockItem',
                        'template'=>'{items}'
                    ));
                ?>
            </div>
        </div>
    </div>
</article>