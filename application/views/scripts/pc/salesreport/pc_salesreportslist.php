<div dojoType="dojox.layout.ContentPane" region="top" style="padding: 0 0 0 0;overflow: hidden; marigin: 0 0 0 0" executeScripts="true" scriptSeparation="false" >
	<?php 
		include APPLICATION_PATH.'/views/scripts/pc/toolbar/pc_salesreportslistMainToolBar.php'; 
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
	window.onload = initTableRowEffect;
</script>

<div id="cpSalesReportsList" layoutAlign="client"  dojoType="dojox.layout.ContentPane" region="top" style="padding: 0 0 0 0; height:90%; overflow-x: hidden; overflow-y: auto;" scriptHasHooks="true" executeScripts="true" scriptSeparation="false" >
	<div class="tabKit" id="tableContainer"> 
		<table id="tableSalesReport" align="left" width="100%" class="sortable resizable; tre-table" >
			<thead >
				<tr bgcolor="#88888">
					<th style="overflow:hidden">Datum<br>AN</th>
				    <th style="overflow:hidden">WV<br>VON</th>
				    <th style="overflow:hidden">Dik.zchn</th>
				    <th style="overflow:hidden">Kontakt KU<br>WA1</th>
				    <th style="overflow:hidden">Objekte</th>
				    <th style="overflow:hidden">Produkte</th>
				    <th style="overflow:hidden">Kurzberichte</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$nullStr = "";
					if ($this->infoSalesReportsList == '') {
						for ($i=0; $i<count($this->salesReports); $i++) {
				?>	
				<tr ondblclick="window.open('<?php echo $this->url(array('controller'=>'salesreport', 'action'=>'salesreportdetail', 'id'=>$this->salesReports[$i]['idNumber']));?>','_blank');">
				    <td style="overflow:hidden" nowrap="nowrap">
				    	<?php echo ($this->escape($this->salesReports[$i]['date'])); ?> <br>
				    	<?php echo ($this->escape($this->salesReports[$i]['to'])); ?>
				    </td>
				    <td style="overflow:hidden" nowrap="nowrap">
				    	<?php echo ($this->escape($this->salesReports[$i]['diaryDate'])); ?> <br>
				    	<?php echo ($this->escape($this->salesReports[$i]['from'])); ?>
				    </td>
				    <td style="overflow:hidden" nowrap="nowrap"><?php echo ($this->escape($this->salesReports[$i]['initials'])); ?></td>
				    <td style="overflow:hidden" nowrap="nowrap">
				    	<?php echo $this->escape($this->salesReports[$i]['customer']);?> <br>
				    	<?php echo $this->escape($this->salesReports[$i]['adAg1']);?>
				    </td>
				    <td style="overflow:hidden" nowrap="nowrap"><?php echo $this->escape($this->salesReports[$i]['publications']);?></td>
				    <td style="overflow:hidden" nowrap="nowrap"><?php echo $this->escape($this->salesReports[$i]['brands']);?></td>
				    <td style="overflow:hidden" nowrap="nowrap"><?php echo $this->escape($this->salesReports[$i]['summaryReport']);?></td>
				</tr>				
				<?php } 
					} else { 
				?>
				<tr>
					<td colspan="11"><?php echo $this->infoSalesReportsList;  ?></td>
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
	dojo.addOnLoad(tableKitInit('tableCustomer'));
</script>