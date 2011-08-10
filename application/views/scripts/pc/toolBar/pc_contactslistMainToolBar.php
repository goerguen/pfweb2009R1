<table width="100%" cellpadding="0" cellspacing="0" border="0">
  <tr>
    <td width="100%" nowrap="nowrap" style="background-image: url(http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/toolBar/br.jpg); background-repeat:repeat-x;">       
		 <img onclick="getAllContactsList()" src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/toolBar/alle.jpg" style="cursor:pointer" alt="Alle" border="none" 
		><img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/toolBar/auswahl.jpg" 	alt="Auswahl" 		border="none"
		>
		 <?php 
		
			$curPage = explode('/', $_SERVER['REQUEST_URI']);
			for ($i=1; count($curPage)>$i; $i++) { if ($curPage[$i]=='page') break; }
			if ($curPage[$i+1] > 1) { ?>
			<img onclick="getContactsListBefore();" src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/toolBar/vorheriger.jpg" style="cursor:pointer" alt="Vorheriger"	border="none"
		> <?php } else { ?>
		    <img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/toolBar/vorheriger_inactive.jpg" style="cursor:default" alt="Vorheriger"	border="none"
		> <?php } ?>		
		<?php 
			$curPage = explode('/', $_SERVER['REQUEST_URI']);
			for ($i=1; count($curPage)>$i; $i++) { if ($curPage[$i]=='page') break; }
			if ($this->contacts[0]['pages'] > $curPage[$i+1]) { ?>
		 	<img onclick="getContactsListNext();" src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/toolBar/naechster.jpg" style="cursor:pointer" 	alt="N&auml;chster"	border="none"
		> <?php } else { ?>
			<img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/toolBar/naechster_inactive.jpg" style="cursor:default" 	alt="N&auml;chster"	border="none"
		> <?php } ?>			
	</td>
	
	
	
	<td align="right" width="100%" nowrap="nowrap" style="background-image: url(http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/toolBar/br.jpg); background-repeat:repeat-x;">       
		<table border="0">
			<tr align="right">
				<td nowrap="nowrap" align="right" valign="top" height="9px" style="margin:0 0 0 0; padding:0 0 0 0; spacing:0 0 0 0;">
					<input type="text" align="right" value="In der Liste: <?php echo $this->escape($this->contacts[0]['recordCount']);?>" style="cursor:default;background-color:#F6F6F6;color:#444444;font-size:9px; margin:0 0 0 0; padding:0 0 0 0; spacing:0 0 0 0; border:0px; width:10em"  readonly="readonly" disabled="disabled">
				</td>
			</tr>
			<tr align="right">
				<td nowrap="nowrap" valign="top" height="9px" style="margin:0 0 0 0; padding:0 0 0 0; spacing:0 0 0 0;">
					<input id="currentPageContactsList" align="right" type="text" style="cursor:default;background-color:#F6F6F6;margin:0 0 0 0; padding:0 0 0 0; spacing:0 0 0 0; border:0px;color:#444444;font-size:9px;width:10em"  readonly="readonly" disabled="disabled">
					<input id="maxPageContactsList" value="<?php echo $this->escape($this->contacts[0]['recordCount']);?>"  type="hidden">
				</td>
			</tr>
		</table>
	</td>
	
  </tr>
</table>

<script>
	function CounterUebertragContacts () {
		document.getElementById('currentPageContactsList').value = 'Seite ' + document.getElementById('contactsListCounter').value + ' von <?php echo $this->escape($this->contacts[0]['pages']);?>';
	}
	window.onload = CounterUebertragContacts();
</script>
