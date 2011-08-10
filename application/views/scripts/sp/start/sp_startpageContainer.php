<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/dojo/1.6/dojo/dojo.xd.js"  djConfig="parseOnLoad: true"></script>
    
<script type="text/javascript">
	dojo.require("dojox.layout.ContentPane");
	dojo.require("dijit.layout.BorderContainer");
	dojo.require("dijit.layout.TabContainer");
	dojo.require("dijit.layout.AccordionContainer");

	// dojo MenuBar
	dojo.require("dijit.MenuBar");
	dojo.require("dijit.PopupMenuBarItem");
	dojo.require("dijit.Menu");
	dojo.require("dijit.MenuItem");
	dojo.require("dijit.PopupMenuItem");	

	var g_hrefCustomerDetails;
	var g_hrefSectorNamesDetails;
</script>


<div dojoType="dijit.layout.BorderContainer" gutters="true" id="borderContainerTwo" style="height: 100%; ">
 	
 	<div dojoType="dojox.layout.ContentPane" id="menu" region="top" style="height:52px; width:100%; background-color: #FFFFFF; padding: 1px 1px 1px 1px; overflow: hidden" executeScripts="true">
	<?php 
		$this->headTitle($this->title);
		
		include APPLICATION_PATH.'/views/scripts/pc/logOut/pc_logOut.php';
		include APPLICATION_PATH.'/views/scripts/pc/menu/pc_startpageMenu.php'; 
	?> 
 	</div>
 	
	<div dojoType="dijit.layout.AccordionContainer" region="leading" splitter="true" style="width:200px">
        <div 	dojoType="dijit.layout.AccordionPane"
        		style="background-color: #888888; padding: 15px 2px 15px 2px; overflow: auto; spacing: 0; margin: 0;"
        		title="Adressen">
        		
        	<div 	onclick="selectStammAttribut('all','Alle Adressen','addressTab','<?php echo $this->url(array('controller'=>'customer', 'action'=>'customerssearch'));?>');"
	            	style="cursor:pointer">	
	            <center>
	            	<img alt="Alle Adressen"	src="<?php  echo ($this->baseUrl().'/images/vmPcPics/startpage/adressen.gif'); ?>">
	            </center>
	            <center><nobr>Alle Adressen</nobr></center>
	        </div>
            <br>
            
            <input type="hidden" id="customersListCounter" name="customersListCounter" value="1">
            <div 	onclick="createContentPane('customersSearch', 'Suche', 'Kunden', 'tabKunden', false, '<?php echo $this->url(array('controller'=>'customer', 'action'=>'customerssearch'));?>')"
	            	style="cursor:pointer">
	            <center>
	            	<img alt="Kunden" src="<?php  echo ($this->baseUrl().'/images/vmPcPics/startpage/kunden.gif'); ?>">
	            </center>
	            <center><nobr>Kunden</nobr></center>
	        </div>
            <br>
            
            <center>
            	<img alt="Personen"			src="<?php  echo ($this->baseUrl().'/images/vmPcPics/startpage/personen.gif'); ?>">
            </center>
            <center><nobr>Personen</nobr></center>
            <br>
            
            <div 	onclick="selectStammAttribut('advertisingAgencies','Werbeagenturen','addressTab','<?php echo $this->url(array('controller'=>'customer', 'action'=>'customerssearch'));?>');"
	            	style="cursor:pointer">
            	<center>
	            	<img alt="Werbeagenturen" src="<?php  echo ($this->baseUrl().'/images/vmPcPics/startpage/werbeagenturen.gif'); ?>">
	            </center>
	            <center><nobr>Werbeagenturen</nobr></center>
	        </div>
            <br>
            
            <div 	onclick="selectStammAttribut('groups','Konzerne','addressTab','<?php echo $this->url(array('controller'=>'customer', 'action'=>'customerssearch'));?>');"
	            	style="cursor:pointer">
            	<center>
	            	<img alt="Konzerne" src="<?php  echo ($this->baseUrl().'/images/vmPcPics/startpage/konzerne.gif'); ?>">
	            </center>
	            <center><nobr>Konzerne</nobr></center>
	        </div>
            <br>
            
            <center>
            	<img alt="Adresspool"			src="<?php  echo ($this->baseUrl().'/images/vmPcPics/startpage/adresspool.gif'); ?>">
            </center>
            <center><nobr>Adresspool</nobr></center>
            <br>
            
            <div 	onclick="selectStammAttribut('companies','Firmen','addressTab','<?php echo $this->url(array('controller'=>'customer', 'action'=>'customerssearch'));?>');"
	            	style="cursor:pointer">	
	            <center>
	            	<img alt="Firmen"	src="<?php  echo ($this->baseUrl().'/images/vmPcPics/startpage/firmen.gif'); ?>">
	            </center>
	            <center><nobr>Firmen</nobr></center>
	        </div>
        </div>
        
        <div 	dojoType="dijit.layout.AccordionPane" 
        		title="Korrespondenz"
        		style="background-color: #F6F6F6; padding: 15px; overflow: auto; spacing: 0; margin: 0;">
        	
        	<div 	onclick="selectStammAttribut('memo','Memo','addressTab','<?php echo $this->url(array('controller'=>'salesreport','action'=>'salesreportsearch')); ?>');"
	            	style="cursor:pointer">
            	<center>
	            	<img alt="Memo" src="<?php  echo ($this->baseUrl().'/images/vmPcPics/startpage/memo.gif'); ?>">
	            </center>
	            <center><nobr>Memo</nobr></center>
	        </div>
            <br>
            
            <div 	onclick="selectStammAttribut('briefe','Briefe','addressTab','<?php echo $this->url(array('controller'=>'salesreport','action'=>'salesreportsearch')); ?>');"
	            	style="cursor:pointer">
            	<center>
	            	<img alt="Briefe" src="<?php  echo ($this->baseUrl().'/images/vmPcPics/startpage/briefe.gif'); ?>">
	            </center>
	            <center><nobr>Briefe</nobr></center>
	        </div>
            <br>
        
        	<input type="hidden" id="salesReportsListCounter" name="salesReportsListCounter" value="1">
            <div 	onclick="createContentPane('salesReportsSearch', 'Suche', 'Kontaktberichte', 'tabKontaktberichte', false, '<?php echo $this->url(array('controller'=>'salesreport','action'=>'salesreportsearch')); ?>')"
	            	style="cursor:pointer">
            	<center>
	            	<img alt="Kontaktberichte" src="<?php  echo ($this->baseUrl().'/images/vmPcPics/startpage/kontaktberichte.gif'); ?>">
	            </center>
	            <center><nobr>Kontaktberichte</nobr></center>
	        </div>
            <br>
            
            <div 	onclick="selectStammAttribut('serienbriefe','Serienbriefe','addressTab','<?php echo $this->url(array('controller'=>'salesreport','action'=>'salesreportsearch')); ?>');"
	            	style="cursor:pointer">
            	<center>
	            	<img alt="Serienbriefe" src="<?php  echo ($this->baseUrl().'/images/vmPcPics/startpage/serienbriefe.gif'); ?>">
	            </center>
	            <center><nobr>Serienbriefe</nobr></center>
	        </div>
            
        </div>
        
        <div 	dojoType="dijit.layout.AccordionPane" 
        		title="Marketing"
        		style="background-color: #F6F6F6; padding: 15px; overflow: auto; spacing: 0; margin: 0;">
        	
        	<div 	onclick="selectStammAttribut('objektinteresse','Objektinteresse','addressTab','<?php echo $this->url(array('controller'=>'salesreport','action'=>'salesreportsearch')); ?>');"
	            	style="cursor:pointer">
            	<center>
	            	<img alt="Objektinteresse" src="<?php  echo ($this->baseUrl().'/images/vmPcPics/startpage/objektinteresse.gif'); ?>">
	            </center>
	            <center><nobr>Objektinteresse</nobr></center>
	        </div>
            <br>	
        		
            <div 	onclick="selectStammAttribut('merkmale','Merkmale','addressTab','<?php echo $this->url(array('controller'=>'salesreport','action'=>'salesreportsearch')); ?>');"
	            	style="cursor:pointer">
            	<center>
	            	<img alt="Merkmale" src="<?php  echo ($this->baseUrl().'/images/vmPcPics/startpage/merkmale.gif'); ?>">
	            </center>
	            <center><nobr>Merkmale</nobr></center>
	        </div>
            <br>
            
            <div 	onclick="selectStammAttribut('branchen','Branchen','addressTab','<?php echo $this->url(array('controller'=>'salesreport','action'=>'salesreportsearch')); ?>');"
	            	style="cursor:pointer">
            	<center>
	            	<img alt="Branchen" src="<?php  echo ($this->baseUrl().'/images/vmPcPics/startpage/branchen.gif'); ?>">
	            </center>
	            <center><nobr>Branchen</nobr></center>
	        </div>
            <br>
            
            <div 	onclick="selectStammAttribut('produkte','Produkte','addressTab','<?php echo $this->url(array('controller'=>'salesreport','action'=>'salesreportsearch')); ?>');"
	            	style="cursor:pointer">
            	<center>
	            	<img alt="Produkte" src="<?php  echo ($this->baseUrl().'/images/vmPcPics/startpage/produkte.gif'); ?>">
	            </center>
	            <center><nobr>Produkte</nobr></center>
	        </div>
            <br>
            
            <div 	onclick="selectStammAttribut('motive','Motive','addressTab','<?php echo $this->url(array('controller'=>'salesreport','action'=>'salesreportsearch')); ?>');"
	            	style="cursor:pointer">
            	<center>
	            	<img alt="Motive" src="<?php  echo ($this->baseUrl().'/images/vmPcPics/startpage/motive.gif'); ?>">
	            </center>
	            <center><nobr>Motive</nobr></center>
	        </div>
            <br>
            
            <div 	onclick="selectStammAttribut('freieinweisungen','Freieinweisungen','addressTab','<?php echo $this->url(array('controller'=>'salesreport','action'=>'salesreportsearch')); ?>');"
	            	style="cursor:pointer">
            	<center>
	            	<img alt="Freieinweisungen" src="<?php  echo ($this->baseUrl().'/images/vmPcPics/startpage/freieinweisungen.gif'); ?>">
	            </center>
	            <center><nobr>Freieinweisungen</nobr></center>
	        </div>
            <br>
            
            <div 	onclick="selectStammAttribut('fibuAdressen','Fibu-Adressen','addressTab','<?php echo $this->url(array('controller'=>'salesreport','action'=>'salesreportsearch')); ?>');"
	            	style="cursor:pointer">
            	<center>
	            	<img alt="Fibu-Adressen" src="<?php  echo ($this->baseUrl().'/images/vmPcPics/startpage/fibuAdressen.gif'); ?>">
	            </center>
	            <center><nobr>Fibu-Adressen</nobr></center>
	        </div>
            <br>
            
            <div 	onclick="selectStammAttribut('konkurrenzDaten','Konkurrenz-Daten','addressTab','<?php echo $this->url(array('controller'=>'salesreport','action'=>'salesreportsearch')); ?>');"
	            	style="cursor:pointer">
            	<center>
	            	<img alt="Konkurrenz-Daten" src="<?php  echo ($this->baseUrl().'/images/vmPcPics/startpage/konkurrenzDaten.gif'); ?>">
	            </center>
	            <center><nobr>Konkurrenz-Daten</nobr></center>
	        </div>
	        <br>
	        
	        <div 	onclick="selectStammAttribut('redaktionelleErwaehnung','Redaktionelle-Erw&auml;hnung','addressTab','<?php echo $this->url(array('controller'=>'salesreport','action'=>'salesreportsearch')); ?>');"
	            	style="cursor:pointer">
            	<center>
	            	<img alt="Redaktionelle-Erw&auml;hnung" src="<?php  echo ($this->baseUrl().'/images/vmPcPics/startpage/redaktionelleErwaehnung.gif'); ?>">
	            </center>
	            <center><nobr>Redaktionelle-Erw&auml;hnung</nobr></center>
	        </div>
            
        </div>
        <div dojoType="dijit.layout.AccordionPane" title="Einstellungen">
            accordion pane #4
        </div>
    </div>
     
	<div dojoType="dijit.layout.TabContainer" id="startTab" region="center" splitter="true" style="background-color: #888888; padding: 10px 10px 10px 10px; overflow: hidden">
		
		<div dojoType="dojox.layout.ContentPane" id="startpage" style="background-color: #F6F6F6; padding: 0;" title="Startseite">
			<?php include APPLICATION_PATH.'/views/scripts/pc/toolbar/pc_startpageAllMainToolBar.php'; ?>
			<div style="padding:150px;" align="center" >
				<img alt="VM-WEB" src="<?php  echo ($this->baseUrl().'/images/vmPcPics/startpage/vmweb-logo.gif'); ?>">				
			</div>
		</div>
	
		
		<div dojoType="dojox.layout.ContentPane" id="marketingPane" region="top" title="Marketing" style="background-color: #FFFFFF; padding: 0px 0px 0px 0px; overflow: hidden" executeScripts="true">
			<div dojoType="dijit.layout.TabContainer" id="marketing" nested="true" executeScripts="true">
				 <div dojoType="dojox.layout.ContentPane" id="objektinteresse" title="Objektinteresse" executeScripts="true">
		            Lorem ipsum and all around...Objektinteresse
		        </div>
		        <div dojoType="dojox.layout.ContentPane" id="merkmale2" title="Merkmale" executeScripts="true">
		            Lorem ipsum and all around - Merkmale...
		        </div>
		        <div dojoType="dojox.layout.ContentPane" id="branchen" title="Branchen" executeScripts="true">
		            Lorem ipsum and all around - Branchen...
		        </div>
		        <div dojoType="dojox.layout.ContentPane" id="produkte" title="Produkte" executeScripts="true">
		            Lorem ipsum and all around - Produkte...
		        </div>
		        <div dojoType="dojox.layout.ContentPane" id="motive" title="Motive" executeScripts="true">
		            Lorem ipsum and all around - Motive...
		        </div>
		        <div dojoType="dojox.layout.ContentPane" id="freieinweisungen" title="Freieinweisungen" executeScripts="true">
		            Lorem ipsum and all around - Freieinweisungen...
		        </div>
		        <div dojoType="dojox.layout.ContentPane" title="(Fibu-Adressen)" executeScripts="true">
		            Lorem ipsum and all around - (Fibu-Adressen)...
		        </div>
		        <div dojoType="dojox.layout.ContentPane" title="(Konkurrenz-Daten)" executeScripts="true">
		            Lorem ipsum and all around - (Konkurrenz-Daten)...
		        </div>
		        <div dojoType="dojox.layout.ContentPane" title="(Redaktionelle-Erw&auml;hnung)" executeScripts="true">
		            Lorem ipsum and all around - (Redaktionelle-Erw&auml;hnung)...
		        </div>
			</div>
		</div>
		<div dojoType="dojox.layout.ContentPane" id="stammPane" region="top" title="VM-A Stamm" style="background-color: #FFFFFF; padding: 0px 0px 0px 0px; overflow: hidden" executeScripts="true">
			<div dojoType="dijit.layout.TabContainer" id="stamm" nested="true" executeScripts="true">
				<div dojoType="dojox.layout.ContentPane" id="positionsNamen" title="Positionsnamen" executeScripts="true">
		            Lorem ipsum and all around - Positionsnamen...
		        </div>
				<div dojoType="dojox.layout.ContentPane" id="objekte" title="Objekte" executeScripts="true">
		            Lorem ipsum and all around - Objekte...
		        </div>
		        <input id="sectorNamesListCounter" name="customersListCounter" type="hidden" value="1" size="2" maxlength="2">
				<div 	dojoType="dojox.layout.ContentPane" 
						id="branchennamen" 
						style="background-color: #F6F6F6; padding: 0; overflow: auto; spacing: 0; margin: 0;" 
						title="Branchen-Namen" 
						executeScripts="true" 
						scriptHasHooks="true" 
						scriptSeparation="false" 
						onDownloadEnd="initTableRowEffect();tableKitInit('tableSectorNames');">
						<?php echo $this->action('sectornamessearch','sectorname'); ?>				
				</div>
		        <div dojoType="dojox.layout.ContentPane" id="agenturArten" title="Agenturarten" executeScripts="true">
		            Lorem ipsum and all around - Agenturarten...
		        </div>
		    </div>		
		</div>   
	</div>

</div>

<script type="text/javascript">

	//----------------------------------------------------------------------------------------------
	//--------------------   Kunden ----------------------------------------------------------------
	//----------------------------------------------------------------------------------------------
	function getAllCustomersList() {
		document.getElementById('customersListCounter').value = 1;
		var pane = dijit.byId("customersSearch");  //Name muss identsich mit der ID des ContentPane Tabs sein!
		g_hrefCustomerDetails = "<?php echo $this->url(array('controller'=>'customer', 'action'=>'customerslist'));?>" + "/keyName/@";
		pane.attr("href", g_hrefCustomerDetails + "/page/1/requestNew/true");
	}

	function getCustomersList() {
		document.getElementById('customersListCounter').value = 1;
		var pane = dijit.byId("customersSearch");
		g_hrefCustomerDetails = "<?php echo $this->url(array('controller'=>'customer', 'action'=>'customerslist'));?>"
																+ "/keyName/" + document.getElementById('keyName').value 
																+ "/area/" + document.getElementById('area').value
																+ "/priority/" + document.getElementById('priority').value
																+ "/pc/" + document.getElementById('pc').value
																+ "/city/" + document.getElementById('city').value;
		pane.attr("href", g_hrefCustomerDetails + "/page/1/requestNew/true");
	}	
	
	function getCustomersListBefore() {
		if (parseInt(document.getElementById('customersListCounter').value) > 1) {
			document.getElementById('customersListCounter').value = parseInt(document.getElementById('customersListCounter').value) - 1;
			var pane = dijit.byId("customersSearch");
			pane.attr("href", g_hrefCustomerDetails + "/page/" + document.getElementById('customersListCounter').value + "/requestNew/false");
		}
	}
	
	function getCustomersListNext() {
		if (parseInt(document.getElementById('maxPageCustomersList').value) > parseInt(document.getElementById('customersListCounter').value)) {
			document.getElementById('customersListCounter').value = parseInt(document.getElementById('customersListCounter').value) + 1;
			var pane = dijit.byId("customersSearch");
			pane.attr("href", g_hrefCustomerDetails + "/page/" + document.getElementById('customersListCounter').value + "/requestNew/false");
		}
	}

	function searchCustomers() {
		document.getElementById('customersListCounter').value = 1;
		var pane = dijit.byId("customersSearch");		
		pane.attr("href", "<?php echo $this->url(array('controller'=>'customer', 'action'=>'customerssearch'));?>");
	}


	//----------------------------------------------------------------------------------------------
	//--------------------   Kontaktberichte  ------------------------------------------------------
	//----------------------------------------------------------------------------------------------
	function getAllSalesReportsList() {
		document.getElementById('salesReportsListCounter').value = 1;
		var pane = dijit.byId("salesReportsSearch");
		g_hrefSalesReportsDetails = "<?php echo $this->url(array('controller'=>'salesreport', 'action'=>'salesreportslist'));?>" + "/initials/@";
		pane.attr("href", g_hrefSalesReportsDetails + "/page/1/newReq/true");
	}

	function getSalesReportsListBefore() {
		if (parseInt(document.getElementById('salesReportsListCounter').value) > 1) {
			document.getElementById('salesReportsListCounter').value = parseInt(document.getElementById('salesReportsListCounter').value) - 1;
			var pane = dijit.byId("salesReportsSearch");
			pane.attr("href", g_hrefSalesReportsDetails + "/page/" + document.getElementById('salesReportsListCounter').value + "/requestNew/false");
		}
	}
	
	function getSalesReportsListNext() {
		if (parseInt(document.getElementById('maxPageSalesReportsList').value) > parseInt(document.getElementById('salesReportsListCounter').value)) {
			document.getElementById('salesReportsListCounter').value = parseInt(document.getElementById('salesReportsListCounter').value) + 1;
			var pane = dijit.byId("salesReportsSearch");
			pane.attr("href", g_hrefSalesReportsDetails + "/page/" + document.getElementById('salesReportsListCounter').value + "/requestNew/false");
		}
	}

	function searchSalesReports() {
		document.getElementById('salesReportsListCounter').value = 1;
		var pane = dijit.byId("salesReportsSearch");		
		pane.attr("href", "<?php echo $this->url(array('controller'=>'salesreport', 'action'=>'salesreportsearch'));?>");
	}	
	
	//----------------------------------------------------------------------------------------------
	//--------------------   BRANCHEN - NAMEN ------------------------------------------------------
	//----------------------------------------------------------------------------------------------
	function getAllSectorNamesList() {
		document.getElementById('sectorNamesListCounter').value = 1;
		var pane = dijit.byId("branchennamen");
		g_hrefSectorNamesDetails = "<?php echo $this->url(array('controller'=>'sectorname', 'action'=>'sectornameslist'));?>" + "/sectorName/@";
		pane.attr("href", g_hrefSectorNamesDetails + "/page/1/newReq/true");
	}
	
	function getSectorNamesList() {
		document.getElementById('sectorNamesListCounter').value = 1;
		var pane = dijit.byId("branchennamen");
		g_hrefSectorNamesDetails = "<?php echo $this->url(array('controller'=>'sectorname', 'action'=>'sectornameslist'));?>"
																+ "/genericTerm/" + document.getElementById('genericTerm').value 
																+ "/sectorName/" + document.getElementById('sectorName').value 
																+ "/id/" + document.getElementById('id').value
																+ "/mainTerm/" + document.getElementById('mainTerm').value;
		pane.attr("href", g_hrefSectorNamesDetails + "/page/1/newReq/true");
	}

	function getSectorNamesListBefore() {
		if (parseInt(document.getElementById('sectorNamesListCounter').value) > 1) {
			document.getElementById('sectorNamesListCounter').value = parseInt(document.getElementById('sectorNamesListCounter').value) - 1;
			var pane = dijit.byId("branchennamen");
			pane.attr("href", g_hrefSectorNamesDetails + "/page/" + document.getElementById('sectorNamesListCounter').value + "/newReq/false");
		}
	}

	function getSectorNamesListNext() {
		if (parseInt(document.getElementById('maxPageSectorNamesList').value) > parseInt(document.getElementById('sectorNamesListCounter').value)) {
			document.getElementById('sectorNamesListCounter').value = parseInt(document.getElementById('sectorNamesListCounter').value) + 1;
			var pane = dijit.byId("branchennamen");
			pane.attr("href", g_hrefSectorNamesDetails + "/page/" + document.getElementById('sectorNamesListCounter').value + "/newReq/false");
		}
	}

	function searchSectorNames() {
		document.getElementById('sectorNamesListCounter').value = 1;
		var pane = dijit.byId("branchennamen");		
		pane.attr("href", "<?php echo $this->url(array('controller'=>'sectorname', 'action'=>'sectornamessearch'));?>");
	}
	
</script>

<?php  echo $this->headLink()->prependStylesheet($this->baseUrl().'/css/tablekit1.2.2/style.css'); ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/prototype/1.6.0.2/prototype.js"></script>
<script type="text/javascript" src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/js/tablekit1.2.2/tablekit.js"></script>
<script type="text/javascript" src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/js/tablekit1.2.2/fabtabulous.js"></script>

<script type="text/javascript">
	function tableKitInit (table) {
		TableKit.load();
		TableKit.Sortable.init(table, {});
		TableKit.Resizable.init(table, {});
		TableKit.Sortable.reload(); 
	}
</script>