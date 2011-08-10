<?php

/**
 * 
 * Enter description here ...
 * @author Görgün Kilic
 *
 */
class WsQuery {
	
	
	/**
	 * Gibt eine Liste der Kontaktberichte aus
	 * @author gk
	 * @copyright GK Consulting
	 * @param $query (XML-String) - Suchfrage in XML
	 * @param $pages - die Seite, die aufgerufen werden soll
	 * $param $newRequest - wird diese Abfrage neu aufgerufen, oder wird über die Paginierung abgefragt
	 * @return (Array) Liste der Kontaktberichte
	 */
	public function getSalesReports($query, $pages, $newRequest) {
		
		$vmClient = new SOAPClient($_SESSION['vmweb']['soapServer'], array('login' => $_SESSION['vmweb']['user'], 
    						  'password' => $_SESSION['vmweb']['vmSession'], 'soap_version' => "SOAP_1_2"));
		
		
		$queryString = "";
		$keyArrays = array_keys($query);
		for ($i=0; $i<count($query); $i++) {
			if ($query[$keyArrays[$i]]!="") { $queryString = $queryString . '<' . $keyArrays[$i] . '>' . $query[$keyArrays[$i]] . '</' . $keyArrays[$i] . ' > '; }
		}		
		
		
		$searchXMLString = '<?xml version="1.0" encoding="utf-8"?>
								<vm Version="2009">
									<option name="tableID">22</option>
									<option name="maxRows">200</option>
									<option name="page">'.$pages.'</option>
									<query>'
									.$queryString.
								   '</query>
								</vm>';
		
		$resultSalesReports = $vmClient->ws_query($searchXMLString);
		
		if ($newRequest == 'true') {
			// Gibt die Anzahl der Trefferliste zurück.
			$searchXMLString = '<?xml version="1.0" encoding="utf-8"?>
								<vm Version="2009">
									<option name="tableID">22</option>
									<option name="maxRows">1000000000</option>
									<query>'
									.$queryString.
								   '</query>
								</vm>';			
			$resultSalesReportsListRecordCount = $vmClient->ws_query($searchXMLString);
		}
		
		
		if (count($resultSalesReports) > 0) {	
			$resultXML = simplexml_load_string($resultSalesReports);
			
			if ($newRequest == 'true') {
				$resultXMLRecordCount = simplexml_load_string($resultSalesReportsListRecordCount);
				$attrib = $resultXMLRecordCount->salesReports->attributes();
				$_SESSION['vmweb']['salesReportsListRecordCount'] = (int)$attrib['recordCount'];
			}
		
			$i=0; $returnResultArray = array();
			if (count($resultXML->salesReports->salesReports) > 0) {
				foreach ($resultXML->salesReports->salesReports as $salesReports) {
					$returnResultArray[] = 	array(	'date' 			=>(string) $resultXML->salesReports->salesReports[$i]->date,
													'to'			=>(string) $resultXML->salesReports->salesReports[$i]->to,
													'diaryDate'		=>(string) $resultXML->salesReports->salesReports[$i]->diaryDate,
													'from'			=>(string) $resultXML->salesReports->salesReports[$i]->from,
													'initials'		=>(string) $resultXML->salesReports->salesReports[$i]->initials,
													'customer'		=>(string) $resultXML->salesReports->salesReports[$i]->customer, 
													'adAg1'			=>(string) $resultXML->salesReports->salesReports[$i]->adAg1,
													'publications'	=>(string) $resultXML->salesReports->salesReports[$i]->publications,   
													'brands'		=>(string) $resultXML->salesReports->salesReports[$i]->brands,
													'summaryReport'	=>(string) $resultXML->salesReports->salesReports[$i]->summaryReport,
													'idNumber'		=>(int)    $resultXML->salesReports->salesReports[$i]->idNumber,
													'recordCount'	=>(int)    $_SESSION['vmweb']['salesReportsListRecordCount'],
													'pages'			=>ceil(((int)$_SESSION['vmweb']['salesReportsListRecordCount'])/200));			
					$i++;
				}
			}
		}				     
	return $returnResultArray;
	}

	/**
	 * Gibt einen Kontaktbericht zurück
	 * @author gk
	 * @copyright GK Consulting
	 * @param $idNumber
	 * @return (Array) Ein Kontaktbericht
	 */
	public function getSalesReport($idNumber) {
		
		$vmClient = new SOAPClient($_SESSION['vmweb']['soapServer'], array('login' => $_SESSION['vmweb']['user'], 
    						  'password' => $_SESSION['vmweb']['vmSession'], 'soap_version' => "SOAP_1_2"));
		
		$queryString = '<query>
							<idNumber>'.$idNumber.'</idNumber>
						</query>';
		
		$searchXMLString = '<?xml version="1.0" encoding="utf-8"?>
								<vm Version="2009">
									<option name="tableID">22</option>'
									.$queryString.
								'</vm>';		
		
		$resultKontaktbericht = $vmClient->ws_query($searchXMLString);	
		$resultXML = simplexml_load_string($resultKontaktbericht);
	
		$i=0; $returnResultArray = array();
		$returnResultArray = array(	'idNumber'		=>(int)    $resultXML->salesReports->salesReports[$i]->idNumber,
									'date'   		=>(string) $resultXML->salesReports->salesReports[$i]->date,
									'diaryDate' 	=>(string) $resultXML->salesReports->salesReports[$i]->diaryDate,
									'from'   		=>(string) $resultXML->salesReports->salesReports[$i]->from,
									'to'	   		=>(string) $resultXML->salesReports->salesReports[$i]->to,
									'customer'		=>(string) $resultXML->salesReports->salesReports[$i]->customer,
									'customerAddress'		=>(string) $resultXML->salesReports->salesReports[$i]->customerAddress,
									'employeeOfCustomer'	=>(string) $resultXML->salesReports->salesReports[$i]->employeeOfCustomer,
									'adAg1'			=>(string) $resultXML->salesReports->salesReports[$i]->adAg1,
									'type1'			=>(string) $resultXML->salesReports->salesReports[$i]->type1,
									'addressOfAdAgency1'	=>(string) $resultXML->salesReports->salesReports[$i]->addressOfAdAgency1,
									'employeeOfAdAgency1'	=>(string) $resultXML->salesReports->salesReports[$i]->employeeOfAdAgency1,
									'adAg2'			=>(string) $resultXML->salesReports->salesReports[$i]->adAg2,
									'type2'			=>(string) $resultXML->salesReports->salesReports[$i]->type2,
									'addressAdAg2'	=>(string) $resultXML->salesReports->salesReports[$i]->addressAdAg2,
									'employeeOfAdAgency2'	=>(string) $resultXML->salesReports->salesReports[$i]->employeeOfAdAgency2,
									'adAg3'			=>(string) $resultXML->salesReports->salesReports[$i]->adAg3,
									'type3'			=>(string) $resultXML->salesReports->salesReports[$i]->type3,
									'addressAdAg3'	=>(string) $resultXML->salesReports->salesReports[$i]->addressAdAg3,
									'employeeOfAdAgency3'	=>(string) $resultXML->salesReports->salesReports[$i]->employeeOfAdAgency3,
									'adAg4'			=>(string) $resultXML->salesReports->salesReports[$i]->adAg4,
									'type4'			=>(string) $resultXML->salesReports->salesReports[$i]->type4,
									'addressAdAg4'	=>(string) $resultXML->salesReports->salesReports[$i]->addressAdAg4,
									'employeeOfAdAgency4'	=>(string) $resultXML->salesReports->salesReports[$i]->employeeOfAdAgency4,
									'summaryReport'	=>(string) $resultXML->salesReports->salesReports[$i]->summaryReport,
									'text'			=>(string) $resultXML->salesReports->salesReports[$i]->text,
									'publications'	=>(string) $resultXML->salesReports->salesReports[$i]->publications,
									'brands'		=>(string) $resultXML->salesReports->salesReports[$i]->brands,
									'sector'	   	=>(string) $resultXML->salesReports->salesReports[$i]->sector,
									'distributionList'		=>(string) $resultXML->salesReports->salesReports[$i]->distributionList,
									'form'			=>(string) $resultXML->salesReports->salesReports[$i]->form,
									'createdBy'		=>(string) $resultXML->salesReports->salesReports[$i]->createdBy,
									'creationDate'	=>(string) $resultXML->salesReports->salesReports[$i]->creationDate,
									'creationTime'	=>(string) $resultXML->salesReports->salesReports[$i]->creationTime,
									'changedBy'		=>(string) $resultXML->salesReports->salesReports[$i]->changedBy,
									'changeDate'	=>(string) $resultXML->salesReports->salesReports[$i]->changeDate,
									'changeTime'	=>(string) $resultXML->salesReports->salesReports[$i]->changeTime,
									'ownerInternal'	=>(string) $resultXML->salesReports->salesReports[$i]->ownerInternal,
									'forPublication'=>(string) $resultXML->salesReports->salesReports[$i]->forPublication,
									'contactType'	=>(string) $resultXML->salesReports->salesReports[$i]->contactType,
									'vbm_1'			=>(string) $resultXML->salesReports->salesReports[$i]->vbm_1,
									'vbm_2'			=>(string) $resultXML->salesReports->salesReports[$i]->vbm_2,
									'archiveDate'	=>(string) $resultXML->salesReports->salesReports[$i]->archiveDate,
									'layoutView'	=>(string) $resultXML->salesReports->salesReports[$i]->layoutView
								  );
		$i=0;
		if ($resultXML->salesReports->salesReports[0]->layoutView=="IN_KLICK") {
			if (count($resultXML->salesReports->salesReports[0]->profiles->profile)>0) {
				foreach ($resultXML->salesReports->salesReports[0]->profiles->profile as $profile) {
					$klickMerkmal = array(	'idNumber'	=>(int)	$resultXML->salesReports->salesReports[0]->profiles->profile[$i]->idNumber,
											'refName'	=>(int)	$resultXML->salesReports->salesReports[0]->profiles->profile[$i]->refName,
											'profilestext'	=>(string) $resultXML->salesReports->salesReports[0]->profiles->profile[$i]->profilestext,
											'profilesvalue'	=>(string) $resultXML->salesReports->salesReports[0]->profiles->profile[$i]->profilesvalue,
											'profilesDate'	=>(string) $resultXML->salesReports->salesReports[0]->profiles->profile[$i]->profilesDate,
											'comments'	=>(string) $resultXML->salesReports->salesReports[0]->profiles->profile[$i]->comments
										  );
					$klickMerkmalArray[] = $klickMerkmal;
					$i++;
				}
			$returnResultArray['klickMerkmale'] = $klickMerkmalArray;
			}
		}
		return $returnResultArray;
	}	
	
	/**
	 * Gibt eine Liste der Branchen-Namen aus
	 * @author gk
	 * @copyright GK Consulting
	 * @param $addressType (String)  KU: Kunden, WA: Werbeagenturen, FA: Firmen, PS: Personen
	 * @param $refIdNumber
	 * @return (Array) Liste der Merkmale
	 */
	public function getSectorNames($query, $pages, $newRequest) {
		
		$vmClient = new SOAPClient($_SESSION['vmweb']['soapServer'], array('login' => $_SESSION['vmweb']['user'], 
    						  'password' => $_SESSION['vmweb']['vmSession'], 'soap_version' => "SOAP_1_2"));
		
		
		$queryString = "";
		$keyArrays = array_keys($query);
		for ($i=0; $i<count($query); $i++) {
			if ($query[$keyArrays[$i]]!="") { $queryString = $queryString . '<' . $keyArrays[$i] . '>' . $query[$keyArrays[$i]] . '</' . $keyArrays[$i] . ' > '; }
		}		
		
		
		$searchXMLString = '<?xml version="1.0" encoding="utf-8"?>
								<vm Version="2009">
									<option name="tableID">9</option>
									<option name="maxRows">200</option>
									<option name="page">'.$pages.'</option>
									<query>'
									.$queryString.
								   '</query>
								</vm>';
		
		$resultSectorNames = $vmClient->ws_query($searchXMLString);
		
		if ($newRequest == 'true') {
			// Gibt die Anzahl der Trefferliste zurück.
			$searchXMLString = '<?xml version="1.0" encoding="utf-8"?>
								<vm Version="2009">
									<option name="tableID">9</option>
									<option name="maxRows">1000000000</option>
									<query>'
									.$queryString.
								   '</query>
								</vm>';			
			$resultSectorNamesListRecordCount = $vmClient->ws_query($searchXMLString);
		}
		
		
		if (count($resultSectorNames) > 0) {	
			$resultXML = simplexml_load_string($resultSectorNames);
			
			if ($newRequest == 'true') {
				$resultXMLRecordCount = simplexml_load_string($resultSectorNamesListRecordCount);
				$attrib = $resultXMLRecordCount->productSectorNames->attributes();
				$_SESSION['vmweb']['sectorNamesListRecordCount'] = (int)$attrib['recordCount'];
			}

			$i=0; $returnResultArray = array();
			if (count($resultXML->productSectorNames->productSectorNames) > 0) {
				foreach ($resultXML->productSectorNames->productSectorNames as $productSectorNames) {
					$returnResultArray[] = 	array(	'sectorName' 	=>(string) $resultXML->productSectorNames->productSectorNames[$i]->sectorName,
													'genericTerm'	=>(string) $resultXML->productSectorNames->productSectorNames[$i]->genericTerm,
													'client'		=>(int)    $resultXML->productSectorNames->productSectorNames[$i]->client,
													'id'			=>(string) $resultXML->productSectorNames->productSectorNames[$i]->id, 
													'idNumber'		=>(int)    $resultXML->productSectorNames->productSectorNames[$i]->idNumber,   
													'mainTerm'		=>(string) $resultXML->productSectorNames->productSectorNames[$i]->mainTerm,
													'recordCount'	=> (int)$_SESSION['vmweb']['sectorNamesListRecordCount'],
													'pages'			=> ceil(((int)$_SESSION['vmweb']['sectorNamesListRecordCount'])/200));			
					$i++;
				}
			}
		}				
     
	return $returnResultArray;
	}
	
	
	/**
	 * Gibt einen Branchen-Namen zurück
	 * @author gk
	 * @copyright GK Consulting
	 * @param $idNumber
	 * @return (Array) Ein Branchenname
	 */
	public function getSectorName($idNumber) {
		
		$vmClient = new SOAPClient($_SESSION['vmweb']['soapServer'], array('login' => $_SESSION['vmweb']['user'], 
    						  'password' => $_SESSION['vmweb']['vmSession'], 'soap_version' => "SOAP_1_2"));
		
		$queryString = '<query>
							<idNumber>'.$idNumber.'</idNumber>
						</query>';
		
		$searchXMLString = '<?xml version="1.0" encoding="utf-8"?>
								<vm Version="2009">
									<option name="tableID">9</option>'
									.$queryString.
								'</vm>';		
		
		$resultBranchenname = $vmClient->ws_query($searchXMLString);	
		$resultXML = simplexml_load_string($resultBranchenname);
	
		$i=0; $returnResultArray = array();
		$returnResultArray = array(	'sectorName' 	=>(string) $resultXML->productSectorNames->productSectorNames[$i]->sectorName,
									'genericTerm'	=>(string) $resultXML->productSectorNames->productSectorNames[$i]->genericTerm,
									'client'		=>(int)    $resultXML->productSectorNames->productSectorNames[$i]->client,
									'id'			=>(string) $resultXML->productSectorNames->productSectorNames[$i]->id, 
									'idNumber'		=>(int)    $resultXML->productSectorNames->productSectorNames[$i]->idNumber,   
									'mainTerm'		=>(string) $resultXML->productSectorNames->productSectorNames[$i]->mainTerm
								  );
		$i++;
		
		return $returnResultArray;
	}	
	
	
		/**
	 * Gibt eine Liste der Merkmalnamen für den jeweiligen Bereich (z.B. Kunden) im
	 * JSON-Ready Format zurück
	 * @author gk
	 * @copyright GK Consulting
	 * @param $fileName - z.B. 'Kunden'
	 * @return (Array) Merkmalnamen des jeweiligen Bereichs
	 */
	public function getProfileNamesFromSector ($filename, $klickMerkmalArray) {
		
		$vmClient = new SOAPClient($_SESSION['vmweb']['soapServer'], array('login' => $_SESSION['vmweb']['user'], 
    						  'password' => $_SESSION['vmweb']['vmSession'], 'soap_version' => "SOAP_1_2"));
		
		$queryString = '<query>
							<filename>'.$filename.'</filename>
						</query>';
		
		$searchXMLString = '<?xml version="1.0" encoding="utf-8"?>
								<vm Version="2009">
									<option name="tableID">95</option>'
									.$queryString.
								'</vm>';		
		
		$resultMerkmalname = $vmClient->ws_query($searchXMLString);	
		$resultXML = simplexml_load_string($resultMerkmalname);
	
		$i=0; $parentArray = array(); $childrenArray = array();
		if (count($resultXML->profileNames->profileNames) > 0) {
			foreach ($resultXML->profileNames->profileNames as $profileNames) {
				
				$foundStr = false;
				for ($k=0; $k<count($parentArray); $k++) {
					if ($resultXML->profileNames->profileNames[$i]->genericTerm == $parentArray[$k]['name']) {
							$foundStr = true;
							break;
					}
				}											

				// Falls Klickmerkmal bei Adresstyp vorhanden, dann soll Checkbox ausgewählt werden
				$checked="";
				for ($laufVar=0; $laufVar<count($klickMerkmalArray); $laufVar++) {
					if ($resultXML->profileNames->profileNames[$i]->idNumber == $klickMerkmalArray[$laufVar]['refName']) {
						$checked = " checked='checked' ";
						break;
					}
				}
				if ($foundStr) {
					$childrenArray 		= array();
					$childrenArray		= $parentArray[$k]['children'];
					$childrenArray[]	= array(	'_reference'=> (int) $resultXML->profileNames->profileNames[$i]->idNumber);
					$parentArray[]		= array(	'idNumber'	=> (int) $resultXML->profileNames->profileNames[$i]->idNumber,
													'name'		=> '<input type="checkbox"'.$checked.'id="'. $resultXML->profileNames->profileNames[$i]->idNumber .'"> ' . (string) $resultXML->profileNames->profileNames[$i]->name,
													'type'		=> 'child',
													'profilesIdNumber' => (string) $klickMerkmalArray[$laufVar]['idNumber'],
													'profilestext' => (string) $klickMerkmalArray[$laufVar]['profilestext'],
													'profilesvalue' => (string) $klickMerkmalArray[$laufVar]['profilesvalue'],
													'profilesDate' => (string) $klickMerkmalArray[$laufVar]['profilesDate'],
													'comments' => (string) $klickMerkmalArray[$laufVar]['comments'],
												);
					$parentArray[$k]	= array(	'idNumber'	=> (string) $parentArray[$k]['idNumber'],
													'name'		=> (string) $parentArray[$k]['name'],
													'type'		=> 'parent',
													'children'  => $childrenArray);
				} else {
					$childrenArray 		= array();
					$childrenArray[]	= array(	'_reference'=>(int) $resultXML->profileNames->profileNames[$i]->idNumber);
					$parentArray[]		= array(	'idNumber'	=> $i,
													'name'		=> (string) $resultXML->profileNames->profileNames[$i]->genericTerm,
													'type'		=> 'parent',
													'children'  => $childrenArray);						
					$parentArray[]		= array(	'idNumber'	=> (int) $resultXML->profileNames->profileNames[$i]->idNumber,
													'name'		=> '<input type="checkbox"'.$checked.'id="'. $resultXML->profileNames->profileNames[$i]->idNumber .'"> ' . (string) $resultXML->profileNames->profileNames[$i]->name,
													'type'		=> 'child',
													'profilesIdNumber' => (string) $klickMerkmalArray[$laufVar]['idNumber'],
													'profilestext' => (string) $klickMerkmalArray[$laufVar]['profilestext'],
													'profilesvalue' => (string) $klickMerkmalArray[$laufVar]['profilesvalue'],
													'profilesDate' => (string) $klickMerkmalArray[$laufVar]['profilesDate'],
													'comments' => (string) $klickMerkmalArray[$laufVar]['comments'],
												);
				}	
				$i++;
			}		
			return $parentArray;
		}
	}	
	
	/**
	 * Gibt einen Merkmalnamen zurück
	 * @author gk
	 * @copyright GK Consulting
	 * @param $idNumber
	 * @return (Array) Ein Merkmalname
	 */
	public function getProfileName($idNumber) {
		
		$vmClient = new SOAPClient($_SESSION['vmweb']['soapServer'], array('login' => $_SESSION['vmweb']['user'], 
    						  'password' => $_SESSION['vmweb']['vmSession'], 'soap_version' => "SOAP_1_2"));
		
		$queryString = '<query>
							<idNumber>'.$idNumber.'</idNumber>
						</query>';
		
		$searchXMLString = '<?xml version="1.0" encoding="utf-8"?>
								<vm Version="2009">
									<option name="tableID">95</option>'
									.$queryString.
								'</vm>';		
		
		$resultMerkmalname = $vmClient->ws_query($searchXMLString);	
		$resultXML = simplexml_load_string($resultMerkmalname);
	
		$i=0; $returnResultArray = array();
		if (count($resultXML->profileNames->profileNames)>0) {
			$returnResultArray = array(		'name'  		=>(string) $resultXML->profileNames->profileNames[0]->name,
											'idNumber'		=>(int)    $resultXML->profileNames->profileNames[0]->idNumber,
											'genericTerm'	=>(string) $resultXML->profileNames->profileNames[0]->genericTerm,
											'filename'		=>(string) $resultXML->profileNames->profileNames[0]->filename
										);
		}
		$i++;
		
		return $returnResultArray;
	}	
	
	
	/**
	 * Gibt die Merkmale für das jeweilige Address-Type aus
	 * @author gk
	 * @copyright GK Consulting
	 * @param $addressType (String)  KU: Kunden, WA: Werbeagenturen, FA: Firmen, PS: Personen
	 * @param $refIdNumber
	 * @return (Array) Liste der Merkmale
	 */
	public function getProfiles($addressType, $refID) {
		
		$vmClient = new SOAPClient($_SESSION['vmweb']['soapServer'], array('login' => $_SESSION['vmweb']['user'], 
    						  'password' => $_SESSION['vmweb']['vmSession'], 'soap_version' => "SOAP_1_2"));
		
		switch($addressType) {
			case "KU": $addressType = "refCustomer"; break;
			case "WA": $addressType = "refAdag"; break;
			case "FA": $addressType = "refCompany"; break;
			case "PS": $addressType = "refCo"; break;
		}
		$queryString = '<query>
							<'.$addressType.'>'.$refID.'</'.$addressType.'>
						</query>';
		
		$searchXMLString = '<?xml version="1.0" encoding="utf-8"?>
								<vm Version="2009">
									<option name="tableID">96</option>'
									.$queryString.
								'</vm>';
		
		
		$resultMerkamle = $vmClient->ws_query($searchXMLString);
	
		$resultXML = simplexml_load_string($resultMerkamle);
	
		$i=0; $returnResultArray = array();
		if (count($resultXML->profiles->profiles) > 0) {
			foreach ($resultXML->profiles->profiles as $profiles) {
				$returnResultArray[]= array(	'refName'  		=>(string) $resultXML->profiles->profiles[$i]->refName,
												'idNumber'		=>(int)    $resultXML->profiles->profiles[$i]->idNumber,
												'refEdMent'		=>(string) $resultXML->profiles->profiles[$i]->refEdMent,
												'refVisit'		=>(string) $resultXML->profiles->profiles[$i]->refVisit, 
												'refCreatives'	=>(string) $resultXML->profiles->profiles[$i]->refCreatives,   
												'refDates'		=>(string) $resultXML->profiles->profiles[$i]->refDates, 
												'profilestext'	=>(string) $resultXML->profiles->profiles[$i]->profilestext, 
												'profilesvalue'	=>(string) $resultXML->profiles->profiles[$i]->profilesvalue,
												'comments'		=>(string) $resultXML->profiles->profiles[$i]->comments);			
				$i++;
			}
		}
		
		return $returnResultArray;
	}
	
	
	/**
	 * Gibt einen Merkmal aus nach der idNumber aus
	 * @author gk
	 * @copyright GK Consulting
	 * @param $idNumber - Primary Key
	 * @return (Array) Liste eines Merkmales!
	 */
	public function getProfileDetail($idNumber) {
		
		$vmClient = new SOAPClient($_SESSION['vmweb']['soapServer'], array('login' => $_SESSION['vmweb']['user'], 
    						  'password' => $_SESSION['vmweb']['vmSession'], 'soap_version' => "SOAP_1_2"));
		
		$queryString = '<query>
							<idNumber>'.$idNumber.'</idNumber>
						</query>';
		
		$searchXMLString = '<?xml version="1.0" encoding="utf-8"?>
								<vm Version="2009">
									<option name="tableID">96</option>'
									.$queryString.
								'</vm>';
		
		
		$resultMerkmal = $vmClient->ws_query($searchXMLString);
	
		$resultXML = simplexml_load_string($resultMerkmal);
	
		try {
			$i=0; $returnResultArray = array();
			foreach ($resultXML->profiles->profiles as $profiles) {
				$returnResultArray 	= array(	'refName'  		=>(string) $resultXML->profiles->profiles[$i]->refName,
												'idNumber'		=>(int)    $resultXML->profiles->profiles[$i]->idNumber,
												'refEdMent'		=>(string) $resultXML->profiles->profiles[$i]->refEdMent,
												'refVisit'		=>(string) $resultXML->profiles->profiles[$i]->refVisit, 
												'refCreatives'	=>(string) $resultXML->profiles->profiles[$i]->refCreatives,   
												'refDates'		=>(string) $resultXML->profiles->profiles[$i]->refDates, 
												'profilestext'	=>(string) $resultXML->profiles->profiles[$i]->profilestext, 
												'profilesvalue'	=>(string) $resultXML->profiles->profiles[$i]->profilesvalue,
												'comments'		=>(string) $resultXML->profiles->profiles[$i]->comments);			
				$i++;
			}
		} catch (Exception $e) {
			// Datensatz nicht gefunden oder nicht vorhanden
		}
		
		return $returnResultArray;
	}
	
	
	/**
	 * Gibt Publikationen zurück
	 * @author gk
	 * @copyright GK Consulting
	 * @param 
	 * @return (Array) Publikationen
	 */
	public function getPublications() {
		
		$vmClient = new VmSoapClient();
		
		$queryString = '<query>
							<publisher>@</publisher>
						</query>';
		
		$searchXMLString = '<?xml version="1.0" encoding="utf-8"?>
								<vm Version="2009">
									<option name="tableID">5</option>'
									.$queryString.
								'</vm>';		
		
		$resultMerkmalname = $vmClient->ws_query($searchXMLString);	
		$resultXML = simplexml_load_string($resultMerkmalname);
	
		$i=0; $returnResultArray = array();
		$returnResultArray 	= array(	'qqqqqqqqqqqname'  		=>(string) $resultXML->profileNames->profileNames[0]->name,
										'qqqqqqqqqqqqidNumber'		=>(int)    $resultXML->profileNames->profileNames[0]->idNumber,
										'qqqqqqqqqqqqqqgenericTerm'	=>(string) $resultXML->profileNames->profileNames[0]->genericTerm);
		$i++;
		
		return $returnResultArray;
	}	
}
?>	