<?php

/**
 * 
 * Erstellt ein Zend-Formular mit Kontaktbericht-Eigenschaften.
 * @author gk
 *
 */
class Application_Form_SalesReports extends Zend_Form
{
    public function init()
    {
        $this->setName('salesReports');

        // Datum des Dokuments
        $date			= new Zend_Form_Element_Text('date');
        $date				->setAttrib('style', 'width:100%')
        					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
        
        // Wann soll das System den Anwender bei Programmstart daran erinnern.
        $diaryDate		= new Zend_Form_Element_Text('diaryDate');
        $diaryDate			->setAttrib('style', 'width:100%')
        					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
        
		// 	Anwenderspezifisches Kürzel.
        $initials 		= new Zend_Form_Element_Text('initials');
        $initials			->setAttrib('style', 'width:100%')
        					->setAttrib('maxlength', 10)
        					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');

        // 	Von wem ist dieser Bericht (Auswahlliste "Verteiler")
        $from 			= new Zend_Form_Element_Text('from');
        $from				->setAttrib('style', 'width:100%')
        					->setAttrib('maxlength', 30)
        					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');					

		// 	An wen ist dieser Bericht gerichtet (Auswahlliste "VON")
        $to 			= new Zend_Form_Element_Text('to');
        $to					->setAttrib('style', 'width:100%')
        					->setAttrib('maxlength', 30)
        					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');	
        					
        // Referenzbegriff aus der Datei 'KUNDEN' (Suchname).
        $customer		= new Zend_Form_Element_Text('customer');					
        $customer			->setAttrib('style', 'width:100%')
        					->setAttrib('maxlength', 20)
        					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
        					
        // Referenzbegriff aus der Datei 'Werbeagentur' (Suchname).
        $adAg1			= new Zend_Form_Element_Text('adAg1');					
        $adAg1				->setAttrib('style', 'width:100%')
        					->setAttrib('maxlength', 20)
        					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');					

       // Referenzbegriff aus der Datei 'Werbeagentur' (Suchname).
        $adAg2			= new Zend_Form_Element_Text('adAg2');					
        $adAg2				->setAttrib('style', 'width:100%')
        					->setAttrib('maxlength', 20)
        					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');					

        // Referenzbegriff aus der Datei 'Werbeagentur' (Suchname).
        $adAg3			= new Zend_Form_Element_Text('adAg3');					
        $adAg3				->setAttrib('style', 'width:100%')
        					->setAttrib('maxlength', 20)
        					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');					

        // Referenzbegriff aus der Datei 'Werbeagentur' (Suchname).
        $adAg4			= new Zend_Form_Element_Text('adAg4');					
        $adAg4				->setAttrib('style', 'width:100%')
        					->setAttrib('maxlength', 20)
        					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');					

        // Mit welchen Mitarbeitern vom Kunden wurde gesprochen
        $employeeOfCustomer		= new Zend_Form_Element_Textarea('employeeOfCustomer');
        $employeeOfCustomer			->setAttribs(array('rows'=>'3','style'=>'width:100%'))
        							->removeDecorator('label')
	    		 					->removeDecorator('htmlTag');					

		// 	Mit welchen Mitarbeitern von Agentur1 wurde gesprochen
        $employeeOfAdAgency1		= new Zend_Form_Element_Textarea('employeeOfAdAgency1');
        $employeeOfAdAgency1			->setAttribs(array('rows'=>'3','style'=>'width:100%'))
        								->removeDecorator('label')
	    		 						->removeDecorator('htmlTag');					
        
        // 	Mit welchen Mitarbeitern von Agentur2 wurde gesprochen
        $employeeOfAdAgency2		= new Zend_Form_Element_Textarea('employeeOfAdAgency2');
        $employeeOfAdAgency2			->setAttribs(array('rows'=>'3','style'=>'width:100%'))
        								->removeDecorator('label')
	    		 						->removeDecorator('htmlTag');					
        
        // 	Mit welchen Mitarbeitern von Agentur3 wurde gesprochen
        $employeeOfAdAgency3		= new Zend_Form_Element_Textarea('employeeOfAdAgency3');
        $employeeOfAdAgency3			->setAttribs(array('rows'=>'3','style'=>'width:100%'))
        								->removeDecorator('label')
	    		 						->removeDecorator('htmlTag');					
        
        // 	Mit welchen Mitarbeitern von Agentur4 wurde gesprochen
        $employeeOfAdAgency4		= new Zend_Form_Element_Textarea('employeeOfAdAgency4');
        $employeeOfAdAgency4			->setAttribs(array('rows'=>'3','style'=>'width:100%'))
        								->removeDecorator('label')
	    		 						->removeDecorator('htmlTag');					
        
        // 	Objekte - Liste der Objekte, über die gesprochen wurde (frei Eingebbar).
        $publications		= new Zend_Form_Element_Textarea('publications');
        $publications			->setAttribs(array('rows'=>'3','style'=>'width:100%'))
        						->removeDecorator('label')
	    		 				->removeDecorator('htmlTag');					
        
        // Produkte - Liste der Produkte, über die gesprochen wurde (frei Eingebbar).
        $brands				= new Zend_Form_Element_Textarea('brands');	
        $brands					->setAttribs(array('rows'=>'3','style'=>'width:100%'))
        						->removeDecorator('label')
	    		 				->removeDecorator('htmlTag');				
        
        // Branche - Referenz zur Datei 'Branchen Namen' (Branchen Name)
        $sector				= new Zend_Form_Element_Text('sector');					
        $sector					->setAttrib('style', 'width:100%')
        						->setAttrib('maxlength', 30)
        						->removeDecorator('label')
	    		 				->removeDecorator('htmlTag');					
        
        // Kurzbericht - Zusammenfassung des Berichts.
        $summaryReport		= new Zend_Form_Element_Textarea('summaryReport');
        $summaryReport			->setAttribs(array('rows'=>'5','style'=>'width:100%'))
        						->removeDecorator('label')
	    		 				->removeDecorator('htmlTag');	
        
        //  Verteiler -	An wen wird dieser Bericht noch verteilt.
        $distributionList	= new Zend_Form_Element_Textarea('distributionList');
        $distributionList		->removeDecorator('label')
	    		 				->removeDecorator('htmlTag');
        
        // 	Textinhalt - Textfeld (max. 32000 Zeichen).
        $text				= new Zend_Form_Element_Textarea('text');
        $text					->setAttribs(array(	"dojoType"=>"dijit.Editor",
        											"id"=>"editorKontaktbericht",
        											"onChange"=>"console.log('editorKontaktbericht onChange handler: ' + arguments[0])",
        											"plugins"=>"[	'undo','redo','|',
																	'cut','copy','paste','delete','|',
																	'bold','italic','underline','strikethrough','subscript','superscript','|', 
																	'indent','outdent','justifyLeft','justifyCenter','justifyRight','justifyFull','|',
																	'insertOrderedList','insertUnorderedList','|',
																	'removeFormat','insertHorizontalRule','|',
																	'createLink','unlink','|',
																	{name: 'dojox.editor.plugins.TablePlugins', command: 'insertTable'},
														            {name: 'dojox.editor.plugins.TablePlugins', command: 'modifyTable'},
														            {name: 'dojox.editor.plugins.TablePlugins', command: 'InsertTableRowBefore'},
														            {name: 'dojox.editor.plugins.TablePlugins', command: 'InsertTableRowAfter'},
														            {name: 'dojox.editor.plugins.TablePlugins', command: 'insertTableColumnBefore'},
														            {name: 'dojox.editor.plugins.TablePlugins', command: 'insertTableColumnAfter'},
														            {name: 'dojox.editor.plugins.TablePlugins', command: 'deleteTableRow'},
														            {name: 'dojox.editor.plugins.TablePlugins', command: 'deleteTableColumn'},
														            {name: 'dojox.editor.plugins.TablePlugins', command: 'colorTableCell'},
														            {name: 'dojox.editor.plugins.TablePlugins', command: 'tableContextMenu'}
																	]",
        											"extraPlugins"=>"[	'||',
        																'formatBlock','fontName','fontSize',
        																'foreColor','hiliteColor','|',
        																'newpage','preview','print','showblocknodes','viewsource','findreplace','pageBreak'
       																]",
        											"style"=>"width:100%"))
        						->removeDecorator('label')
	    		 				->removeDecorator('htmlTag');
        
        // Formular - Referenz zur Stamm-Datei 'Formulare' (Name).
        $form				= new Zend_Form_Element_Text('form');
        $form					->setAttrib('style', 'width:100%')
        						->setAttrib('maxlength', 20)
        						->removeDecorator('label')
	    		 				->removeDecorator('htmlTag');
        						
        // 	Adresse_Kunde - Adressfeld für Kundenanschrift
        $customerAddress	= new Zend_Form_Element_Textarea('customerAddress');
        $customerAddress		->setAttribs(array('rows'=>'3','style'=>'width:100%'))
        						->removeDecorator('label')
	    		 				->removeDecorator('htmlTag');						
        
        // 	Adresse_WA1 - Adressfeld für Anschrift der Agentur1
        $addressOfAdAgency1	= new Zend_Form_Element_Textarea('addressOfAdAgency1');
        $addressOfAdAgency1		->setAttribs(array('rows'=>'3','style'=>'width:100%'))
        						->removeDecorator('label')
	    		 				->removeDecorator('htmlTag');
        
        // Erstellt - Anwender, der den Datensatz erstellt hat.
        $createdBy			= new Zend_Form_Element_Text('createdBy');
        $createdBy				->setAttrib('style', 'width:100%')
        						->setAttrib('maxlength', 20)
        						->removeDecorator('label')
	    		 				->removeDecorator('htmlTag');
        
        // Erstellt_AM - Datum der Erstellung
        $creationDate	= new Zend_Form_Element_Text('creationDate');
        $creationDate		->setAttrib('style', 'width:100%')
        					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
        
        // 	Erstellt_UM - Uhrzeit der Erstellung
        $creationTime	= new Zend_Form_Element_Text('creationTime');
        $creationTime		->setAttrib('style', 'width:100%')
        					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
        
        // 	Geaendert - Anwender, der den Datensatz zuletzt geändert hat.
        $changedBy		= new Zend_Form_Element_Text('changedBy');
        $changedBy			->setAttrib('style', 'width:100%')
        					->setAttrib('maxlength', 20)
        					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
        
        // 	Geaendert_AM - Datum der letzten Änderung.
        $changeDate		= new Zend_Form_Element_Text('changeDate');
        $changeDate			->setAttrib('style', 'width:100%')
        					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
        
        // 	Geaendert_UM - Uhrzeit der letzten Änderung.
        $changeTime		= new Zend_Form_Element_Text('changeTime');
        $changeTime			->setAttrib('style', 'width:100%')
        					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
        
        // 	Owner_Intern (Wert ist ein LongInt) - Schriftangabe Adressfeld.
        $ownerInternal	= new Zend_Form_Element_Hidden('ownerInternal');
        $ownerInternal		->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
        
        // 	Font_Betrifft - Schriftangabe Betrifftfeld.
        $fontRe			= new Zend_Form_Element_Textarea('fontRe');
        $fontRe				->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
        
        // 	Font_Text - Schriftangabe Textfeld.
        $fontText		= new Zend_Form_Element_Textarea('fontText');
        $fontText			->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');

        // 	Size_Adresse (Integer) - Schriftgrößenangabe Adressfeld.
        $sizeAddress	= new Zend_Form_Element_Text('sizeAddress');
        $sizeAddress		->setAttrib('style', 'width:100%')
        					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');

        // 	Size_Betrifft (Integer) - Schriftgrößenangabe Betrifftfeld.
        $sizeRe			= new Zend_Form_Element_Text('sizeRe');
        $sizeRe				->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
        
        // 	Size_Text (Integer) - Schriftgrößenangabe Textfeld.
        $sizeText		= new Zend_Form_Element_Text('sizeText');
        $sizeText			->setAttrib('style', 'width:100%')
        					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
        
        // 	Style_Adresse (Integer) - Schriftstilart Adressfeld.
        $styleAddress	= new Zend_Form_Element_Text('styleAddress');
        $styleAddress		->setAttrib('style', 'width:100%')
        					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');

        // 	Style_Betrifft (Integer) - Schriftstilart Betrifftfeld.
        $styleRe		= new Zend_Form_Element_Text('styleRe');
        $styleRe			->setAttrib('style', 'width:100%')
        					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
        
        // 	Style_Text (Integer) - Schriftstilart Textfeld.
        $styleText		= new Zend_Form_Element_Text('styleText');
        $styleText			->setAttrib('style', 'width:100%')
        					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
        
        // 	Adresse_WA2 - Adressfeld für Anschrift der Agentur2
        $addressAdAg2	= new Zend_Form_Element_Textarea('addressAdAg2');
        $addressAdAg2		->setAttribs(array('rows'=>'3','style'=>'width:100%'))
        					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
        
        // 	Adresse_WA3 - Adressfeld für Anschrift der Agentur3
        $addressAdAg3	= new Zend_Form_Element_Textarea('addressAdAg3');
        $addressAdAg3		->setAttribs(array('rows'=>'3','style'=>'width:100%'))
        					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
        
        // 	Adresse_WA4 - Adressfeld für Anschrift der Agentur4
        $addressAdAg4	= new Zend_Form_Element_Textarea('addressAdAg4');
        $addressAdAg4		->setAttribs(array('rows'=>'3','style'=>'width:100%'))
        					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
        
        // 	fuer_Objekt - Referenz zur Datei 'Objekte' (Kürzel)
		$forPublication	= new Zend_Form_Element_Text('forPublication');
        $forPublication		->setAttrib('style', 'width:100%')
        					->setAttrib('maxlength', 10)
        					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
        					
        // 	Kontaktart - Telefon,schriftlich etc… (Auswahlliste "Kontaktart")
		$contactType	= new Zend_Form_Element_Text('contactType');
        $contactType		->setAttrib('style', 'width:100%')
        					->setAttrib('maxlength', 30)
        					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');

	    // 	VBM_1 - 
		$vbm_1			= new Zend_Form_Element_Text('vbm_1');
        $vbm_1				->setAttrib('style', 'width:100%')
        					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');		

	    // 	VBM_2 - 
		$vbm_2			= new Zend_Form_Element_Text('vbm_2');
        $vbm_2				->setAttrib('style', 'width:100%')
        					->setAttrib('maxlength', 4)
        					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
	    		
        // 	Art1
		$type1			= new Zend_Form_Element_Text('type1');
        $type1				->setAttrib('style', 'width:100%')
        					->setAttrib('maxlength', 20)
        					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');					
        
        // 	Art2
		$type2			= new Zend_Form_Element_Text('type2');
        $type2				->setAttrib('style', 'width:100%')
        					->setAttrib('maxlength', 20)
        					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');					

        // 	Art3
		$type3			= new Zend_Form_Element_Text('type3');
        $type3				->setAttrib('style', 'width:100%')
        					->setAttrib('maxlength', 20)
        					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');					

        // 	Art4
		$type4			= new Zend_Form_Element_Text('type4');
        $type4				->setAttrib('style', 'width:100%')
        					->setAttrib('maxlength', 20)
        					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');					
        					
		// Interne, eindeutige Nummer (primary key), wird vom System generiert
		$idNumber		= new Zend_Form_Element_Hidden('idNumber');
		$idNumber			->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
		
		// 	Archiviert_AM
		$archiveDate	= new Zend_Form_Element_Text('archiveDate');
		$archiveDate		->setAttrib('style', 'width:100%')
							->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');

		// 	
		$toXReferenceNo	= new Zend_Form_Element_Text('toXReferenceNo');
		$toXReferenceNo		->setAttrib('style', 'width:100%')
							->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
		
		// 	
		$toXCompanyType	= new Zend_Form_Element_Text('toXCompanyType');
		$toXCompanyType		->setAttrib('style', 'width:100%')
        					->setAttrib('maxlength', 2)
        					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
        					
        // 	
		$fromXReferenceNo= new Zend_Form_Element_Text('fromXReferenceNo');
		$fromXReferenceNo	->setAttrib('style', 'width:100%')
							->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
		
		// 	
		$fromXCompanyType= new Zend_Form_Element_Text('fromXCompanyType');
		$fromXCompanyType	->setAttrib('style', 'width:100%')
        					->setAttrib('maxlength', 2)
        					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
		
        // 	
		$layoutView		= new Zend_Form_Element_Text('layoutView');
		$layoutView			->setAttrib('style', 'width:100%')
        					->setAttrib('maxlength', 10)
        					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');

        // 	(Boolean)
		$draft			= new Zend_Form_Element_Checkbox('draft');
		$draft				->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
					
        // 	(Blob)
		$wrTextBlob		= new Zend_Form_Element_Textarea('wrTextBlob');
		$wrTextBlob			->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');

		// 	(LongInt)
		$groupNo		= new Zend_Form_Element_Text('groupNo');
		$groupNo			->setAttrib('style', 'width:100%')
							->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
	   
		//--------------------- Klickmerkmale -------------------------\\
		$mmIdNumber		= new Zend_Form_Element_Text('mmIdNumber');
		$mmIdNumber			->setAttrib('style', 'width:100%')
							->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
	    		 			
	   	$mmChecked		= new Zend_Form_Element_Text('mmChecked');
		$mmChecked			->setAttrib('style', 'width:100%')
							->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
	    
	    $mmText			= new Zend_Form_Element_Text('mmText');
		$mmText				->setAttrib('style', 'width:100%')
							->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
	    
	    $mmWert			= new Zend_Form_Element_Text('mmWert');
		$mmWert				->setAttrib('style','width:100%')
							->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
	    		 
	    $mmDate			= new Zend_Form_Element_Text('mmDate');
		$mmDate				->setAttrib('style', 'width:100%')
							->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
	    		 			
	    $mmComment		= new Zend_Form_Element_Text('mmComment');
		$mmComment			->setAttrib('style', 'width:100%')
							->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');

	    		 			
        $this->addElements(array(	$date, $diaryDate, $initials, $from, $to, $customer, $adAg1, $adAg2, $adAg3, $adAg4,
        							$employeeOfCustomer, $employeeOfAdAgency1, $employeeOfAdAgency2, $employeeOfAdAgency3, $employeeOfAdAgency4,
        							$publications, $brands, $sector, $summaryReport, $distributionList, $text, $form, $customerAddress,
        							$addressOfAdAgency1, $createdBy, $creationDate, $creationTime, $changedBy, $changeDate, $changeTime,
        							$ownerInternal, $fontRe, $fontText, $sizeAddress, $sizeRe, $sizeText, $styleAddress, $styleRe,
        							$styleText, $addressAdAg2, $addressAdAg3, $addressAdAg4, $forPublication, $contactType, $vbm_1, $vbm_2, 
        							$type1, $type2, $type3, $type4, $idNumber, $archiveDate, $toXReferenceNo, $toXCompanyType, $fromXCompanyType,
        							$fromXCompanyType, $layoutView, $draft, $wrTextBlob, $groupNo,
        							$mmChecked, $mmComment, $mmDate, $mmIdNumber, $mmText, $mmWert
        					));
    }
}