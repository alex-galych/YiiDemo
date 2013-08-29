<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/* @var $this SiteController */
/* @var $model ContactUs */
/* @var $pageText string */

$this->pageTitle= "CONTACT US";
$this->pageTitleImg = "/images/contact.jpg";
$this->breadcrumbs=array(
    'Contact',
);
?>
<article>
    <div class="shadow">
        <div class="contentholder">
            <div class="shadowcontentholder clearfix">
                <div class="content">
                    <div class="contactholder">
                        <div class="top-content">
                            <?php echo CHtml::decode($pageText->text); ?>
                        </div>
                        <div class="contactform">
                            <?php if(Yii::app()->user->hasFlash('success')): ?>
                                <hr>
                                <div class="info">
                                    <?php echo Yii::app()->user->getFlash('success'); ?>
                                </div>
                                <hr>
                            <?php endif; ?>
                            <?php $form=$this->beginWidget('CActiveForm', array(
                                'id'=>'contact-us-form',
                                'enableAjaxValidation'=>false,
                            )); ?>

                            <p>We would to hear from you!  Feel free to contact us at any time regarding <br /> any questions or concerns you may have.
                                <span class="required">*</span> <span style="color:white">= required</span>
                            </p>

                            <?php echo $form->errorSummary($model); ?>

                            <div class="row">
                                <?php echo $form->labelEx($model,'inquiryId'); ?>
                                <?php echo $form->dropDownList($model,'inquiryId',$inqury); ?>
                                <?php echo $form->error($model,'inquiryId'); ?>
                            </div>

                            <div class="row">
                                <?php echo $form->labelEx($model,'name'); ?>
                                <?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
                                <?php echo $form->error($model,'name'); ?>
                            </div>

                            <div class="row">
                                <?php echo $form->labelEx($model,'email'); ?>
                                <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>200)); ?>
                                <?php echo $form->error($model,'email'); ?>
                            </div>

                            <div class="row">
                                <?php echo $form->labelEx($model,'phone'); ?>
                                <?php echo $form->textField($model,'phone',array('size'=>20,'maxlength'=>20)); ?>
                                <?php echo $form->error($model,'phone'); ?>
                            </div>

                            <div class="row">
                                <?php echo $form->labelEx($model,'message'); ?>
                                <?php echo $form->textArea($model, 'message', array('maxlength' => 500, 'rows' => 4, 'cols' => 60)); ?>
                                <?php echo $form->error($model,'message'); ?>
                            </div>

                            <div class="row">
                                <?php echo CHtml::activeLabelEx($model, 'verifyCode')?>
                                <?php $form->widget('CCaptcha') ?>
                                <div style="margin-left: 87px;"><?php echo CHtml::activeTextField($model, 'verifyCode')?></div>
                            </div>

                            <div class="row buttons btnsection">
                                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn submit')); ?>
                            </div>

                            <?php $this->endWidget(); ?>

                        </div>
                    </div>
                </div>
                <div class="sidebar">
                    <ul>
                        <li class=""><a href="/services">Services</a></li>
                        <li class="active"><a href="/contact">Contact Us</a></li>
                        <li class=""><a href="/faq">FAQ</a></li>
                        <? foreach( $dynamicPages as $page ): ?>
                            <li class=""><a href="/<?=$page->uri ?>"><?=$page->title ?></a></li>
                        <? endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</article>
