<?php
include_once APPLICATION_PATH.'/models/vmWebServices/WS_Query.php';
include_once APPLICATION_PATH.'/controllers/helper/Tools.php';

class SalesreportController extends Zend_Controller_Action {
	
	public function init() {
        /* Initialize action controller here */
    }
    
	public function salesreportslistAction() {
		
		// Falls Session beendet, dann geh zur LogIn-Maske
		if (Tools::sessionNotAvailable()) {
			$this->_helper->redirector->gotoUrl('http://'.$_SERVER['SERVER_NAME'].'/vmweb/public');
		};
		try {
			$form = new Application_Form_SalesReports();
				$initials 	= $this->_request->getParam('initials');
				$page		= $this->_request->getParam('page');
				$newRequest	= $this->_request->getParam('newReq');
			
				// Gibt die Eigenschaften des Kontaktberichts, das selektiert wurde aus.
				$query		 = array('initials '=>$initials);
				$salesReportsObj = new WsQuery();
	            $salesReports = (array) $salesReportsObj->getSalesReports($query, $page, $newRequest);
	            if (count($salesReports)>0) {
	            	$this->view->salesReports =  $salesReports; 
	            } else {
	            	$this->view->infoSalesReportsList = "Nichts gefunden, was Ihren Angaben entsprechen w&uuml;rde!";
	            }		
		} catch (Exception $e) {
			if (strpos($e,"connection closed")!==false) {
				$this->_helper->redirector->gotoUrl('http://'.$_SERVER['SERVER_NAME'].'/vmweb/public');
			} else {
				$this->view->info = "Eingabefehler! Bitte korrigieren Sie Ihr Suche.";
			}
		}		
	}
	
	public function salesreportsearchAction() {
		$form = new Application_Form_SalesReports();
		$form->setAction('/vmweb2009R1/public/salesreport/salesreportlist');
        $this->view->form = $form;
        
        // Falls Session beendet, dann geh zur LogIn-Maske
		if (Tools::sessionNotAvailable()) {
			$this->_helper->redirector->gotoUrl('http://'.$_SERVER['SERVER_NAME'].'/vmweb/public');
		};
	}

	public function salesreportdetailAction() {

		$formSalesReport = new Application_Form_SalesReports();
		$this->view->formSalesReport = $formSalesReport;
		
		// Falls Session beendet, dann geh zur LogIn-Maske
		if (Tools::sessionNotAvailable()) {
			$this->_helper->redirector->gotoUrl('http://'.$_SERVER['SERVER_NAME'].'/vmweb/public');
		};

		try {
	        $idNumber = $this->_getParam('id',0);
        	$salesReportQuery 	= new WsQuery();
	        $salesReportArray = $salesReportQuery->getSalesReport($idNumber);
	        $formSalesReport->populate($salesReportArray);
	
			// Holt sämtliche Merkmalnamen, die nur für Kunden relevant sind
			$profileNamesQuery = new WsQuery();
			$profileNamesArray = $profileNamesQuery->getProfileNamesFromSector('Kontaktberichte',$salesReportArray['klickMerkmale']);			
			
			$this->view->profileNamesArray 		= $profileNamesArray;
			$this->view->profileNamesArrayJson	= Zend_Json::encode($profileNamesArray);
		
			
		} catch (Exception $e) {
			if (strpos($e,"connection closed")!==false) {
				$this->_helper->redirector->gotoUrl('http://'.$_SERVER['SERVER_NAME'].'/vmweb/public');
			} else {
				$this->view->infoSalesReportDetail = "Eingabefehler! Bitte korrigieren Sie Ihr Suche.";
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