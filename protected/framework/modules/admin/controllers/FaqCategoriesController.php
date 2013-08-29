<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/*
 * Class FaqCategoriesController
 * @property string $layout
 *
 *
 * @author Olexandr Galych <galych@zfort.com>
 * @version $Id$
 */

class FaqCategoriesController extends Controller
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
				'actions'=>array('admin','delete', 'reposition'),
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
		$model=new FaqCategories;
        $criteria = new CDbCriteria;
        $criteria->select='MAX(orderCategory) as `orderCategory`';
        $criteria->condition='';
        $criteria->params=array();
        $row = FaqCategories::model()->find($criteria);
        $model->orderCategory = ( is_null($row->orderCategory) ? 0 : $row->orderCategory + 1  );

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['FaqCategories']))
		{
			$model->attributes=$_POST['FaqCategories'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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

		if(isset($_POST['FaqCategories']))
		{
			$model->attributes=$_POST['FaqCategories'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('FaqCategories');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new FaqCategories('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FaqCategories']))
			$model->attributes=$_GET['FaqCategories'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return FaqCategories the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=FaqCategories::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param FaqCategories $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='faq-categories-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionReposition(){
        if(isset($_GET['direction']) &&  isset($_GET['id']) && isset($_GET['orderCategory'])){
            $direction = $_GET['direction'];
            $id = $_GET['id'];
            $orderCategory = $_GET['orderCategory'];
            if($direction == 'up'){

                $higherCategory = FaqCategories::model()->find(
                    array(
                        'select'=>'*',
                        'condition'=>'orderCategory < '.$orderCategory,
                        'order'=>'orderCategory DESC'
                    )
                );
                if(!is_null($higherCategory)){

                    $model=$this->loadModel($id);
                    $modeCategory = $this->loadModel($higherCategory->id);
                    $model->replaceCategoriesOrder($modeCategory);
//                    $currOrderCategory = $model->orderCategory;
//                    $model->orderCategory = $higherCategory->orderCategory;
//                    $modelHigherCategory =$this->loadModel($higherCategory->id);
//                    $modelHigherCategory->orderCategory = $currOrderCategory;
//                    $modelHigherCategory->save();
//                    $model->save();

                    //var_dump($higherCategory->orderCategory);die;
                }
            }else{
                $lowerCategory = FaqCategories::model()->find(
                    array(
                        'select'=>'*',
                        'condition'=>'orderCategory > '.$orderCategory,
                        'order'=>'orderCategory ASC'
                    )
                );
                if(!is_null($lowerCategory)){
                    $model=$this->loadModel($id);
                    $modeCategory = $this->loadModel($lowerCategory->id);
                    $model->replaceCategoriesOrder($modeCategory);
                }
            }
        }
        $this->redirect(array('admin'));
    }
}
