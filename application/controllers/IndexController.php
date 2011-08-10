<?php

include_once APPLICATION_PATH.'/controllers/helper/VmSoapClient.php';

class IndexController extends Zend_Controller_Action
{

    public function init() {
        /* Initialize action controller here */
    }
    
    public function indexAction() {
    		    		
			$db = new Zend_Db_Adapter_Pdo_Mysql(array(
			    'host'     => '127.0.0.1',
			    'username' => 'root',
			    'password' => 'root',
			    'dbname'   => 'vmweb'));
			
			$form = new Application_Form_LogIn();
			$form->submit->setLabel('Einloggen');
			$this->view->form = $form;
			
			
			if ($this->getRequest()->isPost()) {
	            $formData = $this->getRequest()->getPost();
				
	            if ($form->isValid($formData)) {
	                $verlag = $form->getValue('Verlag');
	                $user 	= $form->getValue('Username');
	                $pw		= $form->getValue('Passwort');
	          
	                $verlagDb = new Application_Model_DbTable_Verlag();
	                
	  				$stmt = $db->query(
	  					'SELECT v.soapServer, m.username, m.vorname, m.nachname FROM verlag v, mitarbeiter m WHERE firmaAnzeige = ? AND m.username = ? AND v.id = m.verlagId',
  						array($verlag, $user)
	  				);
	                $vmUser	= $stmt->fetchAll();
	  				
                
	  				if (empty($vmUser[0]['soapServer'])) {
	  					$this->view->Meldung = "Bitte &Uuml;berpr&uuml;fen Sie Ihre Eingaben !";
	  				} else {
	  					session_start();
	  					
	  					$vmSoapClient = new SOAPClient($vmUser[0]['soapServer']);
	  					$vmSession = $vmSoapClient->ws_login($user, $pw, "");
	  					
		                $_SESSION['vmweb']['soapServer'] 	= $vmUser[0]['soapServer'];
		                $_SESSION['vmweb']['user'] 			= $vmUser[0]['username'];
		                $_SESSION['vmweb']['vorname'] 		= $vmUser[0]['vorname'];
		                $_SESSION['vmweb']['nachname'] 		= $vmUser[0]['nachname'];
		                $_SESSION['vmweb']['vmSession'] 	= $vmSession;
		                
		                $vmClient = new SOAPClient($_SESSION['vmweb']['soapServer'], array('login' => $_SESSION['vmweb']['user'], 
    						  'password' => $_SESSION['vmweb']['vmSession'], 'soap_version' => "SOAP_1_2"));
		                
		                $vmVersion = $vmClient->ws_VMVersion(); 
		                
		                switch($vmVersion['Version']) {
		                	case "2009" :  
		                		if ($vmVersion['SubVersion'] < 10) {
		                			$this->_helper->redirector('index'); //Beispiel !!!!!!
		                			break;
		                		} elseif ($vmVersion['SubVersion'] >= 10 and $vmVersion['SubVersion'] < 60) {
		                			$this->_helper->redirector('index'); //Beispiel !!!!!!
		                			break;
		                		} else {
		                			$this->_helper->redirector('customerssearch','customer');
		                			break;
		                		}
		                	default: 
		                			$this->_helper->redirector('error'); //Beispiel !!!!!!
		                }
	  				}
	        	}
			}
    }

    public function addAction() {
        $form = new Application_Form_Album();
        $form->submit->setLabel('Add');
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $artist = $form->getValue('artist');
                $title = $form->getValue('title');
                $albums = new Application_Model_DbTable_Albums();
                $albums->addAlbum($artist, $title);
                
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        }   
    }

    public function editAction() {
        $form = new Application_Form_Album();
        $form->submit->setLabel('Save');
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $id = (int)$form->getValue('id');
                $artist = $form->getValue('artist');
                $title = $form->getValue('title');
                $albums = new Application_Model_DbTable_Albums();
                $albums->updateAlbum($id, $artist, $title);
                
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        } else {
            $id = $this->_getParam('id', 0);
            if ($id > 0) {
                $albums = new Application_Model_DbTable_Albums();
                $form->populate($albums->getAlbum($id));
            }
        }        
    }

    public function deleteAction()  {
        if ($this->getRequest()->isPost()) {
            $del = $this->getRequest()->getPost('del');
            if ($del == 'Yes') {
                $id = $this->getRequest()->getPost('id');
                $albums = new Application_Model_DbTable_Albums();
                $albums->deleteAlbum($id);
            }
            $this->_helper->redirector('index');
        } else {
            $id = $this->_getParam('id', 0);
            $albums = new Application_Model_DbTable_Albums();
            $this->view->album = $albums->getAlbum($id);
        }
    }    	
}







