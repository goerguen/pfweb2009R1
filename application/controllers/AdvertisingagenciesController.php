<?php
include_once APPLICATION_PATH.'/models/vmWebServices/WS_AddressType.php';
include_once APPLICATION_PATH.'/models/vmWebServices/WS_Query.php';
include_once APPLICATION_PATH.'/models/Lists/InfoFenster.php';
include_once APPLICATION_PATH.'/controllers/helper/Tools.php';

class AdvertisingagenciesController extends Zend_Controller_Action {
	
	public function init() {
        /* Initialize action controller here */
    }
    
	public function advertisingagencylistAction() {
	
		// Falls Session beendet, dann geh zur LogIn-Maske
		if (Tools::sessionNotAvailable()) {
			$this->_helper->redirector->gotoUrl('http://'.$_SERVER['SERVER_NAME'].'/vmweb/public');
		};
		
		try {
			$form = new Application_Form_AdvertisingAgencies();
				//$keyName	= $this->_request->getParam('keyName');
				//$area		= $this->_request->getParam('area');
				//$priority	= $this->_request->getParam('priority');
				//$pc			= $this->_request->getParam('pc');
				//$city		= $this->_request->getParam('city');
			    $page		= $this->_request->getParam('page');
				$requestNew	= $this->_request->getParam('requestNew');
			
				// Gibt die Eigenschaften des Werbeagenturen, das selektiert wurde aus.
				$searchAgencyArray = array( 'keyName'=>'@', 'area'=>null, 'priority'=>null, 'pc'=>null, 'city'=>null);
				$agencyObj = new WsAddressType();
				
				
	            $advertisingAgencies = (array) $agencyObj->searchAddress('WA', $searchAgencyArray, $page, $requestNew);

	            
	            if (count($advertisingAgencies)>0) {
	            	$this->view->advertisingagencies =  $advertisingAgencies; 
	            	
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
			
	public function advertisingagenciessearchAction() {
		$form = new Application_Form_AdvertisingAgencies();
		$form->setAction('/vmweb2009R1/public/advertisingAgency/advertisingAgencieslist');
        //$this->view->form = $form;
        
        // Falls Session beendet, dann geh zur LogIn-Maske
		if (Tools::sessionNotAvailable()) {
			$this->_helper->redirector->gotoUrl('http://'.$_SERVER['SERVER_NAME'].'/vmweb/public');
		};
	}
	
	public function advertisingagencydetailAction() {
		// Kundendaten
		$formAdvAgenciesHM = new Application_Form_AdvertisingAgencies();
		$formAdvAgenciesHM->setName('HauptmaskeCustomer');
		$this->view->formAdvAgenciesHM = $formAdvAgenciesHM;
		
		$formAdvAgenciesEdit = new Application_Form_AdvertisingAgencies();
		$formAdvAgenciesEdit->setName('EditCustomer');
		//$formCustomerEdit->setAction('/vmweb2009R1/public/customer/customersave');
		$formAdvAgenciesEdit->setMethod('post');
		$this->view->formAdvAgenciesEdit = $formAdvAgenciesEdit;
		
		$this->view->Meldung = "";
		
		// Falls Session beendet, dann geh zur LogIn-Maske
		if (Tools::sessionNotAvailable()) {
			$this->_helper->redirector->gotoUrl('http://'.$_SERVER['SERVER_NAME'].'/vmweb/public');
		};
				
		try {
			//Kundendaten werden editiert oder neu angelegt
			if ($this->getRequest()->isPost()) {				
				$formData = $this->getRequest()->getPost();
	            if ($formAdvAgenciesEdit->isValid($formData)) {				
					 $saveArray = array(	'idNumber'		=>$formAdvAgenciesEdit->getValue('idNumber'), 
		        							'customerNo'	=>$formAdvAgenciesEdit->getValue('customerNo'),
		        							'keyName'		=>$formAdvAgenciesEdit->getValue('keyName'),
		        							'name1'			=>$formAdvAgenciesEdit->getValue('name1'),
					 						'name2'			=>$formAdvAgenciesEdit->getValue('name2'),
					 						'name3'			=>$formAdvAgenciesEdit->getValue('name3'),
											'area'			=>$formAdvAgenciesEdit->getValue('area'),
											'priority'		=>$formAdvAgenciesEdit->getValue('priority'),
											'pc'			=>$formAdvAgenciesEdit->getValue('pc'),
					 						'pcFlag'		=>$formAdvAgenciesEdit->getValue('pcFlag'),
											'city'			=>$formAdvAgenciesEdit->getValue('city'),
					 						'country'		=>$formAdvAgenciesEdit->getValue('country'),					 
					 						'inactiveFlag'	=>$formAdvAgenciesEdit->getValue('inactiveFlag'),
					 						'certificate'	=>$formAdvAgenciesEdit->getValue('certificate'),
					 						'mailing'		=>$formAdvAgenciesEdit->getValue('mailing'),
					 						'fromGroup'		=>$formAdvAgenciesEdit->getValue('fromGroup'),
					 						'addressSupplement'		=>$formAdvAgenciesEdit->getValue('addressSupplement'),
					 						'strHouseno'	=>$formAdvAgenciesEdit->getValue('strHouseno'),
					 						'streetSuppl'	=>$formAdvAgenciesEdit->getValue('streetSuppl'),
					 						'pcStreet'		=>$formAdvAgenciesEdit->getValue('pcStreet'),
					 						'pcPo'			=>$formAdvAgenciesEdit->getValue('pcPo'),
					 						'poBox'			=>$formAdvAgenciesEdit->getValue('poBox'),
					 						'pcCu'			=>$formAdvAgenciesEdit->getValue('pcPo'),
					 						'cityCounty'	=>$formAdvAgenciesEdit->getValue('cityCounty'),
					 						'addrType'		=>$formAdvAgenciesEdit->getValue('addrType'),
					 						'client'		=>$formAdvAgenciesEdit->getValue('client'),
					 						'registeredNo'	=>$formAdvAgenciesEdit->getValue('registeredNo'),
					 						'registeredAt'	=>$formAdvAgenciesEdit->getValue('registeredAt'),
					 						'phone'			=>$formAdvAgenciesEdit->getValue('phone'),
					 						'fax'			=>$formAdvAgenciesEdit->getValue('fax'),
					 						'www'			=>$formAdvAgenciesEdit->getValue('www'),
					 						'eMail'			=>$formAdvAgenciesEdit->getValue('eMail'),
					 						'street'		=>$formAdvAgenciesEdit->getValue('street'),
					 						'comments'		=>$formAdvAgenciesEdit->getValue('comments'));
					
					$advertisingagenciesObj = new WsAddressType();
					
					$resultAdvertisingAgenciesEditXML = $customersObj->setAddress("customers", $saveArray);
					
					if(strpos($resultAdvertisingAgenciesEditXML,"268435488")!==false) {
						$pos1 = strpos($resultAdvertisingAgenciesEditXML, "<messages>");
						$pos2 = strpos($resultAdvertisingAgenciesEditXML, "</messages>");
						$_SESSION['vmweb']['meldung'] = "Datensatz wurde <u>nicht</u> gespeichert! Da folgende Felder ausgef&uuml;llt sein m&uuml;ssen: " .
						substr($resultAdvertisingAgenciesEditXML, $pos1,($pos2-$pos1));
					} else {
						$_SESSION['vmweb']['meldung'] = "Datensatz wurde gespeichert!";
					}
					
					$this->_helper->redirector->gotoUrl('http://'.$_SERVER['SERVER_NAME'].'/vmweb2009R1/public/advertisingagencies/advertisingagenciesdetail/kName/'.$formAdvAgenciesEdit->getValue('keyName'));
	            }	            
			} else {
				//Die Formulardaten für die Hauptmaske sollen auf disabled/readonly gesetzt werden
				$formAdvAgenciesHM->getElement('inactiveFlag')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formAdvAgenciesHM->getElement('certificate')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formAdvAgenciesHM->getElement('mailing')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formAdvAgenciesHM->getElement('keyName')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formAdvAgenciesHM->getElement('fromGroup')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formAdvAgenciesHM->getElement('priority')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formAdvAgenciesHM->getElement('area')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formAdvAgenciesHM->getElement('name1')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formAdvAgenciesHM->getElement('name2')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formAdvAgenciesHM->getElement('name3')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formAdvAgenciesHM->getElement('addressSupplement')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formAdvAgenciesHM->getElement('strHouseno')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formAdvAgenciesHM->getElement('streetSuppl')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formAdvAgenciesHM->getElement('pcStreet')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formAdvAgenciesHM->getElement('pcPo')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formAdvAgenciesHM->getElement('poBox')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formAdvAgenciesHM->getElement('pcCu')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formAdvAgenciesHM->getElement('cityCounty')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formAdvAgenciesHM->getElement('addrType')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formAdvAgenciesHM->getElement('customerNo')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formAdvAgenciesHM->getElement('client')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formAdvAgenciesHM->getElement('registeredNo')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formAdvAgenciesHM->getElement('registeredAt')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formAdvAgenciesHM->getElement('phone')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formAdvAgenciesHM->getElement('fax')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formAdvAgenciesHM->getElement('www')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formAdvAgenciesHM->getElement('eMail')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));			
				$formAdvAgenciesHM->getElement('city')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formAdvAgenciesHM->getElement('street')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));				
				$formAdvAgenciesHM->getElement('country')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formAdvAgenciesHM->getElement('comments')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formAdvAgenciesHM->getElement('pcFlag')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
					
		        $keyName = $this->_getParam('kName','');
		        $advertingagency = new WsAddressType();
		        $advertisingagencyItem = $advertisingagency->getAddress('KU', 'keyName', $keyName);
		        $this->view->customer =  $advertisingagencyItem[0];
		        
		        // falls Kunde neu angelegt werden soll, findet kein mapping statt.
		        if (count($advertingagencyItem)>0) {
			        $formAdvAgenciesHM->populate($advertingagencyItem[0]);
			        $formAdvAgenciesEdit->populate($advertingagencyItem[0]);			        		      
		        
			        $infoFensterObj = new InfoFenster();
			        $infoFensterElementeArray = $infoFensterObj->searchAddress('KU');
			        $this->view->infoFensterElemente = $infoFensterElementeArray;
			        
			        //----- Gibt die Ansprechpartner des jeweiligen Kunden aus. -----\\
			        $contacts = new WsAddressType();
			        $contactsSearchArray = array ('inCompany'=>$keyName);
			        $contactsArray = (array) $contacts->searchAddress('PE', $contactsSearchArray, 1, 'false');	        
			        
			        $this->view->contacts = $contactsArray;
			        $this->view->contactsCount = count($contactsArray);
			        
					//----- Gibt die Merkmale des jeweiligen Kunden aus. -----\\			
			        $profiles 	= new WsQuery();
			        $profilesArray = $profiles->getProfiles("KU", $keyName);
			        
			        Tools::sortMultiArray($profilesArray,'profilestext');
						        
			        $this->view->profiles = $profilesArray;
			        $this->view->profilesCount = count($profilesArray);		        
			        
			        $profileNamesArray = array();
			        $profileNameObj	= new WsQuery();
			        for ($i=0; $i<count($profilesArray); $i++) {
			        	$profileNamesArray[$i] =  $profileNameObj->getProfileName($profilesArray[$i]['refName']);
			        }
			        
		//	        $result = array_merge($profilesArray, $profileNamesArray);
					
		 			$this->view->profileNames = $profileNamesArray;
		        }
			}
		} catch (Exception $e) {
			if (strpos($e,"connection closed")!==false) {
				$this->_helper->redirector->gotoUrl('http://'.$_SERVER['SERVER_NAME'].'/vmweb/public');
			} else {
				$this->view->info = "Eingabefehler! Bitte korrigieren Sie Ihre Suche.";
			}
		}
	}
	
		
}
