<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $this FaqBodyController */
/* @var $model FaqBody */
/* @var $form CActiveForm */
/* @var $category FaqCategories */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'faq-body-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'faqCategory'); ?>
        <?php echo $form->dropDownList($model,'faqCategory',$category); ?>
        <?php echo $form->error($model,'faqCategory'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'ask'); ?>
        <?php echo $form->textArea($model, 'ask', array('maxlength' => 250, 'rows' => 3, 'cols' => 60)); ?>
        <?php echo $form->error($model,'ask'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'answer'); ?>
        <?php echo $form->textArea($model, 'answer', array('maxlength' => 500, 'rows' => 3, 'cols' => 60)); ?>
		<?php echo $form->error($model,'answer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isActive'); ?>
        <?php echo $form->checkBox($model,'isActive'); ?>
		<?php echo $form->error($model,'isActive'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->