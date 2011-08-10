<form id="EditCustomer" enctype="application/x-www-form-urlencoded" method="post" action="">
	<table border="0px" bgcolor="#F6F6F6" width="100%" height="100%" style="font-family:helvetica,arial,sans-serif; font-size:85%;" cellpadding="2px" cellspacing="0" >
		<tr>
			<td><?php echo $this->formCustomerEdit->getElement('idNumber');?></td>
			<td colspan="8" height="20px"></td>
			<td>&nbsp;</td>
		</tr>
		<tr valign="top">
			<td width="7px">&nbsp;</td>
			<td colspan="2" valign="middle" rowspan="3">
				<?php if($this->customer['inactiveFlag']=='N' && $this->customer['certificate']=='N') { ;?>
						<img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/statusSymbols/KuAktivGross.gif" alt="" border="none">
				<?php } elseif ($this->customer['inactiveFlag']=='N' && $this->customer['certificate']=='J') { ?>
		    			<img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/statusSymbols/KuAktivZertifikatGross.gif" alt="Aktiv" border="none">
		    	<?php } elseif ($this->customer['inactiveFlag']=='J' && $this->customer['certificate']=='N') { ?>
		    			<img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/statusSymbols/KuInaktivGross.gif" alt="Inaktiv" border="none">
		    	<?php } elseif ($this->customer['inactiveFlag']=='J' && $this->customer['certificate']=='J') { ?>
		    			<img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/statusSymbols/KuInaktivZertifikatGross.gif" alt="Inaktiv" border="none">
		    	<?php } else { ?>
		    			<img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/statusSymbols/relevanzUnbekannt.gif" alt="Unbekannte Relevanz" border="none">
		    	<?php } ?>
			</td>
			<td colspan="3"><?php echo $this->FormCheckbox('inactiveFlag', $this->customer['inactiveFlag'], NULL, array('J','N'));?>&nbsp;Inaktiv</td>
			<td width="7px">&nbsp;</td>
			<td>Kunden-Nr</td>
			<td><?php echo $this->formCustomerEdit->getElement('customerNo');?></td>
			<td width="7px">&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="3"><?php echo $this->FormCheckbox('certificate', $this->customer['certificate'], NULL, array('J','N'));?>&nbsp;Zertifikat</td>
			<td>&nbsp;</td>
			<td>Mandant</td>
			<td><?php echo $this->formCustomerEdit->getElement('client');?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="3"><?php echo $this->FormCheckbox('mailing', $this->customer['mailing'], NULL, array('X',''));?>&nbsp;Mailingsperre</td>
			<td>&nbsp;</td>
			<td colspan="2">&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="2">Suchname</td>
			<td colspan="3"><?php echo $this->formCustomerEdit->getElement('keyName');?></td>
			<td>&nbsp;</td>
			<td>Handelsreg. Nr.</td>
			<td><?php echo $this->formCustomerEdit->getElement('registeredNo');?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="2">Konzern</td>
			<td colspan="3"><?php echo $this->formCustomerEdit->getElement('fromGroup');?></td>
			<td>&nbsp;</td>
			<td>Registergericht</td>
			<td><?php echo $this->formCustomerEdit->getElement('registeredAt');?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="2">Priorit&auml;t</td>
			<td colspan="3"><?php echo $this->formCustomerEdit->getElement('priority');?></td>
			<td>&nbsp;</td>
			<td>Telefon</td>
			<td><?php echo $this->formCustomerEdit->getElement('phone');?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="2">Gebiet</td>
			<td colspan="3"><?php echo $this->formCustomerEdit->getElement('area');?></td>
			<td>&nbsp;</td>
			<td>Fax</td>
			<td><?php echo $this->formCustomerEdit->getElement('fax');?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="2">Name1</td>
			<td colspan="3"><?php echo $this->formCustomerEdit->getElement('name1');?></td>
			<td>&nbsp;</td>
			<td>WWW</td>
			<td><?php echo $this->formCustomerEdit->getElement('www');?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="2">Name2</td>
			<td colspan="3"><?php echo $this->formCustomerEdit->getElement('name2');?></td>
			<td>&nbsp;</td>
			<td>E-Mail</td>
			<td><?php echo $this->formCustomerEdit->getElement('eMail');?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="2">Name3</td>
			<td colspan="3"><?php echo $this->formCustomerEdit->getElement('name3');?></td>
			<td>&nbsp;</td>
			<td>Bemerkung</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="2">Adresszusatz</td>
			<td colspan="3"><?php echo $this->formCustomerEdit->getElement('addressSupplement');?></td>
			<td rowspan="9" width="7px">&nbsp;</td>
			<td rowspan="9" colspan="2" valign="top"><?php echo $this->formCustomerEdit->getElement('comments');?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="2">Strasse</td>
			<td colspan="3"><?php echo $this->formCustomerEdit->getElement('street');?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="2">Nr.</td>
			<td><?php echo $this->formCustomerEdit->getElement('strHouseno');?></td>
			<td>Zusatz Str.</td>
			<td><?php echo $this->formCustomerEdit->getElement('streetSuppl');?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="2">Land</td>
			<td colspan="3"><?php echo $this->formCustomerEdit->getElement('country');?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>PLZ (Str.)</td>
			<td rowspan="3"><?php echo $this->FormRadio('pcFlag', $this->customer['pcFlag'], array(), array('1'=>'1','2'=>'2','3'=>'3'));?></td>
			<td><?php echo $this->formCustomerEdit->getElement('pcStreet');?></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>PLZ (PF)</td>
			<td><?php echo $this->formCustomerEdit->getElement('pcPo');?></td>
			<td>Postfach</td>
			<td><?php echo $this->formCustomerEdit->getElement('poBox');?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>PLZ (GK)</td>
			<td><?php echo $this->formCustomerEdit->getElement('pcCu');?></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="2">Bezirk</td>
			<td colspan="3"><?php echo $this->formCustomerEdit->getElement('cityCounty');?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="2">Adressart</td>
			<td colspan="3"><?php echo $this->formCustomerEdit->getElement('addrType');?></td>
			<td>&nbsp;</td>		
		</tr>
	</table>
</form>