<?php

/**
 * 
 * Erstellt ein Zend-Formular mit Branchennamen-Eigenschaften.
 * @author gk
 *
 */
class Application_Form_SectorNames extends Zend_Form
{
    public function init()
    {
        $this->setName('profileNames');

        // Eindeutiger Begriff (Unique), als Referenz in anderen Dateien.
        $sectorName 	= new Zend_Form_Element_Text('sectorName');
        $sectorName			->setAttrib('size', 20)
        					->setAttrib('maxlength', 30);
        
        // Ein Oberbegriff, der mehrere Branchen-Namen zusammenfasst.
        $genericTerm	= new Zend_Form_Element_Text('genericTerm');					
        $genericTerm		->setAttrib('size', 20)
        					->setAttrib('maxlength', 30);

        // Anwender, der den Datensatz erstellt hat.
        $createdBy		= new Zend_Form_Element_Text('createdBy');
        $createdBy			->setAttrib('size', 20)
        					->setAttrib('maxlength', 20);
        
        // Datum der Erstellung
        $creationDate	= new Zend_Form_Element_Text('creationDate');
        
        // Uhrzeit der Erstellung
        $creationTime	= new Zend_Form_Element_Text('creationTime');
        
        // 	Anwender, der den Datensatz zuletzt geändert hat.
        $changedBy		= new Zend_Form_Element_Text('changedBy');
        $changedBy			->setAttrib('size', 20)
        					->setAttrib('maxlength', 20);
        
        // Datum der letzten Änderung.
        $changeDate		= new Zend_Form_Element_Text('changeDate');
        
        // Uhrzeit der letzten Änderung.
        $changeTime		= new Zend_Form_Element_Text('changeTime');
        
        // Referenz-Nummer (z.B. für Import von Schmidt & Pohlmann-Daten)
		$id				= new Zend_Form_Element_Text('id');
		$id					->setAttrib('size', 20)
        					->setAttrib('maxlength', 20);

		// Ein Hauptbegriff, der mehrere Oberbegriffe zusammenfasst.
		$mainTerm		= new Zend_Form_Element_Text('mainTerm');
        $mainTerm			->setAttrib('size', 20)
        					->setAttrib('maxlength', 30);
        					
		// Interne, eindeutige Nummer (primary key), wird vom System generiert
		$idNumber		= new Zend_Form_Element_Hidden('idNumber');
		
		// Wert ist ein LongInt
        $ownerInternal	= new Zend_Form_Element_Hidden('ownerInternal');
	
        // 
		$zvmInfo		= new Zend_Form_Element_Text('zvmInfo');
		$zvmInfo			->setAttrib('size', 20)
        					->setAttrib('maxlength', 20);
        
		// Wert ist ein LongInt
        $client			= new Zend_Form_Element_Text('client');

               		
        $this->addElements(array(	$sectorName, $genericTerm, $createdBy, 
        							$creationDate, $creationTime, $changedBy, $changeDate, $changeTime, $id,
        							$mainTerm, $idNumber, $ownerInternal, $zvmInfo, $client
        					));
    }
}