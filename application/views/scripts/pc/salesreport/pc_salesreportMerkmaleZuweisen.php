<div dojoType="dijit.layout.BorderContainer" gutters="true" id="borderContainerTwo" style="height: 90%; " > 
	<div dojoType="dojox.layout.ContentPane" region="left" splitter="true" style="padding: 0 0 0 0; height: 100%; overflow: auto" >
		<table border="0px" width="100%" style="font-family:helvetica,arial,sans-serif; font-size:85%;" cellpadding="0" cellspacing="0" >
			<tr>
				<td align="left">
					<!-- *********** -->			
					<!-- MERKMALBAUM -->
					<!-- *********** -->
					<div 	dojoType="dijit.Tree" 
							id="mytree2" 
							model="treeModel" 
							showRoot="false"
							openOnClick="true"
					>
						<script type="dojo/method" event="_createTreeNode" args="args"> 
							var tnode = new dijit._TreeNode(args);
							tnode.labelNode.innerHTML = args.label;
							return tnode;
						</script>
					    <script type="dojo/method" event="onClick" args="item,node">
							node.checkNode.checked = !node.checkNode.checked;
						</script>
					</div>
					<!-- *********** -->			
					<!-- MERKMALBAUM -->
					<!-- *********** -->
				</td>
				<td align="right">KLICKMERKMALE</td>
			</tr>
			<tr>
				<td colspan="2">
					
				</td>
			</tr>
		</table>
	</div>
	<div dojoType="dojox.layout.ContentPane" region="right" splitter="true" style="padding: 0 0 0 0; width: 0%; height: 100%; overflow: auto" >
		<table border="0px" width="100%" style="font-family:helvetica,arial,sans-serif; font-size:85%;" cellpadding="0" cellspacing="0" >
			<tr>
				<td align="left">
					<nobr>
						<?php echo $this->FormCheckbox('layoutView', $this->formSalesReport->getElement('layoutView')->getValue(), NULL, array('J','N'));?>
						Entwurf
					</nobr>
				</td>
				<td align="right">KLICKMERKMALE</td>
			</tr>
			<tr>
				<td colspan="2">
					Tabelle
				</td>
			</tr>
		</table>
	</div>
</div>