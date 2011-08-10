<?php

/**
 * 
 * @author G�rg�n Kilic
 *
 */
class InfoFenster {
	
	/**
	 * Gibt eine Liste der Eigenschaften zur�ck, die im InfoFenster je nach Adress-Typ dargestellt werden sollen.
	 * @author gk
	 * @copyright GK Consulting
	 * @param $addressType (String) F�r Kunden 'KU', Mitarbeiter 'MA'..
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