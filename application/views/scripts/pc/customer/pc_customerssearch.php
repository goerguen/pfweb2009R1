<?php 
	include APPLICATION_PATH.'/views/scripts/pc/toolbar/pc_customerssearchMainToolBar.php'; 
?>	

<table width="100%" border="0px" style="font-family:helvetica,arial,sans-serif; font-size:85%;" cellpadding="2px" cellspacing="0">
	<tr>
		<td>&nbsp;</td>
		<td colspan="9" height="10px"></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="5"></td>
		<td style="background-color:#EEEEEE;border-top:solid 1px #999999;border-left:solid 1px #999999;border-right:solid 1px #999999;"><b>Dispo-Relevanz</b></td>
		<td colspan="3"></td>
		<td>&nbsp;</td>
	</tr>
	<tr valign="top">
		<td>&nbsp;</td>
		<td>Kunden Suchname</td>
		<td colspan="3"><?php echo $this->form->getElement('keyName');?></td>
		<td>&nbsp;</td>
		<td style="background-color:#EEEEEE;border-left:solid 1px #999999;border-right:solid 1px #999999;"><input type="checkbox" id="vmAL" name="vmAL">VM-A</td>
		<td colspan="3"><input type="checkbox" id="CustomerWithoutContact" name="CustomerWithoutContact">Kunden ohne Ansprechpartner</td>
		<td>&nbsp;</td>
	</tr>
	<tr valign="top">
		<td>&nbsp;</td>
		<td>betreuende WA</td>
		<td colspan="3"><?php echo $this->form->getElement('betreuendeWA');?></td>
		<td>&nbsp;</td>
		<td style="background-color:#EEEEEE;border-left:solid 1px #999999;border-right:solid 1px #999999;"><input type="checkbox" id="vmAL" name="vmAL">VM-L</td>
		<td colspan="3"><input type="checkbox" id="CustomerWithoutContact" name="CustomerWithoutContact">Kunden ohne Objektinteresse</td>
		<td>&nbsp;</td>
	</tr>
	<tr valign="top">
		<td>&nbsp;</td>
		<td>Konzern</td>
		<td colspan="3"><?php echo $this->form->getElement('fromGroup');?></td>
		<td>&nbsp;</td>
		<td style="background-color:#EEEEEE;border-left:solid 1px #999999;border-right:solid 1px #999999;"><input type="checkbox" id="vmAL" name="vmAL">VM-A+L</td>
		<td colspan="3"><input type="checkbox" id="CustomerWithoutContact" name="CustomerWithoutContact" >Kunden ohne Produktgruppen-Zuordnung</td>
		<td>&nbsp;</td>
	</tr>
	<tr valign="top">
		<td>&nbsp;</td>
		<td>Ansprechpartner</td>
		<td colspan="3"><?php echo $this->form->getElement('ansprechpartnerKU');?></td>
		<td>&nbsp;</td>
		<td style="background-color:#EEEEEE;border-left:solid 1px #999999;border-right:solid 1px #999999;"><input type="checkbox" id="vmAL" name="vmAL">Ohne</td>
		<td colspan="3">&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr valign="top">
		<td>&nbsp;</td>
		<td>Position</td>
		<td colspan="3"><?php echo $this->form->getElement('positionApKu');?></td>
		<td>&nbsp;</td>
		<td style="background-color:#EEEEEE;border-bottom:solid 1px #999999;border-left:solid 1px #999999;border-right:solid 1px #999999;"><input type="checkbox" id="vmAL" name="vmAL">unbekannt</td>
		<td colspan="3">&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="9" height="35px"><hr style="background-color: #CCCCCC; color: #CCCCCC; border: 0; height: 1px;"></td>
		<td>&nbsp;</td>
	</tr>
	<tr valign="top">
		<td>&nbsp;</td>
		<td>Gebiet</td>
		<td><?php echo $this->form->getElement('area');?></td>
		<td>Typ</td>
		<td><?php echo $this->form->getElement('gebietsTypKU');?></td>
		<td>&nbsp;</td>
		<td>Inaktiv-Kennzeichen</td>
		<td colspan="3"><?php echo $this->form->getElement('inactiveFlagSelect');?></td>
		<td>&nbsp;</td>
	</tr>
	<tr valign="top">
		<td>&nbsp;</td>
		<td>Zust. Vertreter</td>
		<td colspan="3"><?php echo $this->form->getElement('vertreterKu');?></td>
		<td>&nbsp;</td>
		<td>Inaktiv-Grund</td>
		<td colspan="3"><?php echo $this->form->getElement('inactiveReason');?></td>
		<td>&nbsp;</td>
	</tr>
	<tr valign="top">
		<td>&nbsp;</td>
		<td>PLZ</td>
		<td><?php echo $this->form->getElement('pc');?></td>
		<td>Land</td>
		<td><?php echo $this->form->getElement('country');?></td>
		<td>&nbsp;</td>
		<td>Zertifikat</td>
		<td colspan="3"><?php echo $this->form->getElement('certificateSelect');?></td>
		<td>&nbsp;</td>
	</tr>
	<tr valign="top">
		<td>&nbsp;</td>
		<td>Ort</td>
		<td><?php echo $this->form->getElement('city');?></td>
		<td>Bezirk</td>
		<td><?php echo $this->form->getElement('cityCounty');?></td>
		<td>&nbsp;</td>
		<td>Mailing-Kennzeichen</td>
		<td colspan="3"><?php echo $this->form->getElement('mailingSelect');?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="9" height="35px"><hr style="background-color: #CCCCCC; color: #CCCCCC; border: 0; height: 1px;"></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td></td>
		<td colspan="3"><b>Kontaktberichte liegen vor zwischen</b></td>
		<td colspan="5" height="35px"></td>
		<td>&nbsp;</td>
	</tr>
	<!--  Zeile mit Breitenangaben der einzelnen Spalten -->
	<tr valign="top">
		<td width="7px">&nbsp;</td>
		<td width="8%">Datum</td>
		<td width="15%"><?php echo $this->form->getElement('datumKontaktberichtVon');?></td>
		<td width="8%">und</td>
		<td width="15%"><?php echo $this->form->getElement('datumKontaktberichtBis');?></td>
		<td width="7px">&nbsp;</td>
		<td width="8%">Priorit&auml;t Kunde</td>
		<td width="15%"><?php echo $this->form->getElement('priority');?></td>
		<td width="8%">Prio Auswahl</td>
		<td width="15%"><?php echo $this->form->getElement('prioritySelect');?></td>
		<td width="7px">&nbsp;</td>
	</tr>
	<tr valign="top">
		<td>&nbsp;</td>
		<td>Letzter Bericht &auml;lter als</td>
		<td><?php echo $this->form->getElement('datumKontaktberichtAlter');?></td>
		<td colspan="2"></td>
		<td>&nbsp;</td>
		<td>Objektinteresse</td>
		<td><?php echo $this->form->getElement('objektinteresse');?></td>
		<td>OI Prio</td>
		<td><?php echo $this->form->getElement('objektinteressePrio');?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="9" height="35px"><hr style="background-color: #CCCCCC; color: #CCCCCC; border: 0; height: 1px;"></td>
		<td>&nbsp;</td>
	</tr>
	<tr valign="top">
		<td>&nbsp;</td>
		<td>Merkmalliste</td>
		<td colspan="3"><?php echo $this->form->getElement('merkmalliste');?></td>
		<td>&nbsp;</td>
		<td colspan="2">Branchen Zuordnung</td>
		<td><nobr><input type="radio" name="bzu" value="1">Eingeschlossen</nobr></td>
		<td><nobr><input type="radio" name="bzu" value="2">Ausgeschlossen</nobr></td>
		<td>&nbsp;</td>
	</tr>
	<tr valign="top">
		<td>&nbsp;</td>
		<td>Merkmal-Text</td>
		<td colspan="3"><?php echo $this->form->getElement('merkmaltext');?></td>
		<td>&nbsp;</td>
		<td>Branchen Name</td>
		<td colspan="3"><?php echo $this->form->getElement('branchenname');?></td>
		<td>&nbsp;</td>
	</tr>
	<tr valign="top">
		<td>&nbsp;</td>
		<td>Merkmal-Wert</td>
		<td><?php echo $this->form->getElement('merkmalWertVon');?></td>
		<td>bis</td>
		<td><?php echo $this->form->getElement('merkmalWertBis');?></td>
		<td>&nbsp;</td>
		<td>Oberbegriff</td>
		<td colspan="3"><?php echo $this->form->getElement('mmOberbegriff');?></td>
		<td>&nbsp;</td>
	</tr>
	<tr valign="top">
		<td>&nbsp;</td>
		<td>Merkmal-Datum</td>
		<td><?php echo $this->form->getElement('merkmalDatumVon');?></td>
		<td>bis</td>
		<td><?php echo $this->form->getElement('merkmalDatumBis');?></td>
		<td>&nbsp;</td>
		<td>Hauptbegriff</td>
		<td colspan="3"><?php echo $this->form->getElement('mmHauptbegriff');?></td>
		<td>&nbsp;</td>
	</tr>
	<tr valign="top">
		<td>&nbsp;</td>
		<td>Bem. enth&auml;lt</td>
		<td colspan="3"><?php echo $this->form->getElement('merkmalBemerkungEnth');?></td>
		<td>&nbsp;</td>
		<td>Produkt</td>
		<td colspan="3"><?php echo $this->form->getElement('produkt');?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="9" height="35px"><hr style="background-color: #CCCCCC; color: #CCCCCC; border: 0; height: 1px;"></td>
		<td>&nbsp;</td>
	</tr>
	<tr valign="top">
		<td colspan="5"></td>
		<td>&nbsp;</td>
		<td>Bemerkung enth&auml;lt</td>
		<td colspan="3"><?php echo $this->form->getElement('bemerkungEnth');?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="9" height="35px"></td>
		<td>&nbsp;</td>
	</tr>
</table>

