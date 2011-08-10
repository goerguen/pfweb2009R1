<div dojoType="dojox.layout.ContentPane" region="top" style="padding: 0 0 0 0;overflow: hidden; marigin: 0 0 0 0" executeScripts="true" scriptSeparation="false" >
	<?php 
		include APPLICATION_PATH.'/views/scripts/pc/toolbar/pc_sectorNamesListMainToolBar.php'; 
	?>
</div>


<style>	
	html body div.tabKit table tbody tr.tre-hover {
		cursor		: pointer;
	    background	: silver;
	}
	
	html body div.tabKit table tbody tr.tre-select {
		cursor		: pointer;
		background	: #888888;
	}
</style>

<script type="text/javascript">

	function tableRowEffectHover() {
	    // is the element already selected?
	    if (this.className.indexOf("tre-select") == -1) {
	        // no? then show the hover effect
	        this.className += " tre-hover";
	    }
	}
	
	function tableRowEffectUnhover() {
		// remove the hover effect
	    this.className = this.className.replace(/\b(tre-hover)\b/, "");
	}
	
	function tableRowEffectSelect()	{
	    // is the element already selected?
	    if (this.className.indexOf("tre-select") != -1) {
	        // then remove the selection (toggle click)
	        this.className = this.className.replace(/\b(tre-select)\b/, "");
	    } else {
	        // othervise show the selection effect
	        // remove the hover effect
	        this.className = this.className.replace(/\b(tre-hover)\b/, "");
	        this.className += " tre-select";
	    }
	}
	
	initTableRowEffect = function()	{
	    var tableObjects = document.getElementsByTagName('TABLE');
	    for (var t = 0; t < tableObjects.length; t++) {
	        // remove the following javascript line to force this effect to all tables
	        if (tableObjects[t].className.indexOf("tre-table") != -1) {
	            var tableRowObjects = tableObjects[t].getElementsByTagName('TR');
	            for (var tr = 0; tr < tableRowObjects.length; tr++) {
	                tableRowObjects[tr].onmouseover = tableRowEffectHover;
	                tableRowObjects[tr].onmouseout  = tableRowEffectUnhover;
	                tableRowObjects[tr].onclick     = tableRowEffectSelect;
	            }
	        // remove the following javascript line to force this effect to all tables
	        }
	    }
	}

	function selectStammAttribut(Art, Name, Link) {
		var tabs = dijit.byId("stamm");
		var pane = new dijit.layout.ContentPane({ 	title: Art + " - " + Name, 
													href: Link,
													closable: true, 
													onClose: function() {
            											return confirm("Wollen sie dieses Fenster wirklich schliessen?");
													}
												});
		tabs.addChild(pane);
		tabs.selectChild(pane);	
	}
	window.onload = initTableRowEffect;
</script>

<div id="cpSectorNamesList" layoutAlign="client"  dojoType="dojox.layout.ContentPane" region="top" style="padding: 0 0 0 0; height:85%; overflow-x: hidden; overflow-y: auto;" scriptHasHooks="true" executeScripts="true" scriptSeparation="false" >
	<div class="tabKit" id="tableContainer"> 
		<table id="tableSectorNames" align="left" width="100%" class="sortable resizable; tre-table" >
			<thead >
				<tr bgcolor="#88888">
				    <th width="25%" class="sortfirstasc">Branche</th>
				    <th width="25%">Oberbegriff</th>
				    <th width="25%">Hauptbegriff</th>
				    <th width="25%">ID</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$nullStr = "";
					if ($this->info == '') {
						for ($i=0; $i<count($this->sectorNames); $i++) { 
							if ($i<9) {	$nullStr = "0";	} else { $nullStr = ""; }
				?>	
				<tr ondblclick="selectStammAttribut('Ändern','Branchen-Name','<?php echo $this->url(array('controller'=>'sectorname', 'action'=>'sectornamedetail', 'id'=>$this->sectorNames[$i]['idNumber']));?>');">
				    <td nowrap="nowrap"><?php echo $this->escape($this->sectorNames[$i]['sectorName']); ?></td>
				    <td nowrap="nowrap"><?php echo $this->escape($this->sectorNames[$i]['genericTerm']); ?></td>
				    <td nowrap="nowrap"><?php echo $this->escape($this->sectorNames[$i]['mainTerm']); ?></td>
				    <td nowrap="nowrap"><?php echo $this->escape($this->sectorNames[$i]['id']); ?></td>
				</tr>				
				<?php } 
					} else { 
				?>
				<tr>
					<td colspan="4"><?php echo $this->info; ?></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<?php  echo $this->headLink()->prependStylesheet($this->baseUrl().'/css/tablekit1.2.2/style.css'); ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/prototype/1.6.0.2/prototype.js"></script>
<script type="text/javascript" src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/js/tablekit1.2.2/tablekit.js"></script>
<script type="text/javascript" src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/js/tablekit1.2.2/fabtabulous.js"></script>
