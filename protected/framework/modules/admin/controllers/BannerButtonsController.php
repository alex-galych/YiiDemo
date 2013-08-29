<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/*
 * Controller for BannerButtons
 * @property string $layout
 *
 * @author Olexandr Galych <galych@zfort.com>
 * @version $Id$
 */

class BannerButtonsController extends Controller
{
    /**
     * Check visited user on isGuest, if true -redirect to log page
     */
    public function init()
    {
        if( Yii::app()->user->isGuest ){
            $this->redirect('/admin');
        }
    }

	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='/layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
        $this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
        if(isset($_GET['bannerId'])){

            $bannerButtonsCount = BannerButtons::model()->countByAttributes(array(
                'bannerId'=> $_GET['bannerId']
            ));
            if( 1 < $bannerButtonsCount){
                $this->render('create',array(
                    'model'=>false,
                ));
                return ;
            }
        }
		$model=new BannerButtons;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['BannerButtons']))
		{
            $res = $model->insertUpdateBannerButton($_POST['BannerButtons']);
            if($res){
                $model = $res;
                //$this->redirect(array('/admin'.(isset($_GET['bannerId'])? ('/banner/'.$_GET['bannerId']):'') .'/bannerButtons/view','id'=>$model->id));

                $this->redirect(array((isset($_GET['bannerId'])
                        ? '/admin/homePageBanners/view/id/'.$_GET['bannerId']
                        :'/admin/bannerButtons/view/id/'.$model->id))
                );
            }
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['BannerButtons']))
		{
            $res = $model->insertUpdateBannerButton($_POST['BannerButtons']);
            if($res){
                $model = $res;
				$this->redirect(array('/admin'.(isset($_GET['bannerId'])? ('/banner/'.$_GET['bannerId']):'') .'/bannerButtons/view','id'=>$model->id));
            }
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(array((isset($_GET['bannerId'])
                ? '/admin/homePageBanners/view/id/'.$_GET['bannerId']
                :'/admin/bannerButtons'))
            );
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        if(isset($_GET['bannerId'])){
            $dataProvider=new CActiveDataProvider('BannerButtons', array(
                'criteria'=>array(
                    'condition'=>'bannerId='.$_GET['bannerId'],
                    'order'=>'id DESC',
                )
            ));
        }else{
            $dataProvider=new CActiveDataProvider('BannerButtons');
        }

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
        $model=new BannerButtons('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['BannerButtons']))
			$model->attributes=$_GET['BannerButtons'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return BannerButtons the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=BannerButtons::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param BannerButtons $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='banner-buttons-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


}
