<?php

include_once APPLICATION_PATH.'/controllers/helper/Tools.php';
include_once APPLICATION_PATH.'/models/vmWebServices/WS_GetAccessRights.php';
include_once APPLICATION_PATH.'/models/vmWebServices/WS_AddressType.php';

class StartController extends Zend_Controller_Action
{

    public function init() {
        /* Initialize action controller here */
    }
	
	public function startpageAction() {
		
        // Falls Session beendet, dann geh zur LogIn-Maske
		if (Tools::sessionNotAvailable()) {
			$this->_helper->redirector->gotoUrl('http://'.$_SERVER['SERVER_NAME'].'/vmweb/public');
		};
        
		try {		
			$vmAccessRights = new WsGetAccessRights();
			$this->view->hello = $vmAccessRights->getVmAccessRights();
	        
		} catch (Exception $e) {
			if (strpos($e,"connection closed")!==false) {
				$this->_helper->redirector->gotoUrl('http://'.$_SERVER['SERVER_NAME'].'/vmweb/public');
			} else {
				$this->view->info = "Eingabefehler! Bitte korrigieren Sie Ihr Suche.";
			}
		}
	}
}