<div dojoType="dojox.layout.ContentPane" region="top" style="padding: 0 0 0 0;overflow: hidden; marigin: 0 0 0 0" executeScripts="true" scriptSeparation="false" >
	<?php 
		include APPLICATION_PATH.'/views/scripts/pc/toolbar/pc_contactslistMainToolBar.php'; 
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


<div id="cpContactsList" layoutAlign="client"  dojoType="dojox.layout.ContentPane" region="top" style="padding: 0 0 0 0; height:90%; overflow-x: hidden; overflow-y: auto;" scriptHasHooks="true" executeScripts="true" scriptSeparation="false" >
	<div class="tabKit" id="tableContactsContainer"> 
		<table id="tableContact" align="left" width="100%" class="sortable resizable; tre-table" >
			<thead >
				<tr bgcolor="#88888">
					<th width="22px" style="overflow:hidden">Nr</th>
					
					
				    <th class="sortfirstasc" style="overflow:hidden">Nachname</th>
				    <th style="overflow:hidden">Vorname</th>
				    
				    <th width="35px" style="overflow:hidden">Title</th>
				    <th style="overflow:hidden">Fa</th>
				    <th width="40px" style="overflow:hidden">Fa.Typ</th>
				    <th style="overflow:hidden">Fax</th>
				    <th class="nosort" style="overflow:hidden">Kommentare</th>
				    <th class="nosort" style="overflow:hidden">EMail</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$nullStr = "";
				
					if ($this->info == '') {
						for ($i=0; $i<count($this->contacts); $i++) { 
							if ($i<9) {	$nullStr = "0";	} else { $nullStr = ""; }
				?>	
				<tr ondblclick="createContentPane('contactsList<?php echo $this->contacts[$i]['idNumber'];?>', '<?php echo Tools::umlautepas($this->contacts[$i]['keyName']);?>', 'Personen', 'tabContacts', true, '<?php echo $this->url(array('controller'=>'contact', 'action'=>'contactsdetail', 'id'=>$this->contacts[$i]['idNumber'], 'kName'=>$this->contacts[$i]['keyName'], 'advANo'=>$this->contacts[$i]['advAgeNo']));?>');">
				    <td style="overflow:hidden" nowrap="nowrap"><?php echo $nullStr.($i+1); ?></td>
				   
				    <td style="overflow:hidden" nowrap="nowrap"><?php echo $this->escape($this->contacts[$i]['lastName']);?></td>
				    <td style="overflow:hidden" nowrap="nowrap"><?php echo $this->escape($this->contacts[$i]['firstName']);?></td>
				    
				    <td style="overflow:hidden" nowrap="nowrap"><?php echo $this->escape($this->contacts[$i]['jobTitle']);?></td>
				    <td style="overflow:hidden" nowrap="nowrap"><?php echo $this->escape($this->contacts[$i]['inCompany']);?></td>
				    <td style="overflow:hidden" nowrap="nowrap"><?php echo $this->escape($this->contacts[$i]['companyType']);?></td>
				    <td style="overflow:hidden" nowrap="nowrap"><?php echo $this->escape($this->contacts[$i]['fax']);?></td>
				    <td style="overflow:hidden" nowrap="nowrap"><?php echo $this->escape($this->contacts[$i]['comments']);?></td>
				    <td style="overflow:hidden" nowrap="nowrap"><?php echo $this->escape($this->contacts[$i]['eMail']);?></td>
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
	dojo.addOnLoad(tableKitInit('tableContact'));
</script>