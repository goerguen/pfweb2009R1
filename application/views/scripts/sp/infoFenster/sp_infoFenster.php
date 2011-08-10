<link href="http://192.168.0.100/testZend/public/js/dojo-release-1.5.0/dijit/themes/claro/claro.css" media="screen" rel="stylesheet" type="text/css" >

<?php //	if ($this->dojo()->isEnabled()){
    			$this	->dojo()->setLocalPath("/testZend/public/js/dojo-release-1.5.0/dojo/dojo.js")
	             		->addStyleSheetModule("dijit.themes.tundra");
    			echo $this->dojo();
   		// }
?>

<script type="text/javascript">
	dojo.require("dojo.data.ItemFileReadStore");
    dojo.require("dojo.parser");
    dojo.require("dojox.data.HtmlStore");
    dojo.require("dijit.Tree");
</script>

<body class="claro">	
	<?php foreach ($this->infoFensterElemente as $ife) {   ?>
		
		<?php //----- INFOFENSTER EIGENSCHAFTEN -----\\?>
		<?php if ($ife != 'Merkmale' && $ife!='Ansprechpartner') { ?>
		    <ul id="<?php echo $ife.'DataStore'; ?>" style="display: none">
	    		<li>Test</li>
		    </ul>
	       
		    <div dojoType="dojox.data.HtmlStore" jsId="<?php echo $ife.'Store'; ?>" dataId="<?php echo $ife.'DataStore'; ?>"></div>
		    <div id="<?php echo $ife.'Id'; ?>" dojoType="dijit.tree.ForestStoreModel" jsId="<?php echo $ife.'Model'; ?>" store="<?php echo $ife.'Store'; ?>" rootLabel="<?php echo $ife; ?>"></div>
		    <div dojoType="dijit.Tree" id="<?php echo $ife; ?>" model="<?php echo $ife.'Model'; ?>" openOnClick="true" openOnDblClick="true"></div>
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
		    			<?php 	if ($this->contacts[$i]['sex']=='M') { 
		    						echo 'Herr '; 
		    					} elseif ($this->contacts[$i]['sex']=='W') {
		    						echo 'Frau ';
		    					} 
		    					echo
		    					$this->escape($this->contacts[$i]['profqual']) 		.' '. 
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
		    <div dojoType="dijit.Tree" id="<?php echo $ife; ?>" model="<?php echo $ife.'Model'; ?>" openOnClick="true" openOnDblClick="true"></div>
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
		    			if ($this->profileNames[$i][0]['genericTerm'] == $genericTermStr) {
		    ?>
		        			<li><?php echo ': '.$this->escape($this->profileNames[$i][0]['name']) .' - '. $this->escape($this->profiles[$i]['profilestext']); ?></li>
		    <?php 		} else { ?>
		    				<li><?php echo '['. $this->escape($this->profileNames[$i][0]['genericTerm']) .']'; ?></li>
		    <?php 			$genericTermStr = $this->profileNames[$i][0]['genericTerm'];
		    				$i--;
		    			} 
		    		} 
		    ?>
		    </ul>
	       
		    <div dojoType="dojox.data.HtmlStore" jsId="profilesStore" dataId="profilesDataStore"></div>
		    <div id="profiles" dojoType="dijit.tree.ForestStoreModel" jsId="profilesModel" store="profilesStore" rootLabel="Merkmale <?php echo ' ('.$this->profilesCount.')'; ?>" ></div>
		    <div dojoType="dijit.Tree" id="Merkmale" model="profilesModel" openOnClick="true" openOnDblClick="true" showRoot="true"></div>
		<?php } ?> 
    <?php } ?>
</body>