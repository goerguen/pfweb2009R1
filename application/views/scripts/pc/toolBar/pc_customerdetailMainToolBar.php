
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/dojo/1.6/dojo/dojo.xd.js"  djConfig="parseOnLoad: true"></script>
    
<script type="text/javascript">
	dojo.require("dojox.layout.ContentPane");
	dojo.require("dijit.layout.BorderContainer");
	dojo.require("dijit.layout.TabContainer");
	dojo.require("dijit.layout.AccordionContainer");
	dojo.require("dojox.layout.ExpandoPane");

	// dojo MenuBar
	dojo.require("dijit.MenuBar");
	dojo.require("dijit.PopupMenuBarItem");
	dojo.require("dijit.Menu");
	dojo.require("dijit.MenuItem");
	dojo.require("dijit.PopupMenuItem");	
	//dojo.require("dijit.");
</script>

<script type="text/javascript">
	function saveInContentPane<?php echo $this->customer['idNumber'];?>() {
		dijit.byId('customersList<?php echo $this->customer['idNumber'];?>').set('href','document.EditCustomer<?php echo $this->customer['idNumber']; ?>.submit()');
	}	
</script>

<table width="100%" cellpadding="0" cellspacing="0" border="0" height="43px">
  <tr>
    <td width="100%" nowrap="nowrap" style="background-image: url(http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/toolBar/br.jpg); background-repeat:repeat-x;">       
		 <img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/toolBar/vm.jpg"			alt="VM"			border="none"
		><img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/toolBar/info.jpg"		alt="Info"			border="none" 
		><img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/toolBar/vorheriger.jpg"	alt="Vorheriger"	border="none"
		><img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/toolBar/naechster.jpg" 	alt="N&auml;chster"	border="none"
		><img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/toolBar/suchen.jpg" 		alt="Suchen"		border="none"
		><img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/toolBar/suchEditor.jpg"	alt="SuchEditor"	border="none"
		><img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/toolBar/aufgabe.jpg" 	alt="Aufgabe"		border="none"
		><img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/toolBar/drucken.jpg" 	alt="Drucken"		border="none"
		><img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/toolBar/abbrechen.jpg" 	alt="Abbrechen"		border="none"
		><img  	onclick="saveInContentPane<?php echo $this->customer['idNumber'];?>();"
				src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/toolBar/sichern.jpg" 	
				alt="Sichern"
				border="none"
		><img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/toolBar/neuListe.jpg" 	alt="Neu"			border="none"
		><img onclick="window.close();" src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/toolBar/ok.jpg"	alt="OK"	border="none"
		><div style="background-image: url(br.jpg) repeat-x;"></div>
	</td>
  </tr>
</table>