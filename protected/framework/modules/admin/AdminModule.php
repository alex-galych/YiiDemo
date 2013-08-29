<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/*
 * Class for Admin Module
 * @property string $homeUrl
 *
 * @author Olexandr Galych <galych@zfort.com>
 * @version $Id$
 */


/**
 * Class AdminModule
 */
class AdminModule extends CWebModule
{
    /**
     * @var string
     */
    public $homeUrl="/admin/";

    /**
     * this method is called when the module is being created
     * you may place code here to customize the module or the application
     */
    public function init()
	{
		// import the module-level models and components
		$this->setImport(array(
			'admin.models.*',
			'admin.components.*',
		));
	}

    /**
     * @param $controller
     * @param $action
     * @return bool
     */
    public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
