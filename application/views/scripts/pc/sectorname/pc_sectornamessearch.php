<?php 
	include APPLICATION_PATH.'/views/scripts/pc/toolbar/pc_sectornamessearchMainToolBar.php'; 
?>	

<table border="0px" style="font-family:helvetica,arial,sans-serif; font-size:90%;">
	<tr valign="top">	
		<td valign="bottom">	Branche			</td>	
		<td align="left">	<?php echo $this->form->getElement('sectorName');?>		</td>
	</tr>
	
	<tr valign="top">	
		<td valign="bottom">	Oberbegriff		</td>	
		<td align="left">	<?php echo $this->form->getElement('genericTerm');?>	</td>
	</tr>
	
	<tr valign="top">
		<td valign="bottom">	Hauptbegriff	</td>	
		<td align="left">	<?php echo $this->form->getElement('mainTerm');?>		</td>
	</tr>
	
	<tr valign="top">	
		<td valign="bottom">	ID				</td>	
		<td align="left">	<?php echo $this->form->getElement('id');?>				</td>
	</tr>
</table>