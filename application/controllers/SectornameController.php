<?php
include_once APPLICATION_PATH.'/models/vmWebServices/WS_Query.php';
include_once APPLICATION_PATH.'/controllers/helper/Tools.php';

class SectornameController extends Zend_Controller_Action {
	
	public function init() {
        /* Initialize action controller here */
    }
    
	public function sectornameslistAction() {
		
		// Falls Session beendet, dann geh zur LogIn-Maske
		if (Tools::sessionNotAvailable()) {
			$this->_helper->redirector->gotoUrl('http://'.$_SERVER['SERVER_NAME'].'/vmweb/public');
		};
		try {
			$form = new Application_Form_Customer();
				$sectorName	= $this->_request->getParam('sectorName');
				$genericTerm= $this->_request->getParam('genericTerm');
				$mainTerm	= $this->_request->getParam('mainTerm');
				$id			= $this->_request->getParam('id');
				$page		= $this->_request->getParam('page');
				$newRequest	= $this->_request->getParam('newReq');
			
				// Gibt die Eigenschaften des Kunden, das selektiert wurde aus.
				$query		 = array('sectorName'=>$sectorName, 'genericTerm'=>$genericTerm, 
									 'mainTerm'=>$mainTerm,'id'=>$id);
				$sectorNamesObj = new WsQuery();
	            $sectorNames = (array) $sectorNamesObj->getSectorNames($query, $page, $newRequest);
	            if (count($sectorNames)>0) {
	            	$this->view->sectorNames =  $sectorNames; 
	            } else {
	            	$this->view->info = "Nichts gefunden, was Ihren Angaben entsprechen w&uuml;rde!";
	            }
			
		} catch (Exception $e) {
			if (strpos($e,"connection closed")!==false) {
				$this->_helper->redirector->gotoUrl('http://'.$_SERVER['SERVER_NAME'].'/vmweb/public');
			} else {
				$this->view->info = "Eingabefehler! Bitte korrigieren Sie Ihr Suche.";
			}
		}		
	}
	
	public function sectornamessearchAction() {
		$form = new Application_Form_SectorNames();
		$form->setAction('/vmweb2009R1/public/metadatas/sectornameslist');
        $this->view->form = $form;
        
        // Falls Session beendet, dann geh zur LogIn-Maske
		if (Tools::sessionNotAvailable()) {
			$this->_helper->redirector->gotoUrl('http://'.$_SERVER['SERVER_NAME'].'/vmweb/public');
		};
	}

	public function sectornamedetailAction() {

		$formSectorName = new Application_Form_SectorNames();
		$this->view->formSectorName = $formSectorName;
		
		// Falls Session beendet, dann geh zur LogIn-Maske
		if (Tools::sessionNotAvailable()) {
			$this->_helper->redirector->gotoUrl('http://'.$_SERVER['SERVER_NAME'].'/vmweb/public');
		};

		try {
	        $idNumber = $this->_getParam('id',0);
        	$sectorNameQuery 	= new WsQuery();
	        $sectorNameArray = $sectorNameQuery->getSectorName($idNumber);
			$formSectorName->populate($sectorNameArray);
			
		} catch (Exception $e) {
			if (strpos($e,"connection closed")!==false) {
				$this->_helper->redirector->gotoUrl('http://'.$_SERVER['SERVER_NAME'].'/vmweb/public');
			} else {
				$this->view->info = "Eingabefehler! Bitte korrigieren Sie Ihr Suche.";
			}
		}	
	}
	
	public function addsectornameAction() {
		$formProfile = new Application_Form_SectorNames();
		$this->view->formSectorName = $formSectorName;
		
		// Falls Session beendet, dann geh zur LogIn-Maske
		if (Tools::sessionNotAvailable()) {
			$this->_helper->redirector->gotoUrl('http://'.$_SERVER['SERVER_NAME'].'/vmweb/public');
		};
	}
}