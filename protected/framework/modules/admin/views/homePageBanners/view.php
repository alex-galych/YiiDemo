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
/* @var $modelButton BannerButtons */

$this->breadcrumbs=array(
	'Home Page Banners'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List HomePageBanners', 'url'=>array('index')),
	array('label'=>'Create HomePageBanners', 'url'=>array('create')),
	array('label'=>'Update HomePageBanners', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete HomePageBanners', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage HomePageBanners', 'url'=>array('admin')),
	array('label'=>'Manage BannerButtons', 'url'=>array('/admin/banner/'. $model->id .'/bannerButtons/admin')),
);
?>

<h1>View HomePageBanners #<?php echo $model->id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
        array(
            'label'=>'image',
            'type'=>'html',
            'value'=>( !is_null($model->image) ? '<img width="94" height="33"  src="/uploads/HomePageBanners/'. $model->id .'/'. $model->image .'"/>': 'no image'),
        ),
	),
)); ?>

<h4>Buttons: <?=count($modelButton) ?>
<? if(2 > count($modelButton)): ?>
    |<?php echo CHtml::link('Create',array('/admin/banner/'. $model->id .'/bannerButtons/create'), array("style"=>"margin-left: 10px;")); ?>
<? endif ?>
</h4>

<?php foreach($modelButton as $key=>$row): ?>
    <h6>#<?php echo ($key+1);?></h6>
    <?php echo CHtml::link('Button',array('/admin/banner/'. $model->id .'/bannerButtons/view/id/'. $row->id),array("style"=>"float: left; margin-right: 10px;")); ?>
    <?php echo CHtml::link('Update',array('/admin/banner/'. $model->id .'/bannerButtons/update/id/'. $row->id),array("style"=>"float: left; margin-right: 10px;")); ?>
    <?php echo CHtml::link('Delete',"#",
        array('submit'=>array(
            '/admin/banner/'.$model->id.'/bannerButtons/delete','id'=>$row->id),
            'confirm'=>'Are you sure you want to delete this item?'
        ),array("style"=>"float: left; margin-right: 10px;"));
    ?>
    <?php
        $this->widget('zii.widgets.CDetailView', array(
            'data'=>$row,
            'attributes'=>array(
                'url',
                array(
                    'label'=>'image',
                    'type'=>'html',
                    'value'=>( !is_null($row->image) ? '<img width="90" height="21"  src="/uploads/BannerButtons/'. $row->id .'/'. $row->image .'"/>':'no image'),
                ),
            ),
        ));
    ?>
<?php endforeach ?>
