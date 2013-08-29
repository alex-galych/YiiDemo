<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/*
 * Class SiteController
 *
 * @property string $pageTitleImg
 * @property string $pageTitleQuote
 * @property string $isFrontPage
 * @property string $homePageBanners
 * @property string $quote
 * @property string $activePage
 * @property string $allPages
 *
 * @author Olexandr Galych <galych@zfort.com>
 * @version $Id$
 */



class SiteController extends Controller
{
    public $pageTitleImg;
    public $pageTitleQuote;
    public $isFrontPage;
    public $homePageBanners;
    public $quote;
    public $activePage;
    public $allPages;


    /**
     *Declare initial controller params
     */
    public function init()
    {
        $this->layout = 'main';
        $dynamicPage = DynamicPages::model()->getAllDynamicPage();
        foreach($dynamicPage as $key=>$page){
            if(!in_array($page->uri, array('about','why-us'))){
                $this->allPages[$key] = array('url' => $page->uri, 'title'=> $page->title, 'headMenuItem' => false);
            }else{
                $this->allPages[$key] = array('url' => $page->uri, 'title'=> $page->title);
            }
        }
        $staticPage = array(
            array('url'=>'services', 'title'=>'Services'),
            array('url'=>'faq', 'title'=>'FAQ'),
            array('url'=>'contact', 'title'=>'Contact'),
            array('url'=>'sitemap', 'title'=>'Sitemap','headMenuItem' => true));

        foreach($staticPage as $page){
            array_push($this->allPages,$page);
        }
    }

    /**
     * @return array
     */
    public function accessRules() {
        return array(
            array('allow',
                'actions'=>array('captcha'),
            ),
        );
    }

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
        $homePageBanners = HomePageBanners::model()->with('bannerButtons')->findAll();
        foreach($homePageBanners as $banner){
            $bannerButtons[$banner->id] = BannerButtons::model()->findAllByAttributes(array('bannerId'=>$banner->id));
        }
        $this->activePage = 'home';
        $this->render('index',array(
            'homePageBanners'=>$homePageBanners,
            'homePageBlocks'=>HomePageBlocks::model()->findAll(),
        ));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
                $error = DynamicPages::model()->find(
                    array(
                        'select'=>'*',
                        'condition'=>"`uri` = 'not-found'",
                    ));
				$this->render('error', array(
                            'error' => $error,
                            'dynamicPages' => DynamicPages::model()->getAllDynamicPage(),
                        )
                );
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactUs();
        if(isset($_POST['ContactUs']))
		{
			$model->attributes=$_POST['ContactUs'];
			if($model->save())
			{
                $to =  Yii::app()->params['adminEmail'].', '.$model->email;
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode('Contact Us message from http://yiiag.galych.lion.devplatform1.com/').'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

                $message = 'Name: '.$model->name."\r\n".
                       'Phone: '.$model->phone."\r\n".
                       'Inqury: '.ContactUs::model()->getInquryName($model)."\r\n".
                       'Question/ Comment: '.$model->message;

				mail($to,$subject,$message,$headers);
				Yii::app()->user->setFlash('success','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
        $this->activePage = 'contact';
        $this->render('pages/contact',array(
            'model'=>$model,
            'inqury' => Inqury::model()->getInquries(),
            'pageText' =>ContactUsPageText::model()->find(),
            'dynamicPages' => DynamicPages::model()->getAllDynamicPage(),
        ));
	}

    /**
     * Display the Service page
     */
    public function actionServices()
    {
        $sort = new CSort('Services');
        $sort->attributes =array(
            'name' => array(
                'asc'=>'name ASC',
                'desc'=>'name DESC',
                'defaultOrder' => 'name ASC',
            )
        );
        $services = Services::model()->findAll();
        $listDataProvider=new CArrayDataProvider($services, array(
            'pagination'=>array(
                'pageSize'=>6,
            ),
            'sort' => $sort
        ));
        $this->activePage = 'services';
        $this->render('pages/services',array(
                'services' => $listDataProvider,
                'sort' => $sort,
                'dynamicPages' => DynamicPages::model()->getAllDynamicPage(),
            )
        );
    }

    /**
     * Display the Dynamic pages
     *
     * @throws CHttpException
     */
    public function actionDynamicPageView(){
        $dynamicPage = DynamicPages::model()->findByAttributes(array('uri'=>$_GET['url']));
        if(!is_null($dynamicPage)){
            $this->activePage = $dynamicPage->uri;
            $this->render('pages/dynamicPage',array(
                    'page' => $dynamicPage,
                    'dynamicPages' => DynamicPages::model()->getAllDynamicPage(),
                )
            );
        }else{
            throw new CHttpException(404, 'The page you are looking for no longer exists.');
        }
    }

    /**
     * Display FAQ page
     */
    public function actionFaq()
    {
        $this->activePage = 'faq';
        $this->render('pages/faq',array(
                'faqArr' => FaqCategories::model()->getAllFaqArr(),
                'dynamicPages' => DynamicPages::model()->getAllDynamicPage(),
            )
        );
    }

    /**
     * Display Sitemap page
     */
    public function actionSiteMap(){
        $this->render('pages/sitemap',array(
                'faqArr' => FaqCategories::model()->getAllFaqArr(),
                'dynamicPages' => DynamicPages::model()->getAllDynamicPage(),
            )
        );
    }

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
        if( Yii::app()->user->isGuest ){
            $model=new LoginForm;

            // if it is ajax validation request
            if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
            {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }

            // collect user input data
            if(isset($_POST['LoginForm']))
            {
                $model->attributes=$_POST['LoginForm'];
                // validate user input and redirect to the previous page if valid
                if($model->validate() && $model->login())
                    $this->redirect('admin/ContactUs');
            }
            // display the login form
            $this->render('login',array('model'=>$model));
        }else{
            $this->redirect('/admin/contactUs');
        }
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}