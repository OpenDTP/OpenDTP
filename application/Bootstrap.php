<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected function _initOpenDTP() {
		$openDTPIniFile = new Zend_Config_Ini(APPLICATION_PATH . '/configs/opendtp.ini', APPLICATION_ENV);
		Zend_Registry::set('OpenDTP', $openDTPIniFile);
	}

	protected function _initAutoLoader() {
		$autoloader = Zend_Loader_Autoloader::getInstance();
	}
}

