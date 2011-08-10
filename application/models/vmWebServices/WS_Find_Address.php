<?php

class WsFindAddress {	
	/**
	 * @param	string $searchString
	 * @return	array
	 */
	function getAdvertisingAgencies($searchString, $requestNew){		    		
			$vmClient = new SOAPClient($_SESSION['vmweb']['soapServer'], array('login' => $_SESSION['vmweb']['user'], 
    		'password' => $_SESSION['vmweb']['vmSession'], 'soap_version' => "SOAP_1_2"));
	
			// !!! Bei ws_find_address ist der erste Parameter (maxRows: Longint, maximale Anzahl von Treffern je Tabelle)
			// 		 nicht optional wie in der Entwicklerdokumentation beschrieben, sondern ein Pflichtparameter !!!
			$resultadvertisingAgenciesList = $vmClient->ws_find_address(200,$searchString); 
		
		if ($resultadvertisingAgenciesList['rowCount'] > 0) {
			$resultXML = simplexml_load_string($resultadvertisingAgenciesList['GP_resultList']);

		// Gibt nur die Werbeagenturen aus
			$i=0; $resString=""; $returnResultArray = array();
			foreach ($resultXML->advertisingAgencies->advertisingAgencies as $advertisingAgencies) {			
				$returnResultArray[] = array(	'keyName'		=>(string) $resultXML->advertisingAgencies->advertisingAgencies[$i]->keyName,
											 	'name1'			=>(string) $resultXML->advertisingAgencies->advertisingAgencies[$i]->name1,
												'name2'			=>(string) $resultXML->advertisingAgencies->advertisingAgencies[$i]->name2,
											 	'country'		=>(string) $resultXML->advertisingAgencies->advertisingAgencies[$i]->country,
											 	'pc'			=>(string) $resultXML->advertisingAgencies->advertisingAgencies[$i]->pc, 
											 	'city'			=>(string) $resultXML->advertisingAgencies->advertisingAgencies[$i]->city,
												'street'		=>(string) $resultXML->advertisingAgencies->advertisingAgencies[$i]->street,
												'phone'			=>(string) $resultXML->advertisingAgencies->advertisingAgencies[$i]->phone,
												'eMail'			=>(string) $resultXML->advertisingAgencies->advertisingAgencies[$i]->eMail,
												'poBox'			=>(string) $resultXML->advertisingAgencies->advertisingAgencies[$i]->poBox,
												'fax'			=>(string) $resultXML->advertisingAgencies->advertisingAgencies[$i]->fax,
												'priority'		=>(string) $resultXML->advertisingAgencies->advertisingAgencies[$i]->priority,
												'area'			=>(string) $resultXML->advertisingAgencies->advertisingAgencies[$i]->area,
												'customerNo'	=>(string) $resultXML->advertisingAgencies->advertisingAgencies[$i]->customerNo,
												'analysisno'	=>(string) $resultXML->advertisingAgencies->advertisingAgencies[$i]->analysisNo,
												'advanceInv'	=>(string) $resultXML->advertisingAgencies->advertisingAgencies[$i]->advanceInv,
												'recordCount'	=> (int)$resultadvertisingAgenciesList['rowCount'],
												'pages'			=> ceil(((int)$resultadvertisingAgenciesList['rowCount'])/200) );
				$i++;
			}			
			
			return $returnResultArray;
		} else {
			return array();
		}
	}
	
	/**
	 * @param	string $searchString
	 * @return	array
	 */
	function getCustomers($searchString, $requestNew) {
	
		//$abc = new WsFindAddress();
		//$abc->getAdvertisingAgencies($searchString, $requestNew);
	
	$vmClient = new SOAPClient($_SESSION['vmweb']['soapServer'], array('login' => $_SESSION['vmweb']['user'], 
    'password' => $_SESSION['vmweb']['vmSession'], 'soap_version' => "SOAP_1_2"));
		
		// !!! Bei ws_find_address ist der erste Parameter (maxRows: Longint, maximale Anzahl von Treffern je Tabelle)
		// 		 nicht optional wie in der Entwicklerdokumentation beschrieben, sondern ein Pflichtparameter !!!
		$resultCustomersList = $vmClient->ws_find_address(200,$searchString); 

		
// Veraltet!! - Kann als Bsp. für andere Klassen noch gebraucht werden!			
//---------------------------------------------------------------------
//		if ($requestNew == 'true') {
//			// Gibt die Anzahl der Trefferliste zurück.
//			$resultCustomersListRecordCount = $vmClient->ws_find_address(1000000000,$searchString);
//		}
		
		if ($resultCustomersList['rowCount'] > 0) {
			$resultXML = simplexml_load_string($resultCustomersList['GP_resultList']);

// Veraltet!! - Kann als Bsp. für andere Klassen noch gebraucht werden!			
//---------------------------------------------------------------------
//			if ($requestNew == 'true') {
//				$resultXMLRecordCount = simplexml_load_string($resultCustomersListRecordCount['GP_resultList']);
//				$attrib = $resultXMLRecordCount->customers->attributes();
//				$_SESSION['vmweb']['customersListRecordCount'] = (int)$attrib['recordCount'];
//			}
			
			// Gibt nur die Kunden aus
			$i=0; $resString=""; $returnResultArray = array();
			foreach ($resultXML->customers->customers as $customer) {			
				$returnResultArray[] = array(	'idNumber'  	=>(int)    $resultXML->customers->customers[$i]->idNumber,
												'customerNo'	=>(int)    $resultXML->customers->customers[$i]->customerNo,
												'keyName'		=>(string) $resultXML->customers->customers[$i]->keyName,
											 	'name1'			=>(string) $resultXML->customers->customers[$i]->name1,
											 	'area'			=>(string) $resultXML->customers->customers[$i]->area,   
											 	'priority'		=>(string) $resultXML->customers->customers[$i]->priority,
												'street'		=>(string) $resultXML->customers->customers[$i]->street,
											 	'pc'			=>(string) $resultXML->customers->customers[$i]->pc, 
											 	'city'			=>(string) $resultXML->customers->customers[$i]->city,
												'country'		=>(string) $resultXML->customers->customers[$i]->country,
												'eMail'			=>(string) $resultXML->customers->customers[$i]->eMail,
												'phone'			=>(string) $resultXML->customers->customers[$i]->phone,
												'bpRelevance'	=>(string) $resultXML->customers->customers[$i]->bpRelevance,
												'inactiveFlag'	=>(string) $resultXML->customers->customers[$i]->inactiveFlag,
												'certificate'	=>(string) $resultXML->customers->customers[$i]->certificate,
												'mailing'		=>(string) $resultXML->customers->customers[$i]->mailing,
												'recordCount'	=> (int)$resultCustomersList['rowCount'],
												'pages'			=> ceil(((int)$resultCustomersList['rowCount'])/200) );
				$i++;
			}			
			
			return $returnResultArray;
			
		} else {
			return array();
		}
		
	}
	
	/**
	 * @param	string $searchString
	 * @return	array
	 */
	function getContacts($searchString) {
		
		$vmClient = new SOAPClient($_SESSION['vmweb']['soapServer'], array('login' => $_SESSION['vmweb']['user'], 
   			 'password' => $_SESSION['vmweb']['vmSession'], 'soap_version' => "SOAP_1_2"));
		
		// !!! Bei ws_find_address ist der erste Parameter (maxRows: Longint, maximale Anzahl von Treffern je Tabelle)
		// 		 nicht optional wie in der Entwicklerdokumentation beschrieben, sondern ein Pflichtparameter !!!
		$resultContactsList = $vmClient->ws_find_address(200,$searchString); 
		
		if ($resultContactsList['rowCount'] > 0) {
			$resultXML = simplexml_load_string($resultContactsList['GP_resultList']);
		
			// Gibt nur die Kunden aus
			$i=0; $resString=""; $returnResultArray = array();
			foreach ($resultXML->contacts->contacts as $contact) {			
				$returnResultArray[] = array(	'lastName'			=>(string) $resultXML->contacts->contacts[$i]->lastName,
												'firstName'			=>(string) $resultXML->contacts->contacts[$i]->firstName,
												'inCompany'			=>(string) $resultXML->contacts->contacts[$i]->inCompany,
												'companyType'		=>(string) $resultXML->contacts->contacts[$i]->companyType,
												'jobTitle'			=>(string) $resultXML->contacts->contacts[$i]->jobTitle,
											 	'sex'				=>(string) $resultXML->contacts->contacts[$i]->sex, 
											 	'profqual'			=>(string) $resultXML->contacts->contacts[$i]->profqual,   
											 	'extension'			=>(string) $resultXML->contacts->contacts[$i]->extension, 
											 	'country'			=>(string) $resultXML->contacts->contacts[$i]->country, 
											 	'companyPc'			=>(string) $resultXML->contacts->contacts[$i]->companyPc,				
												'arOfCompany'		=>(string) $resultXML->contacts->contacts[$i]->arOfCompany,
												'comments'			=>(string) $resultXML->contacts->contacts[$i]->comments,
											 	'createdBy'			=>(string) $resultXML->contacts->contacts[$i]->createdBy, 
											 	'createdOn'			=>(string) $resultXML->contacts->contacts[$i]->createdOn,   
											 	'createdAt'			=>(string) $resultXML->contacts->contacts[$i]->createdAt, 
											 	'changed'			=>(string) $resultXML->contacts->contacts[$i]->changed,				
												'changedOn'			=>(string) $resultXML->contacts->contacts[$i]->changedOn,
											 	'changedAt'			=>(string) $resultXML->contacts->contacts[$i]->changedAt, 
											 	'idNumber'			=>(string) $resultXML->contacts->contacts[$i]->idNumber,   
											 	'fax'				=>(string) $resultXML->contacts->contacts[$i]->fax, 
											 	'noOfTariffs'		=>(string) $resultXML->contacts->contacts[$i]->noOfTariffs, 
											 	'countryOfCompany'	=>(string) $resultXML->contacts->contacts[$i]->countryOfCompany,				
												'eMail'				=>(string) $resultXML->contacts->contacts[$i]->eMail,
											 	'inCompanyNo'		=>(string) $resultXML->contacts->contacts[$i]->inCompanyNo, 
											 	'transfFinacc'		=>(string) $resultXML->contacts->contacts[$i]->transfFinacc,   
											 	'customerNo'		=>(string) $resultXML->contacts->contacts[$i]->customerNo, 
											 	'addresstypepriv'	=>(string) $resultXML->contacts->contacts[$i]->addresstypepriv,	// ist im XML 2mal vorhanden!!!				
												'paymentMode'		=>(string) $resultXML->contacts->contacts[$i]->paymentMode,		// ist im XML 2mal vorhanden!!!
											 	'language'			=>(string) $resultXML->contacts->contacts[$i]->language, 
											 	'creditRating'		=>(string) $resultXML->contacts->contacts[$i]->creditRating,   
											 	'ownerInternal'		=>(string) $resultXML->contacts->contacts[$i]->ownerInternal, 
											 	'currencyCode'		=>(string) $resultXML->contacts->contacts[$i]->currencyCode, 
											 	'client'			=>(string) $resultXML->contacts->contacts[$i]->client,				
												'bpNumber'			=>(string) $resultXML->contacts->contacts[$i]->bpNumber,
											 	'geburtstagTag'		=>(string) $resultXML->contacts->contacts[$i]->geburtstagTag, 
											 	'geburtstagMonat'	=>(string) $resultXML->contacts->contacts[$i]->geburtstagMonat,   
											 	'geburtstagJahr'	=>(string) $resultXML->contacts->contacts[$i]->geburtstagJahr, 
											 	'immatrKnz'			=>(string) $resultXML->contacts->contacts[$i]->immatrKnz,				
												'withoutVat'		=>(string) $resultXML->contacts->contacts[$i]->withoutVat,
											 	'inaktivKnz'		=>(string) $resultXML->contacts->contacts[$i]->inaktivKnz, 
											 	'bpRelevance'		=>(string) $resultXML->contacts->contacts[$i]->bpRelevance,   
											 	'transfFinaccVML'	=>(string) $resultXML->contacts->contacts[$i]->transfFinaccVML,				
												'addresslabel'		=>(string) $resultXML->contacts->contacts[$i]->addresslabel,	// beinhaltet weitere <line>-Tags
											 	'salutation'		=>(string) $resultXML->contacts->contacts[$i]->salutation,
												'recordCount'	=> (int)$resultContactsList['rowCount'],
												'pages'			=> ceil(((int)$resultContactsList['rowCount'])/200) );
				$i++;
			}			
			return $returnResultArray;
		} else {
			return array();
		}
	}
	
}

?> 