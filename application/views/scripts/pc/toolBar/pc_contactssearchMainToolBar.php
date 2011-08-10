<table width="100%" cellpadding="0" cellspacing="0" border="0">
  <tr height="43px">
    <td width="100%"  nowrap="nowrap" style="background-image: url(http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/toolBar/br.jpg); background-repeat:repeat-x;">       
		 <img onclick="getAllContactsList()" src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/toolBar/alle.jpg" style="cursor:pointer" alt="Alle" border="none" 
		><img onclick="getContactsList()"  src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/toolBar/suchen.jpg" style="cursor:pointer" alt="Suchen" border="none"
		><img src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/toolBar/blank.jpg" alt="" border="none"
		><img onclick="window.open('<?php echo $this->url(array('controller'=>'contact', 'action'=>'contactdetail'));?>')" src="http://<?php echo $_SERVER['SERVER_NAME'];?>/vmweb2009R1/public/images/vmPcPics/toolBar/neuListe.jpg" style="cursor:pointer" alt="Neu" border="none"
		><div style="background-image: url(br.jpg) repeat-x;"></div>
	</td>
  </tr>
</table>