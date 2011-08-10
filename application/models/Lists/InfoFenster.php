<?php

/**
 * 
 * @author Görgün Kilic
 *
 */
class InfoFenster {
	
	/**
	 * Gibt eine Liste der Eigenschaften zurück, die im InfoFenster je nach Adress-Typ dargestellt werden sollen.
	 * @author gk
	 * @copyright GK Consulting
	 * @param $addressType (String) Für Kunden 'KU', Mitarbeiter 'MA'..
	 */
	public function searchAddress($addressType) {
		
		$infoFensterArray = array();
		switch($addressType) {
			case 'KU': $infoFensterArray = array ('Ansprechpartner', 'Merkmale', 'Objektinteresse', 'Betreuende_Werbeagenturen', 'Memos', 'Briefe', 'Kontaktberichte', 'Abteilungen', 'Buchungen', 'Bankverbindung_FibuInfos', 'Zahlverbindungen', 'Anschriften'); break;
			
		}		
		 return $infoFensterArray;
	}	
}
?>	