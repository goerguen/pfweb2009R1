<?php

class LogoutController extends Zend_Controller_Action
{

    public function init() {
        /* Initialize action controller here */
    }
    
    public function logoutAction() {
    		    		
		session_start();
		unset($_SESSION['vmweb']);
		$this->_helper->redirector->gotoUrl('http://'.$_SERVER['SERVER_NAME'].'/vmweb/public');
	
	}
}







