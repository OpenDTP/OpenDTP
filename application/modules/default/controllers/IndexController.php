<?php

class IndexController extends ODTPFramwork_Controller {

    public function indexAction() {
    }

    public function loginAction() {
    	$login = $this->getRequest()->getParam('login');
    	$password = $this->getRequest()->getParam('password');

    	$this->view->login = $login;
    	$this->view->password = $password;
    }

}

