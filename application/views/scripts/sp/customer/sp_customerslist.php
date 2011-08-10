 <img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb/public/images/VM-Logo.jpg" alt="VM Logo" border="none">

 <table>
	<tr bgcolor="#555555" style="color:#ffffff;" height="30px">
	    <th>No.</th>
	    <th>Suchname</th>
	    <th>Name1</th>
	    <th>Gebiet</th>
	    <th>Priorit&auml;t</th>
	    <th>PLZ</th>
	    <th>City</th>
	</tr>
	<?php
		$nullStr = ""; $bgColor="#cccccc"; $fontColor="#3366bb"; 
		if ($this->info == '') {?>
		<?php
			for ($i=0; $i<count($this->customers); $i++) { 
				if ($i<9) {	$nullStr = "0";	} else { $nullStr = ""; }
				if ($i % 2 == 0 ) {	$bgColor="#cccccc";	$fontColor="#1166bb";} else { $bgColor="#999999"; $fontColor="#114499"; }
			?>
			
		<tr>
		    <td bgcolor="<?php echo $bgColor; ?>" style="color:<?php echo $fontColor; ?>;"><?php echo $nullStr.($i+1); ?></td>
		    <td bgcolor="<?php echo $bgColor; ?>" style="color:<?php echo $fontColor; ?>;">
		    	<a href="<?php echo $this->url(array('controller'=>'customer', 'action'=>'customerdetail', 'id'=>$this->customers[$i]['idNumber'], 'kName'=>$this->customers[$i]['keyName'], 'custNo'=>$this->customers[$i]['customerNo']));?>">
		    		<?php echo $this->escape($this->customers[$i]['keyName']);?>
		    	</a>
		    </td>
		    <td bgcolor="<?php echo $bgColor; ?>" style="color:<?php echo $fontColor; ?>;"><?php echo $this->escape($this->customers[$i]['name1']);?></td>
		    <td bgcolor="<?php echo $bgColor; ?>" style="color:<?php echo $fontColor; ?>;"><?php echo $this->escape($this->customers[$i]['area']);?></td>
		    <td bgcolor="<?php echo $bgColor; ?>" style="color:<?php echo $fontColor; ?>;"><?php echo $this->escape($this->customers[$i]['priority']);?></td>
		    <td bgcolor="<?php echo $bgColor; ?>" style="color:<?php echo $fontColor; ?>;"><?php echo $this->escape($this->customers[$i]['pc']);?></td>
		    <td bgcolor="<?php echo $bgColor; ?>" style="color:<?php echo $fontColor; ?>;"><?php echo $this->escape($this->customers[$i]['city']);?></td>
		</tr>
		<?php } ?>	
	<?php } else { ?>
		<tr>
			<td colspan="7" bgcolor="<?php echo $bgColor; ?>" style="color:<?php echo $fontColor; ?>;"><?php echo $this->info;  ?></td>
		</tr>
	<?php } ?>
</table>