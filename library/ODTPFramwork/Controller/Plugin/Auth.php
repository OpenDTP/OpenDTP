<?php

class ODTPFramework_Controller_Plugin_Auth extends Zend_Controller_Plugin_Abstract
{
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        if ('admin' != $request->getModuleName()) {
            return;
        }

        if (App_Model_Users::isLoggedIn() && App_Model_Users::isAdmin()) {
            return;
        }

        $request->setModuleName('default')
            ->setControllerName('login')
            ->setActionName('login')
            ->setDispatched(FALSE);
    }
}
