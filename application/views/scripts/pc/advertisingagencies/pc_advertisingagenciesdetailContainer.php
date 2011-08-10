<?php 
	$this->headTitle($this->title);
?>
   
<script type="text/javascript">
	dojo.require("dojox.layout.ContentPane");
	dojo.require("dijit.layout.BorderContainer");
	dojo.require("dijit.layout.TabContainer");
	dojo.require("dijit.Editor");
	dojo.require("dijit._editor.plugins.FullScreen");
	dojo.require("dojo.parser");

	// dojo tree-Darstellung
	dojo.require("dojo.data.ItemFileReadStore");
	dojo.require("dojo.parser");
	dojo.require("dojox.data.HtmlStore");
	dojo.require("dijit.Tree");

	// dojo MenuBar
	dojo.require("dijit.MenuBar");
	dojo.require("dijit.PopupMenuBarItem");
	dojo.require("dijit.Menu");
	dojo.require("dijit.MenuItem");
	dojo.require("dijit.PopupMenuItem");
</script>

<div dojoType="dijit.layout.BorderContainer" gutters="true" id="<?php echo $this->advertisingagencies['idNumber']; ?>advAgenciesBorderContainerTwo" style="height: 100%;" > 

	<div dojoType="dojox.layout.ContentPane" region="top" style="padding: 0 0 0 0; height: 43px; overflow: hidden" >
		<?php include APPLICATION_PATH.'/views/scripts/pc/toolbar/pc_advertisingagenciesdetailMainToolBar.php'; ?>
	</div>

	<div dojoType="dijit.layout.TabContainer" id="<?php echo $this->advertisingagencies['idNumber']; ?>advAgenciesLeftTab" region="center" splitter="true" style="background-color: #888888; padding: 10px 5px 10px 10px;">
		<div 	id="<?php echo $this->advertingagencies['idNumber']; ?>contentAdvAgenciesHM" 
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
			<?php include APPLICATION_PATH.'/views/scripts/pc/advertisingagencies/pc_advertisingagenciesHauptmaske.php'; ?>			
		</div>
		<div 	id="<?php echo $this->advertisingagencies['idNumber']; ?>contentAdvertisingAgenciesEdit" 
				dojoType="dojox.layout.ContentPane" 
				style="background-color: #F6F6F6; padding: 0; overflow: auto; spacing: 0; margin: 0;" 
				title="&Auml;ndern" <?php if (($this->formAdvertisingAgenciesEdit->getValue('idNumber'))<=0) { echo "selected='selected'"; } ?> >
					<?php include APPLICATION_PATH.'/views/scripts/pc/advertisingagencies/pc_advertisingagenciesEdit.php'; ?>
		</div>
	</div>

	<div dojoType="dijit.layout.TabContainer" id="<?php echo $this->advertisingagencies['idNumber']; ?>advagenciesRightTab" region="trailing" style="width: 40%; background-color: #888888; padding: 10px 10px 10px 5px; overflow: hidden" splitter="true">
		<div dojoType="dojox.layout.ContentPane" region="top" style="background-color: #F6F6F6;" title="Info-Fenster" 
		scriptSeparation="true"
		refreshOnShow="false"
		preventCache="true">
			<?php include APPLICATION_PATH.'/views/scripts/pc/toolbar/pc_advertisingagenciesdetailInfoFensterToolBar.php'; ?>
			<?php include APPLICATION_PATH.'/views/scripts/pc/infoFenster/pc_infoFenster.php'; ?>
		</div>
	</div>         	                                 
</div>

<script type="text/javascript">
	function  customerNew() {
		if(parseInt(document.getElementById('idNumber').value <= 0)) {
			var tabs = dijit.byId("customerAdvAgenciesTab");
			var pane = dijit.byId("contentAdvAgenciesEdit");
			tabs.selectChild(pane);
		}
	}
</script>