<?php

/**
 * 
 * Erstellt ein Zend-Formular mit Merkmal-Eigenschaften.
 * @author gk
 *
 */
class Application_Form_Profile extends Zend_Form
{
    public function init()
    {
        $this->setName('profiles');

        //	Referenz zu Merkmalnamen
        $refName 		= new Zend_Form_Element_Hidden('refName');
        
        $profilestext 	= new Zend_Form_Element_Text('profilestext');
        $profilestext		->setLabel('Merkmkalstext')
        					->addValidator('StringLength', false)
							->addFilter('StripTags')
							->addFilter('StringTrim');
        
		$profilesvalue	= new Zend_Form_Element_Text('profilesvalue');
        $profilesvalue		->setLabel('Merkmalswert')
							->addFilter('StripTags')
               				->addFilter('StringTrim');

        // Freier Zusatztext (max. 32000 Zeichen).
        $comments		= new Zend_Form_Element_Text('comments');
        $comments			->setLabel('Bemerkung')
               				->addFilter('StripTags')
               				->addFilter('StringTrim');
               				
        // Referenz zum Kunden
        $refCustomer	= new Zend_Form_Element_Text('refCustomer'); 
        $refCustomer->setLabel('Ref Kunde');

        // Referenz zur Werbeagentur
        $refAdag		= new Zend_Form_Element_Text('refAdag');
        
        // Referenz zum Ansprechpartner (Person)
        $refCo			= new Zend_Form_Element_Text('refCo');
        
        // im VM-Doku bisher nicht dokumentiert
        $refX			= new Zend_Form_Element_Text('refX');
        
        // Anwender, der den Datensatz erstellt hat.
        $createdBy		= new Zend_Form_Element_Text('createdBy');
        
        // Datum der Erstellung
        $creationDate	= new Zend_Form_Element_Text('creationDate');
        
        // Uhrzeit der Erstellung
        $creationTime	= new Zend_Form_Element_Text('creationTime');
        
        // 	Anwender, der den Datensatz zuletzt geändert hat.
        $changedBy		= new Zend_Form_Element_Text('changedBy');
        
        // Datum der letzten Änderung.
        $changeDate	= new Zend_Form_Element_Text('changeDate');
        
        // Uhrzeit der letzten Änderung.
        $changeTime	= new Zend_Form_Element_Text('changeTime');
        
		// Referenz zur Firma
        $refCompany		= new Zend_Form_Element_Text('refCompany');
        
        
        // Referenz zu redaktionelle Erwähnung
        $refEdMent		= new Zend_Form_Element_Text('refEdMent');
        
        // Primary Key
        $idNumber 		= new Zend_Form_Element_Hidden('idNumber');
        
        $ownerInternal	= new Zend_Form_Element_Hidden('ownerInternal');
	
        // im VM-Doku bisher nicht dokumentiert
		$zvmInfo		= new Zend_Form_Element_Hidden('zvmInfo');
        
		// im VM-Doku bisher nicht dokumentiert
		$client			= new Zend_Form_Element_Hidden('client');
        
		// externer Code
		$extCode		= new Zend_Form_Element_Hidden('extCode');
		
        // Referenz zu Besuchern
        $refVisit		= new Zend_Form_Element_Hidden('refVisit');
        
        // Referenz zu Motiven
        $refCreatives	= new Zend_Form_Element_Hidden('refCreatives');
        
        // Referenz zu Terminen
        $refDates		= new Zend_Form_Element_Hidden('refDates');
        
        $chDateFrom		= new Zend_Form_Element_Hidden('chDateFrom');
        
        $chDateTo		= new Zend_Form_Element_Hidden('chDateTo');
        
        $profilesDate	= new Zend_Form_Element_Hidden('profilesDate');
               		
        $this->addElements(array(	$refName, $profilestext, $profilesvalue, $comments,  $refCustomer, $refAdag, 
        							$refCo, $refX, $createdBy, $creationDate, $creationTime, $changedBy, 
        							$changeDate, $changeTime, $refCompany, $refEdMent, $idNumber, $ownerInternal, 
        							$zvmInfo, $client, $extCode, $refVisit, $refCreatives, $refDates, $chDateFrom,
        							$chDateTo, $profilesDate
        					));
    }
}