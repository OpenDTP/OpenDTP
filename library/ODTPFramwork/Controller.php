<?php

class ODTPFramwork_Controller extends Zend_Controller_Action {
	protected function setTitle() {
		$request = $this->getRequest();

		// Setting page title
		$this->view->headTitle('OpenDTP');
		if ('default' !== $request->getModuleName()) {
			$this->view->headTitle($request->getModuleName());
		}
		$this->view->headTitle()->setSeparator('::');
	}

	protected function setFlatUI() {
		$this->view->headLink()->appendStylesheet('/css/bootstrap.css')
			->appendStylesheet('/css/flat-ui.css');
		$this->view->headScript()->appendFile('/js/jquery-1.8.3.min.js');
	}

	public function init() {
		parent::init();
		$this->setTitle();
		$this->setFlatUI();

		// Setting meta
		$this->view->headMeta()->appendHttpEquiv('Content-Type', 'text/html; charset=UTF-8');
	}
}
