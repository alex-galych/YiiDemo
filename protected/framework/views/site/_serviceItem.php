<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $data Services */
?>

<li>
    <h2 class="title clearfix">
        <?php echo CHtml::image("/uploads/Services/".$data->id."/".$data->image, "image", array('width'=> 46, 'height'=> 33)); ?>
        <?=strtoupper($data->name) ?>
    </h2>
    <div class="desc"><?=$data->description ?></div>
    <div class="btnsection clearfix"><a href="#" onclick="loadPopup('toPopup<?=$data->id?>');" class="btn moresmall topopup">more</a></div>

    <div class="toPopup" id="toPopup<?=$data->id?>">
        <div class="close" onclick="disablePopup('toPopup<?=$data->id?>')">Close</div>
        <h1><?=$data->name ?></h1>
        <h4><?=$data->description ?></h4>
        <div id="popup_content"><?=$data->text ?></div> <!--your content end-->
    </div>
</li>