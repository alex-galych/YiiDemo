<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $this HomePageBlocksController */
/* @var $model HomePageBlocks */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'home-page-blocks-form',
	'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
        <?php Yii::import('ext.imperavi.ImperaviRedactorWidget');
            $this->widget('application.extensions.imperavi.ImperaviRedactorWidget', array(
                'model' => $model,
                'attribute' => 'description',
                'name' => 'my_input_name',
                'options' => array(
                    'lang' => 'en',
                    'toolbar' => true,
                    'iframe' => false,
                ),
            ));
        ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo CHtml::activeFileField($model,'image'); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'btnUrl'); ?>
		<?php echo $form->textField($model,'btnUrl',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'btnUrl'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'btnImg'); ?>
		<?php echo CHtml::activeFileField($model,'btnImg'); ?>
		<?php echo $form->error($model,'btnImg'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->