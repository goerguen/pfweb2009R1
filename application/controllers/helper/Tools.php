<?php
	/**
	 * 
	 * Helfer Klasse für immer wieder benötigte Funktionen, wie sortieren, mischen etc.
	 * @license GK Consulting
	 * @author Görgün Kilic
	 * 
	 */
	class Tools {
		
		/**
		 * 
		 * Sortiert ein mehrdimensionales, assoziatives Array nach einem Bezeichner
		 * @param array $toSortArray
		 * @param string $sortByString
		 * 
		 * @return array
		 */
		static function sortMultiArray($toSortArray, $sortByString) {
			if (count($toSortArray)>0) {
		        foreach ( $toSortArray as $zeile ) {
	        		$sort_array[] = $zeile[$sortByString];
				}
				return array_multisort( $sort_array , $toSortArray );
			} else {
				return array();
			}
			
		}
		
		/**
		 * 
		 * Falls für den User keine Session angelegt wurde, soll der User
		 * auf die LogIn-Maske geleitet werden.
		 * 
		 * @return boolean
		 */
		static function sessionNotAvailable() {	
			if (!isset($_SESSION)) session_start();
			
			if (empty($_SESSION['vmweb']['vmSession'])) {
				return  true;
			} else {
				return  false;
			}
		}
		
		/**
		 * 
		 * Wandelt Umlaute, ß und Leerzeichen um, damit z.B. 
		 * in einem DOJO-Register der Name angezeigt werden kann
		 * @param $string
		 */
		static function umlautepas($string){
			$upas = Array("ä" => "ae", "ü" => "ue", "ö" => "oe", "Ä" => "Ae", "Ü" => "Ue", "Ö" => "Oe", "ß" => "ss", " " => "_", "'" => "", "\"" => ""); 
			return strtr($string, $upas);
		}
		
	}
	
?>