<?php

require_once APPLICATION_PATH . "/models/vmWebServices/WS_Find_Address.php";

/**
 * @version VM 2009 R1 
 * @author Görgün Kilic
 *
 * @method searchAddress
 * @method getAddress
 * @method setAddress  
 */
class WsAddressType {
	
	/**
	 * Gibt eine Liste von Adress-Datensatzen eines Adress-Types aus VM aus.
	 * @author gk
	 * @copyright GK Consulting
	 * @param $addressType (String) Für Kunden 'KU', Mitarbeiter 'MA'..
	 * @param $searchArray (XML String) - XML String für die Suchanfrage in VM
	 * @param $pageNo (int) - Seitennummer für die Buttons in der Liste 'Vorherige' und 'Nächste'
	 * @return (Array)
	 */
	public function searchAddress($addressType, $searchArray, $pageNo, $requestNew) {

		$queryString = "";
		
		/**
		 *  Bsp.: if ($searchArray['keyName']!="") 	{ $queryString = $queryString . '<keyName>' . $searchArray['keyName'] 	. '</keyName>'; }
		 */
		$keyArrays = array_keys($searchArray);
		for ($i=0; $i<count($searchArray); $i++) {
			if ($searchArray[$keyArrays[$i]]!="") { $queryString = $queryString . '<' . $keyArrays[$i] . '>' . $searchArray[$keyArrays[$i]] . '</' . $keyArrays[$i] . ' > '; }
		}

	 	$searchString = '<?xml version="1.0" encoding="utf-8"?>
							<vm Version="2009">
							  <option name="fieldlist">all</option>
							  <option name="maxRows">200</option>
							  <option name="page">'.$pageNo.'</option>
							  <query>
							  	<addressType>'.$addressType.'</addressType>
							  	'.$queryString.'
							  </query>
							</vm>';
 			
		$addressTypeObj = new WsFindAddress();		
		switch ($addressType) {
			case ('KU'): return $addressTypeObj->getCustomers($searchString, $requestNew); break;
			case ('PE'): return $addressTypeObj->getContacts($searchString, $requestNew); break;
			case ('WA'): return $addressTypeObj->getAdvertisingAgencies($searchString, $requestNew); break;
		}
	}
	
	/**
	 * Sucht nach einem Adress-Datensatz in der VM-Datenbank.
	 * Die idNumber ist über allen Adress-Typen hinweg eindeutig, daher bedarf es keinen
	 * Parameter zur Unterscheidung des Adress-Typs.
	 * 
	 * @method getAddress
	 * 
	 * @author gk
	 * 
	 * @param $addressType (z.B. 'KU' für Kunde u.s.w.)
	 * @param $searchAttrib (z.B. idNumber, customerNo, keyName - eindeutige, unique Identifizierer)
	 * @param $id (int)  Primary Key des Adress-Datensatzes.
	 * 
	 * @return (Array) XML-Datensatz
	 */
	public function getAddress($addressType, $searchAttrib, $id) {
		
		$vmClient = new SOAPClient($_SESSION['vmweb']['soapServer'], array('login' => $_SESSION['vmweb']['user'], 
    						  'password' => $_SESSION['vmweb']['vmSession'], 'soap_version' => "SOAP_1_2"));
	
		  	
	 	$searchString = '<?xml version="1.0" encoding="utf-8"?>
							<vm Version="2009">
							  <option name="fieldlist">all</option>
							  <query>
							  	<'.$searchAttrib.'>'.$id.'</'.$searchAttrib.'>
							  </query>
							</vm>'; 	
		
		
	 	// Gibt eine Liste der Kunden aus
	 	if ($addressType == 'KU') {
		 	// !!! Bei ws_find_address ist der erste Parameter (maxRows: Longint, maximale Anzahl von Treffern je Tabelle)
			// 		 nicht optional wie in der Entwicklerdokumentation beschrieben, sondern ein Pflichtparameter !!!
			$resultCustomersList = $vmClient->ws_find_address(1000,$searchString); 
			
			if ($resultCustomersList['rowCount'] > 0) {
				$resultXML = simplexml_load_string($resultCustomersList['GP_resultList']);
			
				// Gibt nur die Kunden aus
				$i=0; $resString=""; $returnResultArray = array();
				foreach ($resultXML->customers->customers as $customer) {			
					$returnResultArray[] = array(	'idNumber'  =>(int)    $resultXML->customers->customers[$i]->idNumber,
													'customerNo'=>(int)    $resultXML->customers->customers[$i]->customerNo,
													'inactiveFlag'	=>(string) $resultXML->customers->customers[$i]->inactiveFlag,
													'certificate'	=>(string) $resultXML->customers->customers[$i]->certificate,
													'bpRelevance'	=>(string) $resultXML->customers->customers[$i]->bpRelevance,
													'keyName'	=>(string) $resultXML->customers->customers[$i]->keyName,
												 	'name1'		=>(string) $resultXML->customers->customers[$i]->name1, 
												 	'area'		=>(string) $resultXML->customers->customers[$i]->area,   
												 	'priority'	=>(string) $resultXML->customers->customers[$i]->priority, 
												 	'pc'		=>(string) $resultXML->customers->customers[$i]->pc, 
												 	'city'		=>(string) $resultXML->customers->customers[$i]->city,
													'country'	=>(string) $resultXML->customers->customers[$i]->country,
													'client'	=>(string) $resultXML->customers->customers[$i]->client,
													'mailing'	=>(string) $resultXML->customers->customers[$i]->mailing,
													'registeredNo'	=>(string) $resultXML->customers->customers[$i]->registeredNo,
													'fromGroup'	=>(string) $resultXML->customers->customers[$i]->fromGroup,
													'registeredAt'	=>(string) $resultXML->customers->customers[$i]->registeredAt,
													'phone'	=>(string) $resultXML->customers->customers[$i]->phone,
													'fax'	=>(string) $resultXML->customers->customers[$i]->fax,
													'www'	=>(string) $resultXML->customers->customers[$i]->www,
													'name2'	=>(string) $resultXML->customers->customers[$i]->name2,
													'eMail'	=>(string) $resultXML->customers->customers[$i]->eMail,
													'name3'	=>(string) $resultXML->customers->customers[$i]->name3,
													'addressSupplement'	=>(string) $resultXML->customers->customers[$i]->addressSupplement,
													'comments'	=>(string) $resultXML->customers->customers[$i]->comments,
													'street'	=>(string) $resultXML->customers->customers[$i]->street,
													'strHouseno'	=>(string) $resultXML->customers->customers[$i]->strHouseno,
													'streetSuppl'	=>(string) $resultXML->customers->customers[$i]->streetSuppl,
													'pcStreet'	=>(string) $resultXML->customers->customers[$i]->pcStreet,
													'pcPo'	=>(string) $resultXML->customers->customers[$i]->pcPo,
													'poBox'	=>(string) $resultXML->customers->customers[$i]->poBox,
													'pcCu'	=>(string) $resultXML->customers->customers[$i]->pcCu,
													'pcFlag'	=>(string) $resultXML->customers->customers[$i]->pcFlag,
													'cityCounty'	=>(string) $resultXML->customers->customers[$i]->cityCounty,
													'addrType'	=>(string) $resultXML->customers->customers[$i]->addrType);
					$i++;
				}			
				return $returnResultArray;
			} else {
				return array();
			}
	 	}		
		
	}
	
	
	/**
	 * Fügt einen neuen Adress-Datensatz in die 4D-Datenbank hinzu oder editiert einen bestehenden Adress-Datenensatz.
	 * Der Typ des Adressensatz wird durch den Parameter $addressType ermittelt.
	 * Wird die idNumber nicht mitübergeben, so wird ein neuer Datensatz erstellt. Andernfalls wird mit der
	 * Übergabe der idNumber der Datensatz editiert. 
	 * 
	 * @author gk
	 * 
	 * @param $addressType (String)   Mögliche Werte sind: 'customers', 'advertisingAgencies', 'contacts', 'companies', 'addressPool', 'groups'.
	 * @param $saveArray (Array)
	 * 
	 * @return (String)   enthält eine XML-Struktur mit den Feldinhalten wie sie nach der Plausibilisierung im VM abgespeichert wurden.
	 */
	public function setAddress($addressType, $saveArray) {
		
		$vmClient = new SOAPClient($_SESSION['vmweb']['soapServer'], array('login' => $_SESSION['vmweb']['user'], 
									'password' => $_SESSION['vmweb']['vmSession'], 'soap_version' => "SOAP_1_2"));

		$queryString = '<'.$addressType.'><'.$addressType.'>';
		$keyArrays = array_keys($saveArray);
		/**
		 *  Hier sollen auch Leerfelder gespeichert werden können, ausser es sind Pflichtfelder.
		 *  Daher keine Überprüfung, ob Attribut Eintrag leer ist oder nicht.
		 */
		for ($i=0; $i<count($saveArray); $i++) {
			if (($keyArrays[$i]=="idNumber" && $saveArray[$keyArrays[$i]]=="") || ($keyArrays[$i]=="customerNo" && $saveArray[$keyArrays[$i]]=="")) {
			} else {
				$queryString = $queryString . '<' . $keyArrays[$i] . '>' . $saveArray[$keyArrays[$i]] . '</' . $keyArrays[$i] . '> ';
			}
		}
		$queryString = $queryString.'</'.$addressType.'></'.$addressType.'>';
		
		$saveAddressType = '<?xml version="1.0" encoding="utf-8"?>
							<vm Version="2009">
								<option name="overrideWarnings">yes</option>
								<option name="skipPlausibilityCheck">no</option>'
						      .$queryString.         
						  	'</vm>';
			
		$result = $vmClient->ws_update($saveAddressType);
		
		return $result;
	}		
}

?>	