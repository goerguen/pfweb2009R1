<?php print_r($this->aabbtest); ?>
<table border="0px" width="100%" height="100%" style="font-family:helvetica,arial,sans-serif; font-size:85%;" cellpadding="0" cellspacing="0" >
	<tr>
		<td></td>
		<td colspan="9" height="20px"></td>
		<td></td>
	</tr>
	<tr valign="top">
		<td>&nbsp;</td>
		<td>Datum</td>
		<td><?php echo $this->formSalesReport->getElement('date'); ?></td>
		<td>Diktatzchn</td>
		<td><?php echo $this->formSalesReport->getElement('initials'); ?></td>
		<td></td>
		<td colspan="4">
			<nobr>
				<?php echo $this->FormCheckbox('layoutView', $this->formSalesReport->getElement('layoutView')->getValue(), NULL, array('J','N'));?>
				Entwurf
			</nobr>
		</td>
		<td>&nbsp;</td>
	</tr>
	<tr valign="top">
		<td width="7px">&nbsp;</td>
		<td width="10%">
			<select name="to" size="1">
		      <option>AN</option>
		      <option>CC</option>
		    </select>
		</td>
		<td width="18%" colspan="3"><?php echo $this->formSalesReport->getElement('to'); ?></td>		
		<td width="7px">&nbsp;</td>
		<td width="7%"><b>Gesprochen mit..</b></td>
		<td width="18%">&nbsp</td>
		<td width="18%"><b>Adresse</b></td>
		<td width="18%"><b>Ansprechpartner</b></td>
		<td width="7px">&nbsp;</td>
	</tr>
	<tr valign="top">
		<td>&nbsp;</td>
		<td>
			<table border="0px" width="100%" height="100%" style="font-family:helvetica,arial,sans-serif; font-size:100%; margin: 0;" cellpadding="0" cellspacing="0">
				<tr><td>VON</td></tr>
				<tr><td>f&uuml;r Objekt</td></tr>
			</table>
		</td>
		<td colspan="3">
			<table border="0px" width="100%" height="100%" style="font-family:helvetica,arial,sans-serif; font-size:100%; margin: 0;" cellpadding="0" cellspacing="0">
				<tr><td><?php echo $this->formSalesReport->getElement('from'); ?></td></tr>
				<tr><td><?php echo $this->formSalesReport->getElement('forPublication'); ?></td></tr>
			</table>
		</td>
		<td></td>
		<td>Kunde</td>
		<td><?php echo $this->formSalesReport->getElement('customer'); ?></td>
		<td><?php echo $this->formSalesReport->getElement('customerAddress'); ?></td>
		<td><?php echo $this->formSalesReport->getElement('employeeOfCustomer'); ?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td valign="top">Sonstige Objekte</td>
		<td colspan="3"><?php echo $this->formSalesReport->getElement('publications'); ?></td>
		<td></td>
		<td>
			<table border="0px" width="100%" height="100%" style="font-family:helvetica,arial,sans-serif; font-size:100%; margin: 0;" cellpadding="0" cellspacing="0">
				<tr><td>WA1</td></tr>
				<tr><td>Art</td></tr>
			</table>	
		</td>
		<td>
			<table border="0px" width="100%" height="100%" style="font-family:helvetica,arial,sans-serif; font-size:100%; margin: 0;" cellpadding="0" cellspacing="0">
				<tr><td><?php echo $this->formSalesReport->getElement('adAg1'); ?></td></tr>
				<tr><td><?php echo $this->formSalesReport->getElement('type1'); ?></td></tr>
			</table>
		</td>
		<td><?php echo $this->formSalesReport->getElement('addressOfAdAgency1'); ?></td>
		<td><?php echo $this->formSalesReport->getElement('employeeOfAdAgency1'); ?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<table border="0px" width="100%" height="100%" style="font-family:helvetica,arial,sans-serif; font-size:100%; margin: 0;" cellpadding="0" cellspacing="0">
				<tr><td>Kontaktart</td></tr>
				<tr><td>Wiedervorlage</td></tr>
			</table>
		</td>
		<td colspan="3">
			<table border="0px" width="100%" height="100%" style="font-family:helvetica,arial,sans-serif; font-size:100%; margin: 0;" cellpadding="0" cellspacing="0">
				<tr><td><?php echo $this->formSalesReport->getElement('contactType'); ?></td></tr>
				<tr><td><?php echo $this->formSalesReport->getElement('diaryDate'); ?></td></tr>
			</table>
		</td>
		<td></td>
		<td>
			<table border="0px" width="100%" height="100%" style="font-family:helvetica,arial,sans-serif; font-size:100%; margin: 0;" cellpadding="0" cellspacing="0">
				<tr><td>WA2</td></tr>
				<tr><td>Art</td></tr>
			</table>
		</td>
		<td>
			<table border="0px" width="100%" height="100%" style="font-family:helvetica,arial,sans-serif; font-size:100%; margin: 0;" cellpadding="0" cellspacing="0">
				<tr><td><?php echo $this->formSalesReport->getElement('adAg2'); ?></td></tr>
				<tr><td><?php echo $this->formSalesReport->getElement('type2'); ?></td></tr>
			</table>
		</td>
		<td><?php echo $this->formSalesReport->getElement('addressAdAg2'); ?></td>
		<td><?php echo $this->formSalesReport->getElement('employeeOfAdAgency2'); ?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<table border="0px" width="100%" height="100%" style="font-family:helvetica,arial,sans-serif; font-size:100%; margin: 0;" cellpadding="0" cellspacing="0">
				<tr><td>Branche</td></tr>
				<tr><td>Formular</td></tr>
			</table>
		</td>
		<td colspan="3">
			<table border="0px" width="100%" height="100%" style="font-family:helvetica,arial,sans-serif; font-size:100%; margin: 0;" cellpadding="0" cellspacing="0">
				<tr><td><?php echo $this->formSalesReport->getElement('sector'); ?></td></tr>
				<tr><td><?php echo $this->formSalesReport->getElement('form'); ?></td></tr>
			</table>
		</td>
		<td></td>
		<td>
			<table border="0px" width="100%" height="100%" style="font-family:helvetica,arial,sans-serif; font-size:100%; margin: 0;" cellpadding="0" cellspacing="0">
				<tr><td>WA3</td></tr>
				<tr><td>Art</td></tr>
			</table>
		</td>
		<td>
			<table border="0px" width="100%" height="100%" style="font-family:helvetica,arial,sans-serif; font-size:100%; margin: 0;" cellpadding="0" cellspacing="0">
				<tr><td><?php echo $this->formSalesReport->getElement('adAg3'); ?></td></tr>
				<tr><td><?php echo $this->formSalesReport->getElement('type3'); ?></td></tr>
			</table>
		</td>
		<td><?php echo $this->formSalesReport->getElement('addressAdAg3'); ?></td>
		<td><?php echo $this->formSalesReport->getElement('employeeOfAdAgency3'); ?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td valign="top">Produkte</td>
		<td colspan="3"><?php echo $this->formSalesReport->getElement('brands'); ?></td>
		<td></td>
		<td>
			<table border="0px" width="100%" height="100%" style="font-family:helvetica,arial,sans-serif; font-size:100%; margin: 0;" cellpadding="0" cellspacing="0">
				<tr><td>WA4</td></tr>
				<tr><td>Art</td></tr>
			</table>
		</td>
		<td>
			<table border="0px" width="100%" height="100%" style="font-family:helvetica,arial,sans-serif; font-size:100%; margin: 0;" cellpadding="0" cellspacing="0">
				<tr><td><?php echo $this->formSalesReport->getElement('adAg4'); ?></td></tr>
				<tr><td><?php echo $this->formSalesReport->getElement('type4'); ?></td></tr>
			</table>
		</td>
		<td><?php echo $this->formSalesReport->getElement('addressAdAg4'); ?></td>
		<td><?php echo $this->formSalesReport->getElement('employeeOfAdAgency4'); ?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td valign="top">Status</td>
		<td valign="top"><?php echo $this->formSalesReport->getElement('vbm_2'); ?></td>
		<td colspan="8"></td>
	</tr>
	<tr>
		<td></td>
		<td colspan="9" height="15px"></td>
		<td></td>
	</tr>
	<tr valign="top">
		<td></td>
		<td>Kurzbericht</td>
		<td colspan="8"><?php echo $this->formSalesReport->getElement('summaryReport'); ?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td colspan="9" height="20px"></td>
		<td></td>
	</tr>	
</table>