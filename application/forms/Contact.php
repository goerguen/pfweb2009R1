<?php

class Application_Form_Contact extends Zend_Form
{
    public function init()
    {
  	
        $this->setName('contactForm');
        
        $recordCount    = new Zend_Form_Element_Text('recordCount');
        $recordCount		->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');        
        
		//Mandant   
	    $client			= new Zend_Form_Element_Text('client');
	    $client				->setAttrib('style', 'width:100%')
	 						->setAttrib('maxlength', 20)
	 						->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');           
	
		//interne Nummer
		$idNumber		= new Zend_Form_Element_Hidden('idNumber');
		$idNumber			->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
	        
	        
		//Geschäftspartner-Relevanz
		$bpRelevance	= new Zend_Form_Element_Text('bpRelevance');
		$bpRelevance		->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
	    		 			       
	        
	    //Adresszertifikat
		$certificate	= new Zend_Form_Element_Text('certificate');
	    $certificate    	->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
	
	   	// Mailingsperre
		$mailing		= new Zend_Form_Element_Text('mailing');
	    $mailing			->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
	
	    //Kunden-Nr.
		$customerNo		= new Zend_Form_Element_Text('customerNo');
		$customerNo			->setAttrib('style', 'width:100%')
	 						->setAttrib('maxlength', 20)
	 						->removeDecorator('label')
	    		 			->removeDecorator('htmlTag'); 
				 
	        
	    //Suchname (Matchcode)
		$keyName		= new Zend_Form_Element_Text('keyName');
	    $keyName			->setAttrib('maxlength', 20)
	    					->setAttrib('style', 'width:100%')
	    					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');    					
	
	    //Konzern des Kunden
		$groupNo		= new Zend_Form_Element_Text('groupNo');
	    $groupNo 			->setAttrib('style', 'width:100%')
	    					->setAttrib('maxlength', 20)
	    					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag'); 
	
	    //Nr. des Konzerns
		$fromGroup		= new Zend_Form_Element_Text('fromGroup');
		$fromGroup			->setAttrib('style', 'width:100%')
							->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
	        
		//Gebiet
		$area			= new Zend_Form_Element_Text('area');
	    $area				->setAttrib('style', 'width:100%')
	    					->setAttrib('maxlength', 10)
	    					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag'); 
	                    
	    //Priorität
		$priority		= new Zend_Form_Element_Text('priority');
	    $priority 			->setAttrib('style', 'width:100%')
	    					->setAttrib('maxlength', 20)
	    					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag'); 
	        
	    //Name1
		$name1			= new Zend_Form_Element_Text('name1');
	    $name1				->setAttrib('style', 'width:100%')
	    					->setAttrib('maxlength', 80)
	    					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');        
	           
	    //Name2
		$name2			= new Zend_Form_Element_Text('name2');
	    $name2				->setAttrib('style', 'width:100%')
	     					->setAttrib('maxlength', 80)
	     					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
				
	    //Name3
		$name3			= new Zend_Form_Element_Text('name3');
		$name3				->setAttrib('style', 'width:100%')
	    					->setAttrib('maxlength', 80)
	    					->removeDecorator('label')
	    		 			->removeDecorator('htmlTag'); 
	        
	    //PLZ
		$pc             = new Zend_Form_Element_Text('pc');
	    $pc           		->setAttrib('style', 'width:100%')
	                        ->setAttrib('maxlength', 20)
	                        ->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
	
	    //PLZ Straße
		$pcStreet       = new Zend_Form_Element_Text('pcStreet');
	    $pcStreet			->setAttrib('style', 'width:100%')
	                        ->setAttrib('maxlength', 20)
	                        ->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
	
	    //PLZ Postfach
		$pcPo    		= new Zend_Form_Element_Text('pcPo');
	    $pcPo 				->setAttrib('style', 'width:100%')
	                        ->setAttrib('maxlength', 20)
	                        ->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
	
	        //PLZ Großkunde
		$pcCu 			= new Zend_Form_Element_Text('pcCu');
	    $pcCu               ->setAttrib('style', 'width:100%')
	                        ->setAttrib('maxlength', 20)
	                        ->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
	
	    //PLZ Flag - Flag, welche PLZ aktiv ist (PLZ-Str. (1) oder PLZ-Postfach (2) PLZ_GK (3))
		$pcFlag			= new Zend_Form_Element_Text('pcFlag');
		$pcFlag				->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
	                    
	    //Ort
		$city			= new Zend_Form_Element_Text('city');
	    $city 					->setAttrib('style', 'width:100%')
	                            ->setAttrib('maxlength', 80)
	                            ->removeDecorator('label')
	    		 				->removeDecorator('htmlTag');
	       
	    //Strasse
		$street			= new Zend_Form_Element_Text('street');
	    $street                	->setAttrib('style', 'width:100%')
								->setAttrib('maxlength', 80)
								->removeDecorator('label')
	    		 				->removeDecorator('htmlTag');
	
	    //Haus-Nr.
		$strHouseno 	= new Zend_Form_Element_Text('strHouseno');
	    $strHouseno             ->setAttrib('style', 'width:100%')
	                            ->setAttrib('maxlength', 80)
	                            ->removeDecorator('label')
	    		 				->removeDecorator('htmlTag');
	
	  	//Strasse-Zusatz
		$streetSuppl	= new Zend_Form_Element_Text('streetSuppl');
	    $streetSuppl        	->setAttrib('style', 'width:100%')
	                            ->setAttrib('maxlength', 80)
	                            ->removeDecorator('label')
	    		 				->removeDecorator('htmlTag');     
		//Adress-Zusatz
		$addressSupplement  = new Zend_Form_Element_Text('addressSupplement');
	    $addressSupplement      ->setAttrib('style', 'width:100%')
	                            ->setAttrib('maxlength', 80)
	                            ->removeDecorator('label')
	    		 				->removeDecorator('htmlTag');  
	                            
	    //Bezirk
		$cityCounty		= new Zend_Form_Element_Text('cityCounty ');
	    $cityCounty             ->setAttrib('style', 'width:100%')
	                            ->setAttrib('maxlength', 80)
	                            ->removeDecorator('label')
	    		 				->removeDecorator('htmlTag');  
	
	  	//Postfach
		$poBox            = new Zend_Form_Element_Text('poBox');
	    $poBox                	->setAttrib('style', 'width:100%')
	                            ->setAttrib('maxlength', 20)
	                            ->removeDecorator('label')
	    		 				->removeDecorator('htmlTag'); 
	
	    //Telefon-Nr.
		$phone            = new Zend_Form_Element_Text('phone');
	    $phone                	->setAttrib('style', 'width:100%')
	                            ->setAttrib('maxlength', 80)
	                            ->removeDecorator('label')
	    		 				->removeDecorator('htmlTag');   
	
	             
	    //Fax-Nr.
		$fax            = new Zend_Form_Element_Text('fax');
	    $fax                	->setAttrib('style', 'width:100%')
	                            ->setAttrib('maxlength', 30)
	                            ->removeDecorator('label')
	    		 				->removeDecorator('htmlTag');        
	        
	    //Land
		$country         = new Zend_Form_Element_Text('country');
	    $country                	->setAttrib('style', 'width:100%')
	                                ->setAttrib('maxlength', 10)
	                                ->removeDecorator('label')
	    		 					->removeDecorator('htmlTag');
	
	   	//Adressart
		$addrType         = new Zend_Form_Element_Text('addrType');
	    $addrType               	->setAttrib('style', 'width:100%')
	                                ->setAttrib('maxlength', 30)
	                                ->removeDecorator('label')
	    		 					->removeDecorator('htmlTag');
	
		//Bankverbindung
		$bank	       = new Zend_Form_Element_Text('bank');
	    $bank                	->setAttrib('style', 'width:100%')
	                            ->setAttrib('maxlength', 30)
	                            ->removeDecorator('label')
	    		 				->removeDecorator('htmlTag');
	
		//Bankleitzahl
		$bankSortCode         = new Zend_Form_Element_Text('bankSortCode');
	    $bankSortCode               ->setAttrib('style', 'width:100%')
	                                ->setAttrib('maxlength', 30)
	                                ->removeDecorator('label')
	    		 					->removeDecorator('htmlTag');
	
		//Kontonummer
		$accountNo        = new Zend_Form_Element_Text('accountNo');
	    $accountNo                ->setAttrib('style', 'width:100%')
	                              ->setAttrib('maxlength', 30)
	                              ->removeDecorator('label')
	    		 				  ->removeDecorator('htmlTag');
	
		//Zahlungsmodus
		$paymentMethod         = new Zend_Form_Element_Text('paymentMethod');
	    $paymentMethod              ->setAttrib('size', 2)
	                                ->setAttrib('maxlength', 2)
	                                ->removeDecorator('label')
	    		 					->removeDecorator('htmlTag');
	
	    //Handelsrgister
		$registeredNo		= new Zend_Form_Element_Text('registeredNo');
	    $registeredNo               ->setAttrib('style', 'width:100%')
	                                ->setAttrib('maxlength', 20)
	                                ->removeDecorator('label')
	    		 					->removeDecorator('htmlTag');   
	
	    //Registergericht
		$registeredAt		= new Zend_Form_Element_Text('registeredAt');
	    $registeredAt               ->setAttrib('style', 'width:100%')
	                                ->setAttrib('maxlength', 20)
	                                ->removeDecorator('label')
	    		 					->removeDecorator('htmlTag'); 
	                                
		//Umsatzsteuer-ID
		$salestaxid		= new Zend_Form_Element_Text('salestaxid');
	    $salestaxid                 ->setAttrib('style', 'width:100%')
	                                ->setAttrib('maxlength', 20)
	                                ->removeDecorator('label')
	    		 					->removeDecorator('htmlTag');
	
		//E-Mail-Adresse des Kunden
		$eMail		= new Zend_Form_Element_Text('eMail');
	    $eMail                	->setAttrib('style', 'width:100%')
	                            ->setAttrib('maxlength', 80)
	                            ->removeDecorator('label')
	    		 				->removeDecorator('htmlTag');
	
		//Internet-Adresse
		$www		= new Zend_Form_Element_Text('www');
	    $www			->setAttrib('style', 'width:100%')
	    				->setAttrib('maxlength', 80)
	    				->removeDecorator('label')
	    		 		->removeDecorator('htmlTag');
	
	   	// Vorauskasse
		$prepayment    = new Zend_Form_Element_Text('prepayment');
		$prepayment			->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
	
	   	// Vorausrechnung
		$advanceInv    = new Zend_Form_Element_Text('advanceInv');
		$advanceInv			->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');
	
	        //Bemerkung
		$comments         = new Zend_Form_Element_Textarea('comments');
		$comments			->setAttrib('cols', '30')
							->setAttrib('rows', '17')
							->removeDecorator('label')
	    		 			->removeDecorator('htmlTag');;
	        
	        //Erstellt von
		$createdBy        = new Zend_Form_Element_Hidden('createdBy');
	        
	        //Erstellt am
		$creationDate    = new Zend_Form_Element_Hidden('creationDate');
	        
	        //Erstellt um
		$creationTime    = new Zend_Form_Element_Hidden('creationTime');
	        
	        //Geändert von
		$changedBy        = new Zend_Form_Element_Hidden('changedBy');
	        
	        //Geändert am
		$changeDate        = new Zend_Form_Element_Hidden('changeDate');
	        
	        //Geändert um
		$changeTime        = new Zend_Form_Element_Hidden('changeTime');
		
		$inactiveFlag	   = new Zend_Form_Element_Text('inactiveFlag');
		$inactiveFlag			->removeDecorator('label')
	    		 				->removeDecorator('htmlTag');
		
		$inactiveReason	   = new Zend_Form_Element_Text('inactiveReason');
		$inactiveReason			->setAttrib('style', 'width:100%')
								->removeDecorator('label')
	    		 				->removeDecorator('htmlTag');	
		
		//-------------------- Zusätzliche Felder für die Suche ------------------------//
		$betreuendeWA	 	= new Zend_Form_Element_Text('betreuendeWA');
		$betreuendeWA			->setAttrib('style', 'width:100%')
	    						->setAttrib('maxlength', 80)
	    						->removeDecorator('label')
	    		 				->removeDecorator('htmlTag');
	    						
	    $ansprechpartnerKU 	= new Zend_Form_Element_Text('ansprechpartnerKU');
		$ansprechpartnerKU		->setAttrib('style', 'width:100%')
	    						->setAttrib('maxlength', 80)
	    						->removeDecorator('label')
	    		 				->removeDecorator('htmlTag');
	    						
	    $positionApKu		= new Zend_Form_Element_Text('positionApKu');
		$positionApKu			->setAttrib('style', 'width:100%')
	    						->removeDecorator('label')
	    		 				->removeDecorator('htmlTag');
	    						
	   	$gebietsTypKU		= new Zend_Form_Element_Text('gebietsTypKU');
	   	$gebietsTypKU			->setAttrib('style', 'width:100%')
	   							->removeDecorator('label')
	    		 				->removeDecorator('htmlTag');
	   	
	   	$vertreterKu		= new Zend_Form_Element_Text('vertreterKu');
	    $vertreterKu			->setAttrib('style', 'width:100%')
	    						->removeDecorator('label')
	    		 				->removeDecorator('htmlTag');
	    
	    $datumKontaktberichtVon	= new Zend_Form_Element_Text('datumKontaktberichtVon');
		$datumKontaktberichtVon		->setAttrib('style', 'width:100%')
	    							->setAttrib('maxlength', 80)
	    							->removeDecorator('label')
	    		 					->removeDecorator('htmlTag');
	    							
	    $datumKontaktberichtBis	= new Zend_Form_Element_Text('datumKontaktberichtBis');
		$datumKontaktberichtBis		->setAttrib('style', 'width:100%')
	    							->setAttrib('maxlength', 80)
	    							->removeDecorator('label')
	    		 					->removeDecorator('htmlTag');
	    		 				
    	$datumKontaktberichtAlter	= new Zend_Form_Element_Text('datumKontaktberichtAlter');
		$datumKontaktberichtAlter	->setAttrib('style', 'width:100%')
	    							->setAttrib('maxlength', 80)
	    							->removeDecorator('label')
	    		 					->removeDecorator('htmlTag');	

	    $objektinteresse	= new Zend_Form_Element_Text('objektinteresse');
		$objektinteresse			->setAttrib('style', 'width:100%')
	    							->setAttrib('maxlength', 80)
	    							->removeDecorator('label')
	    		 					->removeDecorator('htmlTag');
	    		 					
	    $objektinteressePrio	= new Zend_Form_Element_Text('objektinteressePrio');
		$objektinteressePrio		->setAttrib('style', 'width:100%')
	    							->setAttrib('maxlength', 80)
	    							->removeDecorator('label')
	    		 					->removeDecorator('htmlTag');
	    		 					
	   	$merkmalliste	= new Zend_Form_Element_Text('merkmalliste');
		$merkmalliste			->setAttrib('style', 'width:100%')
	    						->setAttrib('maxlength', 80)
	    						->removeDecorator('label')
	    		 				->removeDecorator('htmlTag');
	    		 				
	    $merkmaltext	= new Zend_Form_Element_Text('merkmaltext');
		$merkmaltext			->setAttrib('style', 'width:100%')
	    						->setAttrib('maxlength', 80)
	    						->removeDecorator('label')
	    		 				->removeDecorator('htmlTag');
	    		 					
	    $merkmalWertVon	= new Zend_Form_Element_Text('merkmalWertVon');
		$merkmalWertVon			->setAttrib('style', 'width:100%')
	    						->setAttrib('maxlength', 80)
	    						->removeDecorator('label')
	    		 				->removeDecorator('htmlTag');
	    		 
	    $merkmalWertBis	= new Zend_Form_Element_Text('merkmalWertBis');
		$merkmalWertBis			->setAttrib('style', 'width:100%')
	    						->setAttrib('maxlength', 80)
	    						->removeDecorator('label')
	    		 				->removeDecorator('htmlTag');	
	    		 					
	    $merkmalDatumVon	= new Zend_Form_Element_Text('merkmalDatumVon');
		$merkmalDatumVon			->setAttrib('style', 'width:100%')
	    							->setAttrib('maxlength', 80)
	    							->removeDecorator('label')
	    		 					->removeDecorator('htmlTag');
	    		 					
	    $merkmalDatumBis	= new Zend_Form_Element_Text('merkmalDatumBis');
		$merkmalDatumBis			->setAttrib('style', 'width:100%')
	    							->setAttrib('maxlength', 80)
	    							->removeDecorator('label')
	    		 					->removeDecorator('htmlTag');
	    		 	
	    $merkmalBemerkungEnth	= new Zend_Form_Element_Text('merkmalBemerkungEnth');
		$merkmalBemerkungEnth		->setAttrib('style', 'width:100%')
	    							->setAttrib('maxlength', 80)
	    							->removeDecorator('label')
	    		 					->removeDecorator('htmlTag');
	    		 					
	   	$branchenzuordnung	= new Zend_Form_Element_Text('branchenzuordnung');
		$branchenzuordnung			->removeDecorator('label')
	    		 					->removeDecorator('htmlTag');
	    		 					
	    $branchenname	= new Zend_Form_Element_Text('branchenname');
		$branchenname				->setAttrib('style', 'width:100%')
	    							->setAttrib('maxlength', 80)
	    							->removeDecorator('label')
	    		 					->removeDecorator('htmlTag');
    
	    $mmOberbegriff	= new Zend_Form_Element_Text('mmOberbegriff');
		$mmOberbegriff				->setAttrib('style', 'width:100%')
	    							->setAttrib('maxlength', 80)
	    							->removeDecorator('label')
	    		 					->removeDecorator('htmlTag');
	    		 					
	    $mmHauptbegriff	= new Zend_Form_Element_Text('mmHauptbegriff');
		$mmHauptbegriff				->setAttrib('style', 'width:100%')
	    							->setAttrib('maxlength', 80)
	    							->removeDecorator('label')
	    		 					->removeDecorator('htmlTag');
	    		 					
	    $produkt	= new Zend_Form_Element_Text('produkt');
		$produkt					->setAttrib('style', 'width:100%')
	    							->setAttrib('maxlength', 80)
	    							->removeDecorator('label')
	    		 					->removeDecorator('htmlTag');
	    		 					
	    $bemerkungEnth	= new Zend_Form_Element_Text('bemerkungEnth');
		$bemerkungEnth				->setAttrib('style', 'width:100%')
	    							->setAttrib('maxlength', 80)
	    							->removeDecorator('label')
	    		 					->removeDecorator('htmlTag');

        $this->addElements(array(   $client, $idNumber, $bpRelevance, $certificate, $mailing, $customerNo, $keyName, $fromGroup, $groupNo, 
                                    $area,  $priority, $name1, $name2, $name3, $pc, $pcStreet, $pcPo, $pcCu, $pcFlag, $city, $street, $strHouseno, $streetSuppl, $addressSupplement, $cityCounty, $poBox, 
				 $phone, $fax, $country,$addrType, $bank, $bankSortCode, $accountNo, $paymentMethod, $registeredNo, $registeredAt, $salestaxid, $eMail, $www,
				 $prepayment, $advanceInv, $comments, $createdBy, $creationDate, $inactiveReason, $creationTime, $changedBy, $changeDate, $changeTime, $inactiveFlag,
				 $betreuendeWA, $ansprechpartnerKU, $positionApKu, $gebietsTypKU, $vertreterKu, $datumKontaktberichtVon, $datumKontaktberichtBis,
				 $datumKontaktberichtAlter, $objektinteresse, $objektinteressePrio, $merkmalliste, $merkmaltext, $branchenzuordnung, $branchenname, $merkmalWertVon, $merkmalWertBis,
				 $mmOberbegriff, $merkmalDatumVon, $merkmalDatumBis, $mmHauptbegriff, $merkmalBemerkungEnth, $produkt, $bemerkungEnth));
    }
}