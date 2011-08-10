<script type="text/javascript">

function createContentPane(id, name, mainContentPaneID, tabContainerID,  closable, Link) {
		var tcMain	= dijit.byId('startTab');

		
		if (!dijit.byId(tabContainerID)) {				
			var tcSub = new dijit.layout.TabContainer({
				id						: tabContainerID,
				title					: tabContainerID,
				nested					: true,
				executeScripts			: true
		    },	mainContentPaneID);
		} else {
			var tcSub = dijit.byId(tabContainerID);
		}

		if (!dijit.byId(mainContentPaneID)) {
			var cpMain = new dojox.layout.ContentPane({ 	
				id					: mainContentPaneID,
				title				: mainContentPaneID,
				content				: tcSub,
				region				: "top",
				style				: "background-color: #FFFFFF; padding: 0px 0px 0px 0px; overflow: hidden",
				closable			: true,
				executeScripts		: true
			});
			tcMain.addChild(cpMain);
		} else {
			var cpMain = dijit.byId(mainContentPaneID);
		}

		if (!dijit.byId(id)) {	
			var cpSub = new dojox.layout.ContentPane({ 	
				id					: id,
				title				: name,
				href				: Link,
				style				: "background-color: #F6F6F6; padding: 0; overflow: hidden; spacing: 0; margin: 0;",
				closable			: closable,
				executeScripts		: true,
				scriptHasHooks		: true,
				scriptSeparation	: false,
				loadingMessage		: "",
				onDownloadEnd		: function() {
					hideWaitDialog();
					//initTableRowEffect(); tableKitInit('tableCustomer');
				}
			});
			tcSub.addChild(cpSub);
		}
		tcMain.selectChild(mainContentPaneID);
		tcSub.selectChild(id);
	}
	
	function createNestedTabContainer(id, contentPaneID) {
		var tc = new dijit.layout.TabContainer({
			id						: id,
			title					: id,
			nested					: true,
			executeScripts			: true
	    },	contentPaneID);
	}
</script>

<div dojoType="dijit.MenuBar" id="navMenu" style="padding-left: 5px;">

	<div dojoType="dijit.PopupMenuBarItem">
		<span>	Datei	</span>
		<div dojoType="dijit.Menu" id="fileMenu">
			<div dojoType="dijit.MenuItem" onClick="alert('file 1')">
				Allgemeine Einstellungen
			</div>
			<div dojoType="dijit.MenuItem" onClick="alert('file 2')">
				Aufgaben
			</div>
			<div dojoType="dijit.MenuItem" onClick="selectAll();">
				Alle Adressen
			</div>
			<div dojoType="dijit.MenuItem" onClick="alert('file 4')">
				Logout
			</div>
		</div>
	</div>
	
	<div dojoType="dijit.PopupMenuBarItem">
		<span>Bearbeiten</span>
		<div dojoType="dijit.Menu" id="editMenu">
			<div dojoType="dijit.MenuItem" onClick="alert('edit 1')">
				Edit #1
			</div>
			<div dojoType="dijit.MenuItem" onClick="alert('edit 2')">
				Edit #2
			</div>
		</div>
	</div>
	
	<div dojoType="dijit.PopupMenuBarItem">
		<span>Kunden</span>
		<div dojoType="dijit.Menu" id="customerMenu">
			<div dojoType="dijit.MenuItem" onClick="selectStammAttribut('customers','Kunden','addressTab','<?php echo $this->url(array('controller'=>'customer', 'action'=>'customerssearch'));?>');">
				Kunden
			</div>
			<div dojoType="dijit.MenuItem" onClick="selectAdvertisingAgencies();">
				Werbeagenturen
			</div>
			<div dojoType="dijit.MenuItem" onClick="selectBranchen();">
				Branchen
			</div>
			<div dojoType="dijit.MenuItem" onClick="selectProdukte();">
				Produkte
			</div>
			<div dojoType="dijit.MenuItem" onClick="selectMotive();">
				Motive
			</div>
			<div dojoType="dijit.MenuItem" onClick="selectObjektinteresse();">
				Objektinteresse
			</div>
			<div dojoType="dijit.MenuItem" onClick="selectGroups();">
				Konzerne
			</div>
			<div dojoType="dijit.MenuItem" onClick="selectCompanies();">
				Firmen
			</div>
			<div dojoType="dijit.MenuItem" onClick="selectAddressPool();">
				Adresspool
			</div>
			<div dojoType="dijit.MenuItem" onClick="selectMerkmale();">
				Merkmale
			</div>
			<div dojoType="dijit.MenuItem" onClick="alert('customer 9')">
				Verteiler
			</div>
		</div>
	</div>
	
	<div dojoType="dijit.PopupMenuBarItem">
		<span>Personen</span>
		<div dojoType="dijit.Menu" id="contactsMenu">
			<div dojoType="dijit.MenuItem" onClick="selectContacts();">
				Personen
			</div>
			<div dojoType="dijit.MenuItem" onClick="selectFreieinweisungen();">
				Freieinweisungen
			</div>
		</div>
	</div>
	
	<div dojoType="dijit.PopupMenuBarItem">
		<span>Korrespondenz</span>
		<div dojoType="dijit.Menu" id="correspondenceMenu">
			<div dojoType="dijit.MenuItem" onClick="alert('correspondence 1')">
				Memos
			</div>
			<div dojoType="dijit.MenuItem" onClick="alert('correspondence 2')">
				Briefe
			</div>
			<div dojoType="dijit.MenuItem" onClick="alert('correspondence 3')">
				Kontaktberichte
			</div>
			<div dojoType="dijit.MenuItem" onClick="alert('correspondence 4')">
				Serienbriefe
			</div>
		</div>
	</div>
	
	<div dojoType="dijit.PopupMenuBarItem">
	<span>Stamm</span>
		<div dojoType="dijit.Menu" id="stammMenu">
			<div dojoType="dijit.MenuItem" onClick="selectPositionsnamen()">
				Positionsnamen
			</div>
			<div dojoType="dijit.MenuItem" onClick="selectObjekte()">
				Objekte
			</div>
			<div dojoType="dijit.MenuItem" onClick="selectBranchennamen()">
				Branchennamen
			</div>
			<div dojoType="dijit.MenuItem" onClick="selectAgenturarten()">
				Agenturarten
			</div>
		</div>
	</div>
	
	<div dojoType="dijit.PopupMenuBarItem">
		<span>Hilfe</span>
		<div dojoType="dijit.Menu" id="helpMenu">
			<div dojoType="dijit.MenuItem" onClick="alert('help 1')">
				Hilfe
			</div>
		</div>
	</div>
</div>