<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $data $homePageBanners */
?>

<div class="thumbnail span2" style="width: 940px; height: 326px; margin-left: 0px; padding: 0px; border: none;">
    <div class="bannerholder bannerholder-frontpage  clearfix" id="bannerholderId<?=$data->id?>">
        <?php echo CHtml::image("/uploads/HomePageBanners/".$data->id."/".$data->image, "image", array('style'=>'width: 100%; height: 100%;')); ?>
        <div class="textsection">
            <table>
                <tr>
                    <td>
                        <div class="text"><?=strtoupper($data->name) ?></div>
                        <h1 class="title"><?=$data->description ?></h1>
                        <div class="clearfix">
                            <?php foreach( $data->bannerButtons as $button) : ?>
                                <a href="<?php echo $button->url; ?>" class="btn invest">
                                    <?php echo CHtml::image("/uploads/BannerButtons/".$button->id."/".$button->image, "image", array()); ?>
                                </a>
                            <? endforeach ?>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>