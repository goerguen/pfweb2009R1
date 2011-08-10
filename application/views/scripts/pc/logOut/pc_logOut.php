<!--  
<div style="valign: top; padding: 0px 0px 0px 12px; font-size: 10px; color: #888888;" align="left">
	Ihre VM-Version: <?php echo htmlentities($_SESSION['vmweb']['vmVersion']) .' / VMWeb-Version: 2009R1'; ?>
</div>
-->

<div style="height:20px; valign: bottom; padding: 3px 15px 3px 0;" align="right">
	<a href="<?php echo $this->url(array('controller'=>'logout', 'action'=>'logout'));?>">Abmelden</a>
	 - 
	Angemeldet als: <?php echo htmlentities($_SESSION['vmweb']['vorname']) .' '. htmlentities($_SESSION['vmweb']['nachname']); ?>
</div>