<?php 
	$this->headTitle($this->title);
	
	include APPLICATION_PATH.'/views/scripts/pc/logOut/pc_logOut.php';
	include APPLICATION_PATH.'/views/scripts/pc/menu/pc_customerdetailMenu.php'; 
?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/dojo/1.6/dojo/dojo.xd.js"  djConfig="parseOnLoad: true"></script>
    
<script type="text/javascript">
	dojo.require("dojox.layout.ContentPane");
	dojo.require("dijit.layout.BorderContainer");
	dojo.require("dijit.layout.TabContainer");

	// dojo MenuBar
	dojo.require("dijit.MenuBar");
	dojo.require("dijit.PopupMenuBarItem");
	dojo.require("dijit.Menu");
	dojo.require("dijit.MenuItem");
	dojo.require("dijit.PopupMenuItem");

    dojo.require("dojo.data.ItemFileReadStore");
    dojo.require("dijit.Tree");
    var profilesData = <?php echo $this->profileNamesArrayJson; ?>;
</script>

	<div dojoType="dojox.layout.ContentPane" region="top" style="padding: 0 0 0 0; height: 43px; overflow: hidden" >
		<?php include APPLICATION_PATH.'/views/scripts/pc/toolbar/pc_customerdetailMainToolBar.php'; ?>
	</div>

	<div dojoType="dijit.layout.TabContainer" id="leftTab" region="center" style="height: 80%; background-color: #888888; padding: 7px 7px 14px 14px;">
		<div 	id="contentSalesReportHM" 
				dojoType="dojox.layout.ContentPane" 
				style="background-color: #F6F6F6; padding: 0; spacing: 0; margin: 0;" 
				title="Hauptmaske">
					<table>
					  <?php if (empty($this->Meldung)) {?>
						<tr></tr>
					  <?php } else { ?>
						  <tr >
						    <td style="font-family:Verdana,sans-serif; font-size:14px; color:#FF0000" bordercolor="#FF0000" bgcolor="#FFCCCC">
						    	<?php  echo $this->Meldung; ?>
							</td>
						  </tr>
					  <?php } ?>
					 </table>
			<?php 	if ($this->formSalesReport->getElement('layoutView')->getValue()=='IN_KLICK') {
						include APPLICATION_PATH.'/views/scripts/pc/salesreport/pc_salesreportHauptmaskeMerkmale.php';
					} 	else {	 
						include APPLICATION_PATH.'/views/scripts/pc/salesreport/pc_salesreportHauptmaske.php'; 
					}
			?>			
		</div>
		<div 	id="contentSalesReportAddress" 
				dojoType="dojox.layout.ContentPane" 
				style="background-color: #F6F6F6; padding: 0; overflow: auto; spacing: 0; margin: 0;" 
				title="Adressen">
			<?php include APPLICATION_PATH.'/views/scripts/pc/salesreport/pc_salesreportAdressen.php'; ?>	
		</div>
		<div 	id="contentSalesReportEditor" 
				dojoType="dojox.layout.ContentPane" 
				style="background-color: #F6F6F6; padding: 0; overflow: auto; spacing: 0; margin: 0;" 
				title="Textverarbeitung">
			<?php include APPLICATION_PATH.'/views/scripts/pc/salesreport/pc_salesreportEditor.php'; ?>
		</div>
		<?php 	if ($this->formSalesReport->getElement('layoutView')->getValue()=='IN_KLICK') { ?>
					<div 	id="contentSalesReportMerkmaleZuweisen" 
							dojoType="dojox.layout.ContentPane" 
							style="background-color: #F6F6F6; padding: 0; overflow: auto; spacing: 0; margin: 0;" 
							title="Merkmale zuweisen">
						<?php include APPLICATION_PATH.'/views/scripts/pc/salesreport/pc_salesreportMerkmaleZuweisen.php'; ?>
					</div>
		<?php } ?>
	</div>


<script type="text/javascript">
	function  customerNew() {
		if(parseInt(document.getElementById('idNumber').value <= 0)) {
			var tabs = dijit.byId("leftTab");
			var pane = dijit.byId("contentCustomerEdit");
			tabs.selectChild(pane);
		}
	}
</script>