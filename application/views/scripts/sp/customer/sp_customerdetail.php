

	<div style="border: solid black 1px;">
	
		<?php 
		//-----------------------------------------\\
		//----- A N S P R E C H P A R T N E R -----\\
		//-----------------------------------------\\
		?>
		<div dojoType="dijit.TitlePane" title="Ansprechpartner <?php echo ' ('.$this->contactsCount.')'; ?>" open="false">
	        <?php for ($i=0; $i<(count($this->contacts)); $i++) {
	        		if ($this->contacts[$i]['sex']=='M') { 
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
	    	<br><br>
	    	<?php } ?>
	    </div>


		<?php 
		//---------------------------\\
		//----- M E R K M A L E -----\\
		//---------------------------\\
		?>
		<div dojoType="dijit.TitlePane" title="Merkmale <?php echo ' ('.$this->profilesCount.')'; ?>" open="false">
			   
			    <?php 	$genericTermStr = "";
			    		for ($i=0; $i<count($this->profiles); $i++) { 
			    			if ($this->profileNames[$i][0]['genericTerm'] == $genericTermStr) {
			    ?>
			        			<?php echo ': '.$this->escape($this->profileNames[$i][0]['name']) .' - '. $this->escape($this->profiles[$i]['profilestext']); ?>
			        			<br>
			    <?php 		} else { ?>
			      				<b><?php echo '['. $this->escape($this->profileNames[$i][0]['genericTerm']) .']'; ?></b>
			    <?php 			$genericTermStr = $this->profileNames[$i][0]['genericTerm'];
			    				$i--;    ?> 
			    				<br>			
			   	<?php 
			    			}
			  
			    		} 
			    ?>

	    </div>
	    
	    
	    <div dojoType="dijit.TitlePane" title="Pane #3" open="false">
	        I'm pane #3
	    </div>
	</div>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/dojo/1.5/dojo/dojo.xd.js"  djConfig="parseOnLoad: true"></script>
    
<script type="text/javascript">
	dojo.require("dijit.TitlePane");
</script>