<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $this HomePageBannersController */
/* @var $model HomePageBanners */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'home-page-banners-form',
	'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
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

	<div class="row" style="float: left">
		<?php echo $form->labelEx($model,'image'); ?>
        <?php echo CHtml::activeFileField($model,'image'); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

    <?php if(isset($model->id)) :?>
        <a href="/index.php/admin/banner/<?=$model->id?>/bannerButtons/admin"><div style="float: right; margin-top: 25px;"">Manage Buttons for Banners</div></a>
    <?php endif ?>
    <hr>
    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>
<?php $this->endWidget(); ?>

</div><!-- form -->