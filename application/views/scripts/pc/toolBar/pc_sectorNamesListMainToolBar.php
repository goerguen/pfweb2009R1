<table width="100%" cellpadding="0" cellspacing="0" border="0">
  <tr>
    <td width="100%" nowrap="nowrap" style="background-image: url(http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/toolBar/br.jpg); background-repeat:repeat-x;">       
		 <img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/toolBar/vm.jpg" alt="VM" border="none"
		><img onclick="getAllSectorNamesList();" src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/toolBar/alle.jpg" style="cursor:pointer" alt="Alle" border="none" 
		><img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/toolBar/auswahl.jpg" 	alt="Auswahl" 		border="none"
		>		
		<?php 
			$curPage = explode('/', $_SERVER['REQUEST_URI']);
			for ($i=1; count($curPage)>$i; $i++) { if ($curPage[$i]=='page') break; }
			if ($curPage[$i+1] > 1) { ?>
			<img onclick="getSectorNamesListBefore();" src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/toolBar/vorheriger.jpg" style="cursor:pointer" alt="Vorheriger"	border="none"
		> <?php } else { ?>
		    <img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/toolBar/vorheriger_inactive.jpg" style="cursor:default" alt="Vorheriger"	border="none"
		> <?php } ?>		
		<?php 
			$curPage = explode('/', $_SERVER['REQUEST_URI']);
			for ($i=1; count($curPage)>$i; $i++) { if ($curPage[$i]=='page') break; }
			if ($this->sectorNames[0]['pages'] > $curPage[$i+1]) { ?>
		 	<img onclick="getSectorNamesListNext();" src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/toolBar/naechster.jpg" style="cursor:pointer" 	alt="N&auml;chster"	border="none"
		> <?php } else { ?>
			<img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/toolBar/naechster_inactive.jpg" style="cursor:default" 	alt="N&auml;chster"	border="none"
		> <?php } ?>		
		<img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/toolBar/drucken.jpg" 	alt="Drucken"		border="none"
		><img onclick="searchSectorNames();" src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/toolBar/suchen.jpg" style="cursor:pointer" alt="Suchen" border="none"
		><img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/toolBar/blank.jpg" alt="" border="none"
		><img onclick="window.open('<?php echo $this->url(array('controller'=>'customer', 'action'=>'customerdetail'));?>')" src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/toolBar/neuListe.jpg" style="cursor:pointer" alt="Neu" border="none"
		>
	</td>
	<td align="right" width="100%" nowrap="nowrap" style="background-image: url(http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/toolBar/br.jpg); background-repeat:repeat-x;">       
		<table border="0">
			<tr align="right">
				<td nowrap="nowrap" align="right" valign="top" height="9px" style="margin:0 0 0 0; padding:0 0 0 0; spacing:0 0 0 0;">
					<input type="text" align="right" value="In der Liste: <?php echo $this->escape($this->sectorNames[0]['recordCount']);?>" style="cursor:default;background-color:#F6F6F6;color:#444444;font-size:9px; margin:0 0 0 0; padding:0 0 0 0; spacing:0 0 0 0; border:0px; width:10em"  readonly="readonly" disabled="disabled">
				</td>
			</tr>
			<tr align="right">
				<td nowrap="nowrap" valign="top" height="9px" style="margin:0 0 0 0; padding:0 0 0 0; spacing:0 0 0 0;">
					<input id="currentPageSectorNamesList" align="right" type="text" style="cursor:default;background-color:#F6F6F6;margin:0 0 0 0; padding:0 0 0 0; spacing:0 0 0 0; border:0px;color:#444444;font-size:9px;width:10em"  readonly="readonly" disabled="disabled">
					<input id="maxPageSectorNamesList" value="<?php echo $this->escape($this->sectorNames[0]['pages']);?>"  type="hidden">
				</td>
			</tr>
		</table>
	</td>
  </tr>
</table>

<script>
	function CounterUebertrag () {
		document.getElementById('currentPageSectorNamesList').value = 'Seite ' + document.getElementById('sectorNamesListCounter').value + ' von <?php echo $this->escape($this->sectorNames[0]['pages']);?>';
	}
	window.onload = CounterUebertrag();
</script>