<div dojoType="dojox.layout.ContentPane" region="top" style="padding: 0 0 0 0;overflow: hidden; marigin: 0 0 0 0" executeScripts="true" scriptSeparation="false" >
	<?php 
		include APPLICATION_PATH.'/views/scripts/pc/toolbar/pc_advertisingagencieslistMainToolBar.php'; 
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
</script>


<div id="cpadvertisingagenciesList" layoutAlign="client"  dojoType="dojox.layout.ContentPane" region="top" style="padding: 0 0 0 0; height:90%; overflow-x: hidden; overflow-y: auto;" scriptHasHooks="true" executeScripts="true" scriptSeparation="false" >
	<div class="tabKit" id="tableAdvertisingAgenciesContainer"> 
		<table id="tableAdvertisingagencies" align="left" width="100%" class="sortable resizable; tre-table" >
			<thead >
				<tr bgcolor="#88888">
					<th width="22px" style="overflow:hidden">Nr</th>
				    <th class="sortfirstasc" style="overflow:hidden">Suchname</th>
				    <th style="overflow:hidden">Name1</th>
				    <th width="25px" style="overflow:hidden">Gebiet</th>
				    <th width="25px" style="overflow:hidden">Prio</th>
				    <th width="35px" style="overflow:hidden">PLZ</th>
				    <th style="overflow:hidden">Ort</th>
				    <th class="nosort" style="overflow:hidden">Telefon</th>
				    <th class="nosort" style="overflow:hidden">Bemerkungen</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$nullStr = "";
				
					if ($this->info == '') {
						for ($i=0; $i<count($this->advertisingagencies); $i++) { 
							if ($i<9) {	$nullStr = "0";	} else { $nullStr = ""; }
				?>	
				<tr ondblclick="createContentPane('advertisingagencyList<?php echo $this->advertisingagencies[$i]['idNumber'];?>', '<?php echo Tools::umlautepas($this->advertisingagencies[$i]['keyName']);?>', 'Werbeagenturen', 'tabAdvertisingAgencies', true, '<?php echo $this->url(array('controller'=>'advertisingagencies', 'action'=>'advertisingagenciesdetail', 'id'=>$this->advertisingagencies[$i]['idNumber'], 'kName'=>$this->advertisingagencies[$i]['keyName'], 'advANo'=>$this->advertisingagencies[$i]['advAgeNo']));?>');">
				    <td style="overflow:hidden" nowrap="nowrap"><?php echo $nullStr.($i+1); ?></td>
				    <td style="overflow:hidden" nowrap="nowrap"><?php echo $this->escape($this->advertisingagencies[$i]['keyName']);?></td>
				    <td style="overflow:hidden" nowrap="nowrap"><?php echo $this->escape($this->advertisingagencies[$i]['name1']);?></td>
				    <td style="overflow:hidden" nowrap="nowrap"><?php echo $this->escape($this->advertisingagencies[$i]['area']);?></td>
				    <td style="overflow:hidden" nowrap="nowrap"><?php echo $this->escape($this->advertisingagencies[$i]['priority']);?></td>
				    <td style="overflow:hidden" nowrap="nowrap"><?php echo $this->escape($this->advertisingagencies[$i]['pc']);?></td>
				    <td style="overflow:hidden" nowrap="nowrap"><?php echo $this->escape($this->advertisingagencies[$i]['city']);?></td>
				    <td style="overflow:hidden" nowrap="nowrap"><?php echo $this->escape($this->advertisingagencies[$i]['phone']);?></td>
				    <td style="overflow:hidden" nowrap="nowrap"><?php echo $this->escape($this->advertisingagencies[$i]['eMail']);?></td>
				</tr>				
				<?php } 
					} else { 
				?>
				<tr>
					<td colspan="11"><?php echo $this->info;  ?></td>
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
<script type="text/javascript">
	dojo.addOnLoad(initTableRowEffect);
	dojo.addOnLoad(tableKitInit('tableAdvertisingagencies'));
</script>