<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 * UserLog logging user activity on this web site.
 */

/**
 * UserLog log User visited page in logging table.
 */
class UserLog extends CApplicationComponent
{
    /**
     * UserLog logging user activity on this web site.
     */
    public function init() {
        // Init this component
    }

    /**
     * Log user activity on web site
     * @param $event
     */
    public function onChangeUrl($event)
    {
        if(Yii::app()->getRequest()->getPathInfo() != 'admin'){
            $userLog = new Logging();
            $userLog->visitPageLog(Yii::app()->getRequest()->getPathInfo());
        }
    }
}
