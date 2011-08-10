<?php
require_once 'Zend/Soap/AutoDiscover.php';
require_once "Zend/Soap/Server.php";
//require_once 'Zend/Zend_Session_Namespace';

class SearchCustomers {	
	
	/**
	 * @param	string $searchString
	 * @return	array
	 */
	function getContactsXXX($searchString) {

		$vmClient = new SOAPClient('http://192.168.0.100:18080/4dwsdl', array('login' => "gk", 
   			 'password' => "gk", 'soap_version' => "SOAP_1_2"));
		
		// !!! Bei ws_find_address ist der erste Parameter (maxRows: Longint, maximale Anzahl von Treffern je Tabelle)
		// 		 nicht optional wie in der Entwicklerdokumentation beschrieben, sondern ein Pflichtparameter !!!
		$resultContactsList = $vmClient->ws_find_address(1000,$searchString); 
		
		if ($resultContactsList['rowCount'] > 0) {
			$resultXML = simplexml_load_string($resultContactsList['GP_resultList']);
		
			// Gibt nur die Kunden aus
			$i=0; $resString=""; $returnResultArray = array();
			foreach ($resultXML->contacts->contacts as $contact) {			
				$returnResultArray[] = array(	'lastName'			=>(string) $resultXML->contacts->contacts[$i]->lastName,
											 	'sex'				=>(string) $resultXML->contacts->contacts[$i]->sex, 
											 	'profqual'			=>(string) $resultXML->contacts->contacts[$i]->profqual,   
											 	'extension'			=>(string) $resultXML->contacts->contacts[$i]->extension, 
											 	'country'			=>(string) $resultXML->contacts->contacts[$i]->country, 
											 	'companyPc'			=>(string) $resultXML->contacts->contacts[$i]->companyPc,				
												'arOfCompany'		=>(string) $resultXML->contacts->contacts[$i]->arOfCompany,
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
											 	'salutation'		=>(string) $resultXML->contacts->contacts[$i]->salutation);
				$i++;
			}			
			return $returnResultArray;
		} else {
			return array();
		}
	}
}
	
if(isset($_GET['wsdl'])) {
    $autodiscover = new Zend_Soap_AutoDiscover();
    $autodiscover->setClass('SearchCustomers');
    $autodiscover->handle();
} else {
    $soap = new Zend_Soap_Server("http://localhost/vmweb2009R1/public/WebServicesServer/Atomic/VM2009R1/ws_find_address_SearchCustomers.php?wsdl");
    $soap->setClass('SearchCustomers');
    $soap->handle();
}
?> 