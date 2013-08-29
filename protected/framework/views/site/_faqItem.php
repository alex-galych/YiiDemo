<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/*
 * array $item
 */
?>

<? foreach ($items as $row): ?>

    <div class="faq-item">
        <div class="gaq-item-ask" style="margin-bottom: 10px;">
            <span style="color: #f9a4a4;">Ask:</span> <?php echo $row['ask']; ?>
        </div>
        <div class="gaq-item-answer">
            <span style="color: #bee8ca;">Answer:</span> <?php echo $row['answer']; ?>
        </div>
    </div>
    <hr>

<? endforeach ?>