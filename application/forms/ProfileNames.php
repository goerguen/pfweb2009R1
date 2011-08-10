<?php

/**
 * 
 * Erstellt ein Zend-Formular mit Merkmalnamen-Eigenschaften.
 * @author gk
 *
 */
class Application_Form_ProfileNames extends Zend_Form
{
    public function init()
    {
        $this->setName('profileNames');

        // Eindeutiger Begriff (Unique), als Referenz in anderen Dateien.
        $name 			= new Zend_Form_Element_Text('name');
        $name				->setAttrib('size', 20)
        					->setAttrib('maxlength', 30);
        
        // Referenzbegriff aus der Stammdatei 'Branchen Namen' (Branchen Name).
        $genericTerm	= new Zend_Form_Element_Text('genericTerm');					
        $genericTerm		->setAttrib('size', 20)
        					->setAttrib('maxlength', 30);

        // Name der Datei, in der das Merkmal zur Verfügung steht						
        $filename		= new Zend_Form_Element_Text('fileName');
        $filename			->setAttrib('size', 20)
        					->setAttrib('maxlength', 30);
        					
		// Datei Nr - LongInt
		$fileNo			= new Zend_Form_Element_Text('fileNo');

		// Interne, eindeutige Nummer (primary key), wird vom System generiert
		$idNumber		= new Zend_Form_Element_Hidden('idNumber');
		  
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
        $changeDate	= new Zend_Form_Element_Text('changeDate');
        
        // Uhrzeit der letzten Änderung.
        $changeTime	= new Zend_Form_Element_Text('changeTime');
        
		// Wert ist ein LongInt
        $ownerInternal	= new Zend_Form_Element_Hidden('ownerInternal');
	
        // 
		$zvmInfo		= new Zend_Form_Element_Text('zvmInfo');
		$zvmInfo			->setAttrib('size', 20)
        					->setAttrib('maxlength', 20);
        
		// externer Code
		$codeExternal	= new Zend_Form_Element_Text('codeExternal');
		$codeExternal		->setAttrib('size', 20)
        					->setAttrib('maxlength', 12);
		// Wert ist ein LongInt
        $rank			= new Zend_Form_Element_Text('rank');

               		
        $this->addElements(array(	$name, $genericTerm, $filename, $fileNo,  $idNumber, $createdBy, 
        							$creationDate, $creationTime, $changedBy, $changeDate, $changeTime, 
        							$ownerInternal, $zvmInfo, $codeExternal, $rank
        					));
    }
}