<script type="text/javascript">
	dojo.require("dijit.dijit");
	dojo.require("dijit.Calendar");

	function anzeigen(das) {
		if (document.getElementById(das).style.display=='none') {
			document.getElementById(das).style.display='block';
		} else {
			document.getElementById(das).style.display='none';
		}
	}

	function merkmalTextfelderDisabled() {
		document.getElementById("aktMMWert").disabled = "disabled";
		document.getElementById("aktMMText").disabled = "disabled";
		document.getElementById("aktMMDate").disabled = "disabled";
		document.getElementById("aktMMComment").disabled = "disabled";
		anzeigen('datePicker');
		anzeigen('linkZumDatePicker');
	}
</script>

<table border="0px" width="100%" height="100%" style="font-family:helvetica,arial,sans-serif; font-size:85%;" cellpadding="0" cellspacing="0" >
	<tr>
		<td>&nbsp;</td>
		<td colspan="7" height="20px">&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr valign="top">
		<td width="7px">&nbsp;</td>
		<td width="8%">Datum</td>
		<td width="14%"><?php echo $this->formSalesReport->getElement('date'); ?></td>
		<td width="8%">Diktatzchn</td>
		<td width="15%"><?php echo $this->formSalesReport->getElement('initials'); ?></td>
		<td width="7px"></td>
		<td colspan="2" width="45%">
			<?php echo $this->FormCheckbox('layoutView', $this->formSalesReport->getElement('layoutView')->getValue(), NULL, array('J','N'));?>
			Entwurf
		</td>
		<td width="7px">&nbsp;</td>
	</tr>
	<tr valign="top">
		<td>&nbsp;</td>
		<td>
			<select name="to" size="1">
		      <option>AN</option>
		      <option>CC</option>
		    </select>
		</td>
		<td colspan="3"><?php echo $this->formSalesReport->getElement('to'); ?></td>		
		<td>&nbsp;</td>
		<td colspan="2" valign="bottom"><b>Merkmale zuweisen...</b></td>
		<td>&nbsp;</td>
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
		<td>&nbsp;</td>
		<td colspan="2" rowspan="7" valign="top">
			<table border="0px" width="100%" style="font-family:helvetica,arial,sans-serif; font-size:100%; margin: 0;" cellpadding="0" cellspacing="0">
					<tr>
						<td style="border:solid 1px #999999;">
							<div style="height:370px; max-height:370px; overflow:auto">
								<table border="0px" width="100%" style="font-family:helvetica,arial,sans-serif; font-size:100%; margin: 0;" cellpadding="5px" cellspacing="0">
									<tr>
										<td valign="top">
											<!-- *********** -->			
											<!-- MERKMALBAUM -->
											<!-- *********** -->
											<div 	dojoType="dojo.data.ItemFileReadStore" 
													jsId="store" 
													data="	{	identifier: 'idNumber',
											            		label: 'name',
											            		items: profilesData
											        		}"
											></div>
											
											<div 	dojoType="dijit.tree.ForestStoreModel" 
													jsId="treeModel" 
													store="store"
													query="{type: 'parent'}"
													rootId="Root"
													rootLabel="Merkmale"
													childrenAttrs="children"
											></div>
											
											<div 	dojoType="dijit.Tree" 
													id="mytree" 
													model="treeModel" 
													showRoot="false"
													openOnClick="true"
											>
												<script type="dojo/method" event="_createTreeNode" args="args"> 
													var tnode = new dijit._TreeNode(args);
													tnode.labelNode.innerHTML = args.label;
													return tnode;
												</script>
											    <script type="dojo/method" event="onClick" args="item,node">
													if (document.getElementById("aktMMIdNumber").value != "") {
														idNum = document.getElementById("aktMMIdNumber").value;
														document.getElementById("mmWert"+idNum).value	= document.getElementById("aktMMWert").value;
														document.getElementById("mmText"+idNum).value	= document.getElementById("aktMMText").value;
														document.getElementById("mmDatum"+idNum).value	= document.getElementById("aktMMDate").value;
														document.getElementById("mmBem"+idNum).value	= document.getElementById("aktMMComment").value;	
													}
													document.getElementById("aktMMIdNumber").value	= document.getElementById("mmIdNumber"+store.getValue(item,'idNumber')).value;
													document.getElementById("aktMMWert").value		= document.getElementById("mmWert"+store.getValue(item,'idNumber')).value;
													document.getElementById("aktMMText").value		= document.getElementById("mmText"+store.getValue(item,'idNumber')).value;
													document.getElementById("aktMMDate").value		= document.getElementById("mmDatum"+store.getValue(item,'idNumber')).value;
													document.getElementById("aktMMComment").value	= document.getElementById("mmBem"+store.getValue(item,'idNumber')).value;
	
													if (!document.getElementById(store.getValue(item,'idNumber')).checked) {
														document.getElementById("aktMMWert").value = "";
														document.getElementById("aktMMText").value = "";
														document.getElementById("aktMMDate").value = "";
														document.getElementById("aktMMComment").value = "";
														document.getElementById("aktMMWert").disabled = "disabled";
														document.getElementById("aktMMText").disabled = "disabled";
														document.getElementById("aktMMDate").disabled = "disabled";
														document.getElementById("aktMMComment").disabled = "disabled";
														document.getElementById('linkZumDatePicker').style.display='none';
														document.getElementById('datePicker').style.display='none';
													} else {
														document.getElementById("aktMMWert").disabled = "";
														document.getElementById("aktMMText").disabled = "";
														document.getElementById("aktMMDate").disabled = "";
														document.getElementById("aktMMComment").disabled = "";
														document.getElementById('linkZumDatePicker').style.display='block';
													}
													node.checkNode.checked = !node.checkNode.checked;
												</script>
												<script type="dojo/method" event="getIconClass" args="item,opened">
													return (!item || this.model.mayHaveChildren(item)) ? (opened ? "" : "") : "";
 												</script>
											</div>
											<!-- *********** -->			
											<!-- MERKMALBAUM -->
											<!-- *********** -->
										</td>
									</tr>
								</table>
							</div>
						</td>
					</tr>
			</table>
		</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td valign="top">Sonstige Objekte</td>
		<td colspan="3"><?php echo $this->formSalesReport->getElement('publications'); ?></td>
		<td>&nbsp;</td>
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
		<td>&nbsp;</td>
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
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td valign="top">Produkte</td>
		<td colspan="3"><?php echo $this->formSalesReport->getElement('brands'); ?></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td valign="top">Status</td>
		<td valign="top"><?php echo $this->formSalesReport->getElement('vbm_2'); ?></td>
		<td colspan="2">&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr valign="top">
		<td></td>
		<td>Kurzbericht</td>
		<td colspan="3"><?php echo $this->formSalesReport->getElement('summaryReport'); ?></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td></td>
		<td colspan="2"><b>Gesprochen mit..</b></td>
		<td><b>Ansprechpartner</b></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td colspan="2"><b>Merkmal-Zusatzattribute</b></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td></td>
		<td valign="top">Kunde</td>
		<td valign="top"><?php echo $this->formSalesReport->getElement('customer'); ?></td>
		<td colspan="2"><?php echo $this->formSalesReport->getElement('employeeOfCustomer'); ?></td>
		<td>&nbsp;</td>
		<td valign="top" colspan="2" rowspan="5">
			<table border="0px" width="100%" height="100%" style="font-family:helvetica,arial,sans-serif; font-size:100%; margin: 0;" cellpadding="5px" cellspacing="0">
				<tr valign="top">
					<td width="20%" style="border-left:solid 1px #999999;border-top:solid 1px #999999;">Merkmal-Text</td>
					<td width="25%" style="border-right:solid 1px #999999;border-top:solid 1px #999999;" height="15px">
						<input  type="hidden" id="aktMMIdNumber">
						<input 	type="text" id="aktMMText" style="width:100%">
					</td>
				</tr>
				<tr valign="top">
					<td style="border-left:solid 1px #999999;">Merkmal-Wert</td>
					<td style="border-right:solid 1px #999999;" height="15px">
						<input 	type="text" id="aktMMWert" style="width:100%">
					</td>
				</tr>
				<tr valign="top">
					<td style="border-left:solid 1px #999999;">Merkmal-Datum</td>
					<td style="border-right:solid 1px #999999;"height="15px">
						<input 	type="text" id="aktMMDate" style="width:100%">
						<div id="linkZumDatePicker">
							<a href="javascript:anzeigen('datePicker');">DatePicker</a>
						</div>
					</td>
				</tr>
				<tr>
					<td style="border-left:solid 1px #999999;"></td>
					<td style="border-right:solid 1px #999999;">
						<div 	dojoType="dijit.Calendar"
								id="datePicker"
								onChange="document.getElementById('aktMMDate').value=dojo.date.locale.format(arguments[0], 
											{formatLength: 'medium', selector:'date'});">
						</div>
					</td>
				</tr>					
				<tr>
					<td style="border-left:solid 1px #999999;" valign="bottom">Merkmal-Bemerkungen</td>
					<td style="border-right:solid 1px #999999;" valign="top" height="10px"></td>
				</tr>
				<tr valign="top">
					<td style="border-left:solid 1px #999999;border-right:solid 1px #999999;border-bottom:solid 1px #999999;" colspan="2">
						<textarea id="aktMMComment" style="width:100%" rows="3"></textarea>									
					</td>
				</tr>
			</table>
				<?php 
					echo "ID: ".$this->formSalesReport->getElement('mmIdNumber')."<br>";
					echo "Checked: ".$this->formSalesReport->getElement('mmChecked')."<br>";
					echo "Text: ".$this->formSalesReport->getElement('mmText')."<br>";
					echo "Wert: ".$this->formSalesReport->getElement('mmWert')."<br>";
					echo "Date: ".$this->formSalesReport->getElement('mmDate')."<br>";
					echo "Comment: ".$this->formSalesReport->getElement('mmComment')."<br>";
				
					for ($i=0; $i<count($this->profileNamesArray); $i++) {
						if ($this->profileNamesArray[$i]['type'] == 'child') {
				?>
							<input 	type="hidden" 
									id="<?php echo "mmIdNumber".$this->profileNamesArray[$i]['idNumber']; ?>" 
									value="<?php echo $this->profileNamesArray[$i]['idNumber']; ?>">
							<input 	type="hidden" 
									id="<?php echo "mmText".$this->profileNamesArray[$i]['idNumber']; ?>" 
									value="<?php echo $this->profileNamesArray[$i]['profilestext']; ?>">
							<input 	type="hidden" 
									id="<?php echo "mmWert".$this->profileNamesArray[$i]['idNumber']; ?>" 
									value="<?php echo $this->profileNamesArray[$i]['profilesvalue']; ?>">
							<input 	type="hidden" 
									id="<?php echo "mmDatum".$this->profileNamesArray[$i]['idNumber']; ?>" 
									value="<?php echo $this->profileNamesArray[$i]['profilesDate']; ?>">
							<input 	type="hidden" 
									id="<?php echo "mmBem".$this->profileNamesArray[$i]['idNumber']; ?>" 
									value="<?php echo $this->profileNamesArray[$i]['comments']; ?>">
				<?php
						}
					}
				?>	
		</td>		
		<td>&nbsp;</td>
	</tr>
	<tr>
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
		<td colspan="2"><?php echo $this->formSalesReport->getElement('employeeOfAdAgency1'); ?></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
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
		<td colspan="2"><?php echo $this->formSalesReport->getElement('employeeOfAdAgency2'); ?></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr valign="top">
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
		<td colspan="2"><?php echo $this->formSalesReport->getElement('employeeOfAdAgency3'); ?></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr valign="top">
		<td></td>
		<td valign="top">
			<table border="0px" width="100%" height="100%" style="font-family:helvetica,arial,sans-serif; font-size:100%; margin: 0;" cellpadding="0" cellspacing="0">
				<tr valign="top"><td>WA4</td></tr>
				<tr valign="top"><td>Art</td></tr>
			</table>
		</td>
		<td valign="top">
			<table border="0px" width="100%" height="100%" style="font-family:helvetica,arial,sans-serif; font-size:100%; margin: 0;" cellpadding="0" cellspacing="0">
				<tr valign="top"><td><?php echo $this->formSalesReport->getElement('adAg4'); ?></td></tr>
				<tr valign="top"><td><?php echo $this->formSalesReport->getElement('type4'); ?></td></tr>
			</table>
		</td>
		<td colspan="2"><?php echo $this->formSalesReport->getElement('employeeOfAdAgency4'); ?></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>	
		<tr>
		<td>&nbsp;</td>
		<td colspan="7" height="20px">&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
</table>
<script type="text/javascript">
	window.onload = merkmalTextfelderDisabled();
</script>