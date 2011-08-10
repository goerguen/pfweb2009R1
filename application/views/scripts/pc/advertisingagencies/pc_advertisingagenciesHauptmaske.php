<table border="0px" width="100%" height="100%" style="font-family:helvetica,arial,sans-serif; font-size:85%;" cellpadding="2px" cellspacing="0" >
	<tr>
		<td><?php echo $this->formCustomerEdit->getElement('idNumber');?></td>
		<td colspan="8" height="20px">
		</td><td>&nbsp;</td>
	</tr>
	<tr valign="top">
		<td width="7px">&nbsp;</td>
		<td>Relevanz</td>
		<td>
			<?php if ($this->customer['bpRelevance']=='0') { ?>
					<img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/statusSymbols/KuVM-Unbekannt.gif" alt="Unbekannte Relevanz" border="none">
			<?php } elseif ($this->customer['bpRelevance']=='1') { ?>
	    			<img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/statusSymbols/KuVM-Keine.gif" alt="Keine Relevanz" border="none">
	    	<?php } elseif ($this->customer['bpRelevance']=='2') { ?>
	    			<img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/statusSymbols/KuVM-L.gif" alt="VM-L" border="none">
	    	<?php } elseif ($this->customer['bpRelevance']=='3') { ?>
	    			<img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/statusSymbols/KuVM-A.gif" alt="VM-A" border="none">
	    	<?php } elseif ($this->customer['bpRelevance']=='4') { ?>
	    			<img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/statusSymbols/KuVM-A+L.gif" alt="VM-A+L" border="none">
	    	<?php } else {?>
	    			<img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/statusSymbols/KuVM-Unbekannt.gif" alt="Unbekannte Relevanz" border="none">
	    	<?php } ?>
		</td>
		<td colspan="3">
			<?php if ($this->customer['inactiveFlag']=='N') { ?>
					<img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/statusSymbols/KuAktivRahmen.gif" alt="Aktiv" border="none">
			<?php } else {?>
	    			<img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/statusSymbols/KuInaktivRahmen.gif" alt="Inaktiv" border="none">
	    	<?php } ?>
			&nbsp;Inaktiv
		</td>
		<td width="7px">&nbsp;</td>
		<td>Kunden-Nr</td>
		<td><?php echo $this->formCustomerHM->getElement('customerNo');?></td>
		<td width="7px">&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="2"></td>
		<td colspan="3">
			<?php if ($this->customer['certificate']=='J') { ?>
					<img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/statusSymbols/zertifikatRahmen.gif" alt="Zertifikat vorhanden" border="none">
			<?php } else {?>
	    			<img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/statusSymbols/KuVM-Keine.gif" alt="Kein Zertifikat" border="none">
	    	<?php } ?>
			&nbsp;Zertifikat
		</td>
		<td>&nbsp;</td>
		<td>Mandant</td>
		<td><?php echo $this->formCustomerHM->getElement('client');?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="2"></td>
		<td colspan="3">
			<?php if ($this->customer['mailing']=='X') { ?>
					<img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/statusSymbols/mailingsperreRahmen.gif" alt="Mailingsperre" border="none">
			<?php } else {?>
	    			<img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/statusSymbols/KuVM-Keine.gif" alt="Keine Mailingsperre" border="none">
	    	<?php } ?>
			&nbsp;Mailingsperre
		</td>
		<td>&nbsp;</td>
		<td colspan="2">&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="2">Suchname</td>
		<td colspan="3"><?php echo $this->formCustomerHM->getElement('keyName');?></td>
		<td>&nbsp;</td>
		<td>Handelsreg. Nr.</td>
		<td><?php echo $this->formCustomerHM->getElement('registeredNo');?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="2">Konzern</td>
		<td colspan="3"><?php echo $this->formCustomerHM->getElement('fromGroup');?></td>
		<td>&nbsp;</td>
		<td>Registergericht</td>
		<td><?php echo $this->formCustomerHM->getElement('registeredAt');?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="2">Priorit&auml;t</td>
		<td colspan="3"><?php echo $this->formCustomerHM->getElement('priority');?></td>
		<td>&nbsp;</td>
		<td>Telefon</td>
		<td><?php echo $this->formCustomerHM->getElement('phone');?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="2">Gebiet</td>
		<td colspan="3"><?php echo $this->formCustomerHM->getElement('area');?></td>
		<td>&nbsp;</td>
		<td>Fax</td>
		<td><?php echo $this->formCustomerHM->getElement('fax');?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="2">Name1</td>
		<td colspan="3"><?php echo $this->formCustomerHM->getElement('name1');?></td>
		<td>&nbsp;</td>
		<td>WWW</td>
		<td><?php echo $this->formCustomerHM->getElement('www');?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="2">Name2</td>
		<td colspan="3"><?php echo $this->formCustomerHM->getElement('name2');?></td>
		<td>&nbsp;</td>
		<td>E-Mail</td>
		<td><?php echo $this->formCustomerHM->getElement('eMail');?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="2">Name3</td>
		<td colspan="3"><?php echo $this->formCustomerHM->getElement('name3');?></td>
		<td>&nbsp;</td>
		<td>Bemerkung</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="2">Adresszusatz</td>
		<td colspan="3"><?php echo $this->formCustomerHM->getElement('addressSupplement');?></td>
		<td rowspan="9" width="7px">&nbsp;</td>
		<td rowspan="9" colspan="2" valign="top"><?php echo $this->formCustomerHM->getElement('comments');?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="2">Strasse</td>
		<td colspan="3"><?php echo $this->formCustomerHM->getElement('street');?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="2">Nr.</td>
		<td><?php echo $this->formCustomerHM->getElement('strHouseno');?></td>
		<td>Zusatz Str.</td>
		<td><?php echo $this->formCustomerHM->getElement('streetSuppl');?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="2">Land</td>
		<td colspan="3"><?php echo $this->formCustomerHM->getElement('country');?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>PLZ (Str.)</td>
		<td rowspan="3" >
			<?php echo $this->FormRadio('pcFlagHM', $this->customer['pcFlag'], array('disabled'=>'disabled','readonly'=>'readonly'), array('1'=>'1','2'=>'2','3'=>'3'));?>
		</td>
		<td><?php echo $this->formCustomerHM->getElement('pcStreet');?></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>PLZ (PF)</td>
		<td><?php echo $this->formCustomerHM->getElement('pcPo');?></td>
		<td>Postfach</td>
		<td><?php echo $this->formCustomerHM->getElement('poBox');?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>PLZ (GK)</td>
		<td><?php echo $this->formCustomerHM->getElement('pcCu');?></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="2">Bezirk</td>
		<td colspan="3"><?php echo $this->formCustomerHM->getElement('cityCounty');?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="2">Adressart</td>
		<td colspan="3"><?php echo $this->formCustomerHM->getElement('addrType');?></td>
		<td>&nbsp;</td>		
	</tr>
</table>