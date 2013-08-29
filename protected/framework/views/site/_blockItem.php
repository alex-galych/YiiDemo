<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $data $homePageBlocks */
?>

<div class="homebox">
    <div class="imgsection" style="width: 278px; height: 111px">
        <?php echo CHtml::image("/uploads/HomePageBlocks/".$data->id."/".$data->image, "image", array("style"=>'width: 100%; height: 100%;')); ?>
    </div>
    <h2 class="title"><?php echo strtoupper($data->title); ?></h2>
    <div class="desc"><?php echo $data->description; ?></div>
    <a href="<?php echo  $data->btnUrl; ?>" class="btn services" style="position: static;">
        <?php echo CHtml::image("/uploads/HomePageBlocks/".$data->id."/".$data->btnImg, "image", array()); ?>
    </a>
</div>