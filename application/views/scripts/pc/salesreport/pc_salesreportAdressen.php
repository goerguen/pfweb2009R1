<table border="0px" width="100%" height="100%" style="font-family:helvetica,arial,sans-serif; font-size:85%;" cellpadding="0" cellspacing="0" >
	<tr>
		<td></td>
		<td colspan="4" height="20px"></td>
		<td></td>
	</tr>
	<tr valign="top">
		<td width="7px">&nbsp;</td>
		<td width="10%"><b>Gesprochen mit..</b></td>
		<td width="28%">&nbsp</td>
		<td width="28%"><b>Adresse</b></td>
		<td width="28%"><b>Ansprechpartner</b></td>
		<td width="7px">&nbsp;</td>
	</tr>
	<tr valign="top">
		<td>&nbsp;</td>
		<td>Kunde</td>
		<td><?php echo $this->formSalesReport->getElement('customer'); ?></td>
		<td><?php echo $this->formSalesReport->getElement('customerAddress'); ?></td>
		<td><?php echo $this->formSalesReport->getElement('employeeOfCustomer'); ?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
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
		<td></td>
		<td colspan="4" height="15px"></td>
		<td></td>
	</tr>
	<tr valign="top">
		<td></td>
		<td>Kurzbericht</td>
		<td colspan="3"><?php echo $this->formSalesReport->getElement('summaryReport'); ?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td colspan="4" height="20px"></td>
		<td></td>
	</tr>	
</table>