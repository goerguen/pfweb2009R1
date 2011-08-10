<?php
include_once APPLICATION_PATH.'/models/vmWebServices/WS_AddressType.php';
include_once APPLICATION_PATH.'/models/vmWebServices/WS_Query.php';
include_once APPLICATION_PATH.'/models/Lists/InfoFenster.php';
include_once APPLICATION_PATH.'/controllers/helper/Tools.php';

class ContactController extends Zend_Controller_Action {
	
	public function init() {
        /* Initialize action controller here */
    }
    
	public function contactslistAction() {
		
		// Falls Session beendet, dann geh zur LogIn-Maske
		if (Tools::sessionNotAvailable()) {
			$this->_helper->redirector->gotoUrl('http://'.$_SERVER['SERVER_NAME'].'/vmweb/public');
		};
		try {
			$form = new Application_Form_Contact();
				//$keyName	= $this->_request->getParam('keyName');
				//$area		= $this->_request->getParam('area');
				//$priority	= $this->_request->getParam('priority');
				//$pc			= $this->_request->getParam('pc');
				//$city		= $this->_request->getParam('city');
				$page		= $this->_request->getParam('page');
				$requestNew	= $this->_request->getParam('requestNew');
			
				// Gibt die Eigenschaften des Kunden, das selektiert wurde aus.
				$searchContactsArray = array( 'keyName'=>'@', 'area'=>null, 'priority'=>null, 'pc'=>null, 'city'=>null);
				$contactsObj = new WsAddressType();
	            $contacts = (array) $contactsObj->searchAddress('PE', $searchContactsArray, $page, $requestNew);
	            
	            if (count($contacts)>0) {
	            	
	            	$this->view->contacts =  $contacts; 
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
	
	public function contactssearchAction() {
		$form = new Application_Form_Contact();
		$form->setAction('/vmweb2009R1/public/contact/contactslist');
        $this->view->form = $form;
        
        // Falls Session beendet, dann geh zur LogIn-Maske
		if (Tools::sessionNotAvailable()) {
			$this->_helper->redirector->gotoUrl('http://'.$_SERVER['SERVER_NAME'].'/vmweb/public');
		};
	}

	/*public function contactsdetailAction() {
		// Kundendaten
		$formCustomerHM = new Application_Form_Customer();
		$formCustomerHM->setName('HauptmaskeCustomer');
		$this->view->formCustomerHM = $formCustomerHM;
		
		$formCustomerEdit = new Application_Form_Customer();
		$formCustomerEdit->setName('EditCustomer');
		//$formCustomerEdit->setAction('/vmweb2009R1/public/customer/customersave');
		$formCustomerEdit->setMethod('post');
		$this->view->formCustomerEdit = $formCustomerEdit;
		
		$this->view->Meldung = "";
		
		// Falls Session beendet, dann geh zur LogIn-Maske
		if (Tools::sessionNotAvailable()) {
			$this->_helper->redirector->gotoUrl('http://'.$_SERVER['SERVER_NAME'].'/vmweb/public');
		};
				
		try {
			//Kundendaten werden editiert oder neu angelegt
			if ($this->getRequest()->isPost()) {				
				$formData = $this->getRequest()->getPost();
	            if ($formCustomerEdit->isValid($formData)) {				
					 $saveArray = array(	'idNumber'		=>$formCustomerEdit->getValue('idNumber'), 
		        							'customerNo'	=>$formCustomerEdit->getValue('customerNo'),
		        							'keyName'		=>$formCustomerEdit->getValue('keyName'),
		        							'name1'			=>$formCustomerEdit->getValue('name1'),
					 						'name2'			=>$formCustomerEdit->getValue('name2'),
					 						'name3'			=>$formCustomerEdit->getValue('name3'),
											'area'			=>$formCustomerEdit->getValue('area'),
											'priority'		=>$formCustomerEdit->getValue('priority'),
											'pc'			=>$formCustomerEdit->getValue('pc'),
					 						'pcFlag'		=>$formCustomerEdit->getValue('pcFlag'),
											'city'			=>$formCustomerEdit->getValue('city'),
					 						'country'		=>$formCustomerEdit->getValue('country'),					 
					 						'inactiveFlag'	=>$formCustomerEdit->getValue('inactiveFlag'),
					 						'certificate'	=>$formCustomerEdit->getValue('certificate'),
					 						'mailing'		=>$formCustomerEdit->getValue('mailing'),
					 						'fromGroup'		=>$formCustomerEdit->getValue('fromGroup'),
					 						'addressSupplement'		=>$formCustomerEdit->getValue('addressSupplement'),
					 						'strHouseno'	=>$formCustomerEdit->getValue('strHouseno'),
					 						'streetSuppl'	=>$formCustomerEdit->getValue('streetSuppl'),
					 						'pcStreet'		=>$formCustomerEdit->getValue('pcStreet'),
					 						'pcPo'			=>$formCustomerEdit->getValue('pcPo'),
					 						'poBox'			=>$formCustomerEdit->getValue('poBox'),
					 						'pcCu'			=>$formCustomerEdit->getValue('pcPo'),
					 						'cityCounty'	=>$formCustomerEdit->getValue('cityCounty'),
					 						'addrType'		=>$formCustomerEdit->getValue('addrType'),
					 						'client'		=>$formCustomerEdit->getValue('client'),
					 						'registeredNo'	=>$formCustomerEdit->getValue('registeredNo'),
					 						'registeredAt'	=>$formCustomerEdit->getValue('registeredAt'),
					 						'phone'			=>$formCustomerEdit->getValue('phone'),
					 						'fax'			=>$formCustomerEdit->getValue('fax'),
					 						'www'			=>$formCustomerEdit->getValue('www'),
					 						'eMail'			=>$formCustomerEdit->getValue('eMail'),
					 						'street'		=>$formCustomerEdit->getValue('street'),
					 						'comments'		=>$formCustomerEdit->getValue('comments'));
					
					$customersObj = new WsAddressType();
					
					$resultCustomerEditXML = $customersObj->setAddress("customers", $saveArray);
					
					if(strpos($resultCustomerEditXML,"268435488")!==false) {
						$pos1 = strpos($resultCustomerEditXML, "<messages>");
						$pos2 = strpos($resultCustomerEditXML, "</messages>");
						$_SESSION['vmweb']['meldung'] = "Datensatz wurde <u>nicht</u> gespeichert! Da folgende Felder ausgef&uuml;llt sein m&uuml;ssen: " .
						substr($resultCustomerEditXML, $pos1,($pos2-$pos1));
					} else {
						$_SESSION['vmweb']['meldung'] = "Datensatz wurde gespeichert!";
					}
					
					$this->_helper->redirector->gotoUrl('http://'.$_SERVER['SERVER_NAME'].'/vmweb2009R1/public/customer/customerdetail/kName/'.$formCustomerEdit->getValue('keyName'));
	            }	            
			} else {
				//Die Formulardaten für die Hauptmaske sollen auf disabled/readonly gesetzt werden
				$formCustomerHM->getElement('inactiveFlag')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formCustomerHM->getElement('certificate')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formCustomerHM->getElement('mailing')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formCustomerHM->getElement('keyName')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formCustomerHM->getElement('fromGroup')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formCustomerHM->getElement('priority')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formCustomerHM->getElement('area')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formCustomerHM->getElement('name1')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formCustomerHM->getElement('name2')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formCustomerHM->getElement('name3')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formCustomerHM->getElement('addressSupplement')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formCustomerHM->getElement('strHouseno')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formCustomerHM->getElement('streetSuppl')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formCustomerHM->getElement('pcStreet')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formCustomerHM->getElement('pcPo')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formCustomerHM->getElement('poBox')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formCustomerHM->getElement('pcCu')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formCustomerHM->getElement('cityCounty')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formCustomerHM->getElement('addrType')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formCustomerHM->getElement('customerNo')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formCustomerHM->getElement('client')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formCustomerHM->getElement('registeredNo')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formCustomerHM->getElement('registeredAt')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formCustomerHM->getElement('phone')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formCustomerHM->getElement('fax')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formCustomerHM->getElement('www')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formCustomerHM->getElement('eMail')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));			
				$formCustomerHM->getElement('city')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formCustomerHM->getElement('street')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));				
				$formCustomerHM->getElement('country')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formCustomerHM->getElement('comments')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
				$formCustomerHM->getElement('pcFlag')->setAttribs(array('disabled'=>'disabled', 'readonly'=>'readonly'));
					
		        $keyName = $this->_getParam('kName','');
		        $customer = new WsAddressType();
		        $customerItem = $customer->getAddress('KU', 'keyName', $keyName);
		        $this->view->customer =  $customerItem[0];
		        
		        // falls Kunde neu angelegt werden soll, findet kein mapping statt.
		        if (count($customerItem)>0) {
			        $formCustomerHM->populate($customerItem[0]);
			        $formCustomerEdit->populate($customerItem[0]);			        		      
		        
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
		}}
		*/
	
}