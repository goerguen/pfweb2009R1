<script type="text/javascript">	
	function selectAttribut(Art, Name, Link) {
		var tabs = dijit.byId("<?php echo $this->customer['idNumber']; ?>customerRightTab");
		var pane = new dijit.layout.ContentPane({ 	id: "<?php echo $this->customer['idNumber']; ?>" + Name,
													title: Art + " - " + Name, 
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
		Attribut = document.forms['<?php echo $this->customer['idNumber']; ?>ifForm'].ifAttribut<?php echo $this->customer['idNumber']; ?>.value;
		if (Attribut == 'Merkmal') { AttributLink = '/vmweb2009R1/public/profile/addprofile'; } 
		if (Attribut != "") {
			var tabs = dijit.byId("<?php echo $this->customer['idNumber']; ?>customerRightTab");
			var pane = new dijit.layout.ContentPane({ 	id: "<?php echo $this->customer['idNumber']; ?>" + Attribut + "NEU",
														title: Attribut + " - <b>NEU</b>", 
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
	 function expandAll<?php echo $this->customer['idNumber']; ?>() {
		 dijit.byId('<?php echo $this->customer['idNumber']; ?>Ansprechpartner').rootNode.expand();
		 dijit.byId('<?php echo $this->customer['idNumber']; ?>Merkmale').rootNode.expand();
		 dijit.byId('<?php echo $this->customer['idNumber']; ?>Objektinteresse').rootNode.expand();
		 dijit.byId('<?php echo $this->customer['idNumber']; ?>Betreuende_Werbeagenturen').rootNode.expand();
		 dijit.byId('<?php echo $this->customer['idNumber']; ?>Memos').rootNode.expand();
		 dijit.byId('<?php echo $this->customer['idNumber']; ?>Briefe').rootNode.expand();
		 dijit.byId('<?php echo $this->customer['idNumber']; ?>Kontaktberichte').rootNode.expand();
		 dijit.byId('<?php echo $this->customer['idNumber']; ?>Abteilungen').rootNode.expand();
		 dijit.byId('<?php echo $this->customer['idNumber']; ?>Buchungen').rootNode.expand();
		 dijit.byId('<?php echo $this->customer['idNumber']; ?>Bankverbindung_FibuInfos').rootNode.expand();
		 dijit.byId('<?php echo $this->customer['idNumber']; ?>Zahlverbindungen').rootNode.expand();
		 dijit.byId('<?php echo $this->customer['idNumber']; ?>Anschriften').rootNode.expand();	 
	 }
	
	 function collapseAll<?php echo $this->customer['idNumber']; ?>() {
		 dijit.byId('<?php echo $this->customer['idNumber']; ?>Ansprechpartner').rootNode.collapse();
		 dijit.byId('<?php echo $this->customer['idNumber']; ?>Merkmale').rootNode.collapse();
		 dijit.byId('<?php echo $this->customer['idNumber']; ?>Objektinteresse').rootNode.collapse();
		 dijit.byId('<?php echo $this->customer['idNumber']; ?>Betreuende_Werbeagenturen').rootNode.collapse();
		 dijit.byId('<?php echo $this->customer['idNumber']; ?>Memos').rootNode.collapse();
		 dijit.byId('<?php echo $this->customer['idNumber']; ?>Briefe').rootNode.collapse();
		 dijit.byId('<?php echo $this->customer['idNumber']; ?>Kontaktberichte').rootNode.collapse();
		 dijit.byId('<?php echo $this->customer['idNumber']; ?>Abteilungen').rootNode.collapse();
		 dijit.byId('<?php echo $this->customer['idNumber']; ?>Buchungen').rootNode.collapse();
		 dijit.byId('<?php echo $this->customer['idNumber']; ?>Bankverbindung_FibuInfos').rootNode.collapse();
		 dijit.byId('<?php echo $this->customer['idNumber']; ?>Zahlverbindungen').rootNode.collapse();
		 dijit.byId('<?php echo $this->customer['idNumber']; ?>Anschriften').rootNode.collapse();
	 }
</script>


<form id="<?php echo $this->customer['idNumber']; ?>ifForm" name="<?php echo $this->customer['idNumber']; ?>ifForm">
	<input type="hidden" value="" id="ifAttribut<?php echo $this->customer['idNumber']; ?>" name="ifAttribut<?php echo $this->customer['idNumber']; ?>">
	<div id="pc_infoFenster" style="padding-top: 15px; padding-left: 15px;">
		<?php 	
			if (count($this->infoFensterElemente)>0) {
				foreach ($this->infoFensterElemente as $ife) {   ?>
			<?php //----- INFOFENSTER EIGENSCHAFTEN -----\\?>
			<?php if ($ife != 'Merkmale' && $ife!='Ansprechpartner') { ?>
			    <ul id="<?php echo $this->customer['idNumber'].$ife.'DataStore'; ?>" style="display: none">
			    	<li>Test</li>
			    </ul>
			       
			    <div dojoType="dojox.data.HtmlStore" jsId="<?php echo $ife.'Store'.$this->customer['idNumber']; ?>" dataId="<?php echo $this->customer['idNumber'].$ife.'DataStore'; ?>"></div>
			    <div id="<?php echo $this->customer['idNumber'].$ife.'Id'; ?>" dojoType="dijit.tree.ForestStoreModel" jsId="<?php echo $ife.'Model'.$this->customer['idNumber']; ?>" store="<?php echo $ife.'Store'.$this->customer['idNumber']; ?>" rootLabel="<?php echo $ife; ?>"></div>
			    <div dojoType="dijit.Tree" id="<?php echo $this->customer['idNumber'].$ife; ?>" model="<?php echo $ife.'Model'.$this->customer['idNumber']; ?>" openOnClick="false" openOnDblClick="true" autoExpand="true">
			    	<script type="dojo/method" event="onClick">
						dijit.byId('<?php echo $this->customer['idNumber'].$ife; ?>').rootNode.expand();
						document.forms['<?php echo $this->customer['idNumber']; ?>ifForm'].ifAttribut<?php echo $this->customer['idNumber']; ?>.value= '<?php echo $ife; ?>';
    				</script>
    				<script type="dojo/method" event="onLoad" args="item">
						dijit.byId('<?php echo $this->customer['idNumber'].$ife; ?>').rootNode.collapse();
					</script>
			    </div>
			<?php } ?>
			
			
			<?php 
			//-----------------------------------------\\
			//----- A N S P R E C H P A R T N E R -----\\
			//-----------------------------------------\\
			?>
			<?php if ($ife == 'Ansprechpartner') { ?>
			    <ul id="<?php echo $this->customer['idNumber']; ?>contactsDataStore" style="display: none">
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
		    
			    <div dojoType="dojox.data.HtmlStore" jsId="<?php echo $ife.'Store'.$this->customer['idNumber']; ?>" dataId="<?php echo $this->customer['idNumber']; ?>contactsDataStore"></div>
			    <div id="<?php echo $this->customer['idNumber'].$ife.'Id'; ?>" dojoType="dijit.tree.ForestStoreModel" jsId="<?php echo $ife.'Model'.$this->customer['idNumber']; ?>" store="<?php echo $ife.'Store'.$this->customer['idNumber']; ?>" rootLabel="Ansprechpartner <?php echo ' ('.$this->contactsCount.')'; ?>"></div>
			    <div dojoType="dijit.Tree" id="<?php echo $this->customer['idNumber']; ?>Ansprechpartner" model="<?php echo $ife.'Model'.$this->customer['idNumber']; ?>" openOnClick="false" openOnDblClick="true" autoExpand="true">
			    	<script type="dojo/method" event="onDblClick" args="item">
						anzName = <?php echo $ife.'Store'.$this->customer['idNumber']; ?>.getLabel(item);
						anzName = anzName.trim().split(';');
						selectAttribut('AP', anzName[1], '<?php echo $this->url(array('controller'=>'customer', 'action'=>'customerdetail', 'id'=>"14561"));?>');
						document.forms['<?php echo $this->customer['idNumber']; ?>ifForm'].ifAttribut<?php echo $this->customer['idNumber']; ?>.value= 'Ansprechpartner';
    				</script>
    				<script type="dojo/method" event="onClick">
						dijit.byId('<?php echo $this->customer['idNumber']; ?>Ansprechpartner').rootNode.expand();
						document.forms['<?php echo $this->customer['idNumber']; ?>ifForm'].ifAttribut<?php echo $this->customer['idNumber']; ?>.value= 'Ansprechpartner';
    				</script>
    				<script type="dojo/method" event="onLoad" args="item">
						dijit.byId('<?php echo $this->customer['idNumber']; ?>Ansprechpartner').rootNode.collapse();
					</script>
    			</div>
			<?php } ?>
			
			
			<?php 
			//---------------------------\\
			//----- M E R K M A L E -----\\
			//---------------------------\\
			?>
			<?php if ($ife == 'Merkmale') { ?>
			   <ul id="<?php echo $this->customer['idNumber']; ?>profilesDataStore" style="display: none">
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
			    			       
			    <div dojoType="dojox.data.HtmlStore" jsId="profilesStore<?php echo $this->customer['idNumber']; ?>" dataId="<?php echo $this->customer['idNumber']; ?>profilesDataStore"></div>
			    <div id="<?php echo $this->customer['idNumber']; ?>profiles" dojoType="dijit.tree.ForestStoreModel" jsId="profilesModel<?php echo $this->customer['idNumber']; ?>" store="profilesStore<?php echo $this->customer['idNumber']; ?>" rootLabel="Merkmale <?php echo ' ('.$this->profilesCount.')'; ?>"></div>
			    <div dojoType="dijit.Tree" id="<?php echo $this->customer['idNumber']; ?>Merkmale" model="profilesModel<?php echo $this->customer['idNumber']; ?>" openOnClick="false" openOnDblClick="true" showRoot="true">
			    	<script type="dojo/method" event="onDblClick" args="item">
						anzMerkmalId = dojo.query(item).attr('id');
						anzMerkmal = profilesStore.getLabel(item);
						anzMerkmal = anzMerkmal.trim().split(';');
						if (anzMerkmal[0].substring(0,1) != '[') {
							selectAttribut('Merkmal', anzMerkmal[0].substring(2), '/vmweb2009R1/public/profile/profiledetail/id/'+anzMerkmalId);
						}
						document.forms['<?php echo $this->customer['idNumber']; ?>ifForm'].ifAttribut<?php echo $this->customer['idNumber']; ?>.value= 'Merkmal';
					</script>
    				<script type="dojo/method" event="onClick">
						dijit.byId('<?php echo $this->customer['idNumber']; ?>Merkmale').rootNode.expand();
						document.forms['<?php echo $this->customer['idNumber']; ?>ifForm'].ifAttribut<?php echo $this->customer['idNumber']; ?>.value= 'Merkmal';
    				</script>
    				<script type="dojo/method" event="onLoad" args="item">
						dijit.byId('<?php echo $this->customer['idNumber']; ?>Merkmale').rootNode.collapse();
					</script>
    			</div>
			<?php } ?> 
		<?php } 
			}?>
	</div>
 </form>