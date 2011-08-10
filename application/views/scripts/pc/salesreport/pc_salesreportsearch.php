<?php 
	include APPLICATION_PATH.'/views/scripts/pc/toolbar/pc_salesreportsearchMainToolBar.php'; 
?>	

<table border="0px" width="100%" style="font-family:helvetica,arial,sans-serif; font-size:85%;" cellpadding="2px" cellspacing="0">
	<tr>
		<td>&nbsp;</td>
		<td colspan="9" height="20px"></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="5" height="20px"></td>
		<td colspan="4"><b>Entwurfsmodus</b></td>
		<td>&nbsp;</td>
	</tr>
	<tr valign="top">
		<td>&nbsp;</td>
		<td>Kunde</td>
		<td colspan="3"><?php echo $this->form->getElement('customer');?></td>
		<td>&nbsp;</td>
		<td colspan="4"><?php echo $this->formRadio('entwurfsmodus', NULL, array('checked'=>'checked'), array('1'=>'Alle'));?></td>
		<td>&nbsp;</td>
	</tr>
	<tr valign="top">
		<td>&nbsp;</td>
		<td>Werbeagentur</td>
		<td colspan="3"><?php echo $this->form->getElement('adAg1');?></td>
		<td>&nbsp;</td>
		<td colspan="4"><?php echo $this->formRadio('entwurfsmodus', NULL, NULL, array('2'=>'Entwurfsmodus'));?></td>
		<td>&nbsp;</td>
	</tr>
	<tr valign="top">
		<td>&nbsp;</td>
		<td>Gebiet KU u. WA</td>
		<td><?php echo $this->form->getElement('to');?></td>
		<td>Typ</td>
		<td><?php echo $this->form->getElement('type1');?></td>
		<td>&nbsp;</td>
		<td colspan="4"><?php echo $this->formRadio('entwurfsmodus', NULL, NULL, array('3'=>'NICHT Entwurfsmodus'));?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="9" height="35px"><hr style="background-color: #CCCCCC; color: #CCCCCC; border: 0; height: 1px;"></td>
		<td>&nbsp;</td>
	</tr>
	<tr valign="top">
		<td>&nbsp;</td>
		<td>AN</td>
		<td colspan="3"><?php echo $this->form->getElement('to');?></td>
		<td>&nbsp;</td>
		<td><b>Status</b></td>
		<td colspan="3">&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr valign="top">
		<td>&nbsp;</td>
		<td></td>
		<td colspan="3"><input type="checkbox" id="av" name="AV">Ausf&uuml;hrliche Verteilersuche</td>
		<td>&nbsp;</td>
		<td>Status</td>
		<td colspan="3"><?php echo $this->form->getElement('to');?></td>
		<td>&nbsp;</td>
	</tr>
	<tr valign="top">
		<td>&nbsp;</td>
		<td>von</td>
		<td colspan="3"><?php echo $this->form->getElement('from');?></td>
		<td>&nbsp;</td>
		<td colspan="4"><hr style="background-color: #CCCCCC; color: #CCCCCC; border: 0; height: 1px;"></td>
		<td>&nbsp;</td>
	</tr>
	<tr valign="top">
		<td>&nbsp;</td>
		<td>Diktatzeichen</td>
		<td colspan="3"><?php echo $this->form->getElement('initials');?></td>
		<td>&nbsp;</td>
		<td><b>Objekte</b></td>
		<td colspan="3">&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr valign="top">
		<td>&nbsp;</td>
		<td>Kontaktart</td>
		<td colspan="3"><?php echo $this->form->getElement('contactType');?></td>
		<td>&nbsp;</td>
		<td>Objekt</td>
		<td><?php echo $this->form->getElement('to');?></td>
		<td colspan="2"><?php echo $this->formRadio('objekt', NULL, array('checked'=>'checked'), array('1'=>'Im Feld "fuer Objekt"'));?></td>
		<td>&nbsp;</td>
	</tr>
	<tr valign="top">
		<td>&nbsp;</td>
		<td>Verteiler enth&auml;lt</td>
		<td colspan="3"><?php echo $this->form->getElement('to');?></td>
		<td>&nbsp;</td>
		<td colspan="2"></td>
		<td colspan="2"><?php echo $this->formRadio('objekt', NULL, NULL, array('2'=>'In allen Objektfeldern'));?></td>
		<td>&nbsp;</td>
	</tr>
	<tr valign="top">
		<td>&nbsp;</td>
		<td>Kurzbericht enth&auml;lt</td>
		<td colspan="3"><?php echo $this->form->getElement('to');?></td>
		<td>&nbsp;</td>
		<td>Verlag</td>
		<td colspan="3"><?php echo $this->form->getElement('to');?></td>
		<td>&nbsp;</td>
	</tr>
	<tr valign="top">
		<td>&nbsp;</td>
		<td>Text enth&auml;lt</td>
		<td colspan="3"><?php echo $this->form->getElement('to');?></td>
		<td>&nbsp;</td>
		<td colspan="4"></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="9" height="35px"><hr style="background-color: #CCCCCC; color: #CCCCCC; border: 0; height: 1px;"></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="5" height="20px"></td>
		<td colspan="4"><b>Merkmale</b></td>
		<td>&nbsp;</td>
	</tr>
	<tr valign="top">
		<td>&nbsp;</td>
		<td>Datum</td>
		<td><?php echo $this->form->getElement('to');?></td>
		<td>bis</td>
		<td><?php echo $this->form->getElement('to');?></td>
		<td>&nbsp;</td>
		<td>Merkmalliste</td>
		<td colspan="3"><?php echo $this->form->getElement('to');?></td>
		<td>&nbsp;</td>
	</tr>
	<tr valign="top">
		<td>&nbsp;</td>
		<td>Wiedervorlagen</td>
		<td><?php echo $this->form->getElement('to');?></td>
		<td>bis</td>
		<td><?php echo $this->form->getElement('to');?></td>
		<td>&nbsp;</td>
		<td>Merkmal-Text</td>
		<td colspan="3"><?php echo $this->form->getElement('to');?></td>
		<td>&nbsp;</td>
	</tr>
	<tr valign="top">
		<td>&nbsp;</td>
		<td>Erstellt am</td>
		<td><?php echo $this->form->getElement('to');?></td>
		<td>bis</td>
		<td><?php echo $this->form->getElement('to');?></td>
		<td>&nbsp;</td>
		<td>Merkmal-Wert</td>
		<td><?php echo $this->form->getElement('to');?></td>
		<td>bis</td>
		<td><?php echo $this->form->getElement('to');?></td>
		<td>&nbsp;</td>
	</tr>
	<tr valign="top">
		<td>&nbsp;</td>
		<td>Ge&auml;ndert am</td>
		<td><?php echo $this->form->getElement('to');?></td>
		<td>bis</td>
		<td><?php echo $this->form->getElement('to');?></td>
		<td>&nbsp;</td>
		<td>Bem. enth&auml;lt</td>
		<td colspan="3"><?php echo $this->form->getElement('to');?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="9" height="35px"></td>
		<td>&nbsp;</td>
	</tr>
</table>