<script type="text/javascript">
	
	function selectAttribut(Art, Name, Link) {
		var tabs = dijit.byId("rightTab");
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

	String.prototype.trim = function () {
	    return this.replace(/^\s+/g, '').replace(/\s+$/g, '');
	}

	function newAttr() {
		AttributLink = "";
		Attribut = document.forms['ifForm'].ifAttribut.value;
		if (Attribut == 'Merkmal') { AttributLink = '/vmweb2009R1/public/profile/addprofile'; } 
		if (Attribut != "") {
			var tabs = dijit.byId("rightTab");
			var pane = new dijit.layout.ContentPane({ 	title: Attribut + " - <b>NEU</b>", 
														href: AttributLink,
														closable: true, 
														onClose: function() {
	            											return confirm("Wollen sie dieses Fenster wirklich schliessen?");
														}
													});
			tabs.addChild(pane);
			tabs.selectChild(pane);
		}
	}
</script>

<form id="ifForm" name="ifForm">
	<input type="hidden" value="" id="ifAttribut" name="ifAttribut">
	<div id="pc_infoFenster" style="padding-top: 15px; padding-left: 15px;">
	
		<?php 
			if (count($this->infoFensterElemente)>0) {
				foreach ($this->infoFensterElemente as $ife) {   ?>
			<?php //----- INFOFENSTER EIGENSCHAFTEN -----\\?>
			<?php if ($ife != 'Merkmale' && $ife!='Ansprechpartner') { ?>
			    <ul id="<?php echo $ife.'DataStore'; ?>" style="display: none">
			    	<li>Test</li>
			    </ul>
			       
			    <div dojoType="dojox.data.HtmlStore" jsId="<?php echo $ife.'Store'; ?>" dataId="<?php echo $ife.'DataStore'; ?>"></div>
			    <div id="<?php echo $ife.'Id'; ?>" dojoType="dijit.tree.ForestStoreModel" jsId="<?php echo $ife.'Model'; ?>" store="<?php echo $ife.'Store'; ?>" rootLabel="<?php echo $ife; ?>"></div>
			    <div dojoType="dijit.Tree" id="<?php echo $ife; ?>" model="<?php echo $ife.'Model'; ?>" openOnClick="false" openOnDblClick="true" autoExpand="true">
			    	<script type="dojo/method" event="onClick">
						dijit.byId('<?php echo $ife; ?>').rootNode.expand();
						document.forms['ifForm'].ifAttribut.value= '<?php echo $ife; ?>';
    				</script>
    				<script type="dojo/method" event="onLoad" args="item">
						dijit.byId('<?php echo $ife; ?>').rootNode.collapse();
					</script>
			    </div>
			<?php } ?>
			
			
			<?php 
			//-----------------------------------------\\
			//----- A N S P R E C H P A R T N E R -----\\
			//-----------------------------------------\\
			?>
			<?php if ($ife == 'Ansprechpartner') { ?>
			    <ul id="contactsDataStore" style="display: none">
			    	<?php for ($i=0; $i<(count($this->contacts)); $i++) {	?>
			    		<li>
			    			<?php 	
			    					echo ($i+1). '. ';										
			    					if ($this->contacts[$i]['sex']=='M') { 
			    						echo 'Herr '; 
			    					} elseif ($this->contacts[$i]['sex']=='W') {
			    						echo 'Frau ';
			    					} 
			    					echo
			    					$this->escape($this->contacts[$i]['profqual']) 		.'; '. 
			    					$this->escape($this->contacts[$i]['lastName']) 		.', '. 
			    					$this->escape($this->contacts[$i]['firstName']) 	.'; Bem: '.
			    					$this->escape($this->contacts[$i]['comments']) 		.' DW: '. 
			    					$this->escape($this->contacts[$i]['extension']); 
			    			?>
			    		</li>
			    	<?php } ?>
			    </ul>
			       
			    <div dojoType="dojox.data.HtmlStore" jsId="<?php echo $ife.'Store'; ?>" dataId="contactsDataStore"></div>
			    <div id="<?php echo $ife.'Id'; ?>" dojoType="dijit.tree.ForestStoreModel" jsId="<?php echo $ife.'Model'; ?>" store="<?php echo $ife.'Store'; ?>" rootLabel="Ansprechpartner <?php echo ' ('.$this->contactsCount.')'; ?>"></div>
			    <div dojoType="dijit.Tree" id="Ansprechpartner" model="<?php echo $ife.'Model'; ?>" openOnClick="false" openOnDblClick="true" autoExpand="true">
			    	<script type="dojo/method" event="onDblClick" args="item">
						anzName = <?php echo $ife.'Store'; ?>.getLabel(item);
						anzName = anzName.trim().split(';');
						selectAttribut('AP', anzName[1], '<?php echo $this->url(array('controller'=>'customer', 'action'=>'customerdetail', 'id'=>"14561"));?>');
						document.forms['ifForm'].ifAttribut.value= 'Ansprechpartner';
    				</script>
    				<script type="dojo/method" event="onClick">
						dijit.byId('Ansprechpartner').rootNode.expand();
						document.forms['ifForm'].ifAttribut.value= 'Ansprechpartner';
    				</script>
    				<script type="dojo/method" event="onLoad" args="item">
						dijit.byId('Ansprechpartner').rootNode.collapse();
					</script>
    			</div>
			<?php } ?>
			
			
			<?php 
			//---------------------------\\
			//----- M E R K M A L E -----\\
			//---------------------------\\
			?>
			<?php if ($ife == 'Merkmale') { ?>
			   <ul id="profilesDataStore" style="display: none">
				    <?php 	$genericTermStr = "";
				    		for ($i=0; $i<count($this->profiles); $i++) { 
				    			if ($this->profileNames[$i]['genericTerm'] == $genericTermStr) {
				    ?>
				        			<li id="<?php echo $this->escape($this->profiles[$i]['idNumber']); ?>">
				        				<?php echo ': '.$this->escape($this->profileNames[$i]['name']) .' ; '. $this->escape($this->profiles[$i]['profilestext']); ?>
				        			</li>
				    <?php 		} else { ?>
				    					<li><?php echo '['. $this->escape($this->profileNames[$i]['genericTerm']) .']'; ?></li>
				    <?php 			$genericTermStr = $this->profileNames[$i]['genericTerm'];
				    				$i--;
				    			} 
				    		} 
				    ?>
			    </ul>			       
			    <div dojoType="dojox.data.HtmlStore" jsId="profilesStore" dataId="profilesDataStore"></div>
			    <div id="profiles" dojoType="dijit.tree.ForestStoreModel" jsId="profilesModel" store="profilesStore" rootLabel="Merkmale <?php echo ' ('.$this->profilesCount.')'; ?>"></div>
			    <div dojoType="dijit.Tree" id="Merkmale" model="profilesModel" openOnClick="false" openOnDblClick="true" showRoot="true">
			    	<script type="dojo/method" event="onDblClick" args="item">
						anzMerkmalId = dojo.query(item).attr('id');
						anzMerkmal = profilesStore.getLabel(item);
						anzMerkmal = anzMerkmal.trim().split(';');
						if (anzMerkmal[0].substring(0,1) != '[') {
							selectAttribut('Merkmal', anzMerkmal[0].substring(2), '/vmweb2009R1/public/profile/profiledetail/id/'+anzMerkmalId);
						}
						document.forms['ifForm'].ifAttribut.value= 'Merkmal';
					</script>
    				<script type="dojo/method" event="onClick">
						dijit.byId('Merkmale').rootNode.expand();
						document.forms['ifForm'].ifAttribut.value= 'Merkmal';
    				</script>
    				<script type="dojo/method" event="onLoad" args="item">
						dijit.byId('Merkmale').rootNode.collapse();
					</script>
    			</div>
			<?php } ?> 
		<?php } 
			}?>
	</div>
</form>