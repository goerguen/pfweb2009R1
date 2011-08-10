<?php

/**
 * 
 * Enter description here ...
 * @author Görgün Kilic
 *
 */
class WsGetAccessRights {
	
	
	/**
	 * Gibt die Zugriffsrechte des jeweiligen Users in VM zurück
	 * @author gk
	 * @copyright GK Consulting
	 * @param VM Version
	 * @return (String) in XML die Zugriffsberechtigung in den einzelnen Tabellen
	 */
	public function getVmAccessRights() {
		
		$vmClient = new SOAPClient($_SESSION['vmweb']['soapServer'], array('login' => $_SESSION['vmweb']['user'], 
    						  'password' => $_SESSION['vmweb']['vmSession'], 'soap_version' => "SOAP_1_2"));
		
		$resultUserAccessVM = $vmClient->ws_getAccessRights($_SESSION['vmweb']['vmSession']);
		$resultXML = simplexml_load_string($resultUserAccessVM);
	
		$i=0; $returnResultArray = array();
		$returnResultArray = array(		'academicTitle'				=>(string) $resultXML->tables->academicTitle,
										'distributionList'			=>(string) $resultXML->tables->distributionList,
									    'subscInvoicingDetails'		=>(string) $resultXML->tables->subscInvoicingDetails,
									    'subscriptionTransfers'		=>(string) $resultXML->tables->subscriptionTransfers,
									    'article'					=>(string) $resultXML->tables->article,
									    'salesInvoiceItems'			=>(string) $resultXML->tables->salesInvoiceItems,
									    'saleInvoices'				=>(string) $resultXML->tables->saleInvoices,
									    'subscriberOrder'			=>(string) $resultXML->tables->subscriberOrder,
									    'bankDetails'				=>(string) $resultXML->tables->bankDetails,
									    'addresses'					=>(string) $resultXML->tables->addresses,
									    'companies'					=>(string) $resultXML->tables->companies,
									    'matchcode'					=>(string) $resultXML->tables->matchcode,
									    'addressPool'				=>(string) $resultXML->tables->addressPool,
									    'creatives'					=>(string) $resultXML->tables->creatives,
									    'profiles'					=>(string) $resultXML->tables->profiles,
									    'profileNames'				=>(string) $resultXML->tables->profileNames,
									    'countries'					=>(string) $resultXML->tables->countries,
									    'productSectors'			=>(string) $resultXML->tables->productSectors,
									    'areas'						=>(string) $resultXML->tables->areas,
									    'nameTables'				=>(string) $resultXML->tables->nameTables,
									    'customersBrands'			=>(string) $resultXML->tables->customersBrands,
									    'insertions'				=>(string) $resultXML->tables->insertions,
									    'groups'					=>(string) $resultXML->tables->groups,
									    'forms'						=>(string) $resultXML->tables->forms,
									    'salesReports'				=>(string) $resultXML->tables->salesReports,
									    'letters'					=>(string) $resultXML->tables->letters,
									    'advertisingAgencies'		=>(string) $resultXML->tables->advertisingAgencies,
									    'contacts'					=>(string) $resultXML->tables->contacts,
									    'customers'					=>(string) $resultXML->tables->customers,
									    'adAgencyTypes'				=>(string) $resultXML->tables->adAgencyTypes,
									    'productSectorNames'		=>(string) $resultXML->tables->productSectorNames,
									    'publications'				=>(string) $resultXML->tables->publications,
									    'jobTitleName'				=>(string) $resultXML->tables->jobTitleName);
		$i++;
		return $returnResultArray;
	}	
}
?>	