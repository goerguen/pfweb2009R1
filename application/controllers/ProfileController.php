<?php

include_once APPLICATION_PATH.'/models/vmWebServices/WS_AddressType.php';
include_once APPLICATION_PATH.'/models/vmWebServices/WS_Query.php';
include_once APPLICATION_PATH.'/models/Lists/InfoFenster.php';
include_once APPLICATION_PATH.'/controllers/helper/Tools.php';

class ProfileController extends Zend_Controller_Action {
	
	public function init() {
        /* Initialize action controller here */
    }
    
	public function profileslistAction() {
		
		// Falls Session beendet, dann geh zur LogIn-Maske
		if (Tools::sessionNotAvailable()) {
			$this->_helper->redirector->gotoUrl('http://'.$_SERVER['SERVER_NAME'].'/vmweb/public');
		};
        
		try {
			$form = new Application_Form_Profile();
			if ($this->_request->isPost()) {
				$idNumber	= $this->_request->getParam('idNumber');
				$customerNo	= $this->_request->getParam('customerNo');
				$keyName	= $this->_request->getParam('keyName');
				$name1		= $this->_request->getParam('name1');
				$area		= $this->_request->getParam('area');
				$priority	= $this->_request->getParam('priority');
				$pc			= $this->_request->getParam('pc');
				$city		= $this->_request->getParam('city');
				
				// Gibt die Eigenschaften des Kunden, das selektiert wurde aus.
				$searchCustomerArray = array(	'customerNo'=>$customerNo,	'keyName'=>$keyName,	'name1'=>$name1, 
												'area'=>$area,				'priority'=>$priority, 
												'pc'=>$pc,					'city'=>$city);
				
				$customersObj = new WsAddressType();
	            $customers = (array) $customersObj->searchAddress('KU', $searchCustomerArray);
	                        
	            if (count($customers)>0) {
	            	$this->view->customers = $customers; 
	            } else {
	            	$this->view->info = "Nichts gefunden, was Ihren Angaben entsprechen w&uuml;rde!";
	            }
			}
		} catch (Exception $e) {
			if (strpos($e,"connection closed")!==false) {
				$this->_helper->redirector->gotoUrl('http://'.$_SERVER['SERVER_NAME'].'/vmweb/public');
			} else {
				$this->view->info = "Eingabefehler! Bitte korrigieren Sie Ihr Suche.";
			}
		}		
	}
	
	public function profilessearchAction() {
		$form = new Application_Form_Profile();
        $form->submit->setLabel('Suchen');
        $this->view->formProfiles = $form;
        
        // Falls Session beendet, dann geh zur LogIn-Maske
		if (Tools::sessionNotAvailable()) {
			$this->_helper->redirector->gotoUrl('http://'.$_SERVER['SERVER_NAME'].'/vmweb/public');
		};
        
        if ($this->getRequest()->isPost()) {
			$this->_forward('profileslist');
        }
	}

	public function profiledetailAction() {

		$formProfile = new Application_Form_Profile();
		$this->view->formProfile = $formProfile;
		
		// Falls Session beendet, dann geh zur LogIn-Maske
		if (Tools::sessionNotAvailable()) {
			$this->_helper->redirector->gotoUrl('http://'.$_SERVER['SERVER_NAME'].'/vmweb/public');
		};

		try {
	        $idNumber = $this->_getParam('id',0);
        	$profileQuery 	= new WsQuery();
	        $profileArray = $profileQuery->getProfileDetail($idNumber);
			$formProfile->populate($profileArray);
			
		} catch (Exception $e) {
			if (strpos($e,"connection closed")!==false) {
				$this->_helper->redirector->gotoUrl('http://'.$_SERVER['SERVER_NAME'].'/vmweb/public');
			} else {
				$this->view->info = "Eingabefehler! Bitte korrigieren Sie Ihr Suche.";
			}
		}	
	}	
	
	public function addprofileAction() {
		$formProfile = new Application_Form_Profile();
		$this->view->formProfile = $formProfile;
		
		// Falls Session beendet, dann geh zur LogIn-Maske
		if (Tools::sessionNotAvailable()) {
			$this->_helper->redirector->gotoUrl('http://'.$_SERVER['SERVER_NAME'].'/vmweb/public');
		};
	}
}