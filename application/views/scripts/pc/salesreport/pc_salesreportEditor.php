
<script type="text/javascript">
	dojo.require("dijit.Editor");
    dojo.require("dijit._editor.plugins.FontChoice"); // 'fontName','fontSize','formatBlock'
    dojo.require("dijit._editor.plugins.TextColor");
    dojo.require("dijit._editor.plugins.LinkDialog");
    dojo.require("dijit._editor.plugins.ViewSource");
    dojo.require("dijit._editor.plugins.NewPage");
    dojo.require("dijit._editor.plugins.Print");
    dojo.require("dojox.editor.plugins.ToolbarLineBreak");
    dojo.require("dojox.editor.plugins.PageBreak");
    dojo.require("dojox.editor.plugins.FindReplace");
    dojo.require("dojox.editor.plugins.CollapsibleToolbar");
    dojo.require("dojox.editor.plugins.TablePlugins");
    dojo.require("dojox.editor.plugins.ShowBlockNodes");
    dojo.require("dojox.editor.plugins.Preview");
</script>

<style>
   @import "http://ajax.googleapis.com/ajax/libs/dojo/1.6/dojox/editor/plugins/resources/css/CollapsibleToolbar.css";
   @import "http://ajax.googleapis.com/ajax/libs/dojo/1.6/dojox/editor/plugins/resources/css/PageBreak.css";
   @import "http://ajax.googleapis.com/ajax/libs/dojo/1.6/dojox/editor/plugins/resources/css/FindReplace.css";	
   @import "http://ajax.googleapis.com/ajax/libs/dojo/1.6/dojox/editor/plugins/resources/editorPlugins.css";
   @import "http://ajax.googleapis.com/ajax/libs/dojo/1.6/dojox/editor/plugins/resources/css/ShowBlockNodes.css";
   @import "http://ajax.googleapis.com/ajax/libs/dojo/1.6/dojox/editor/plugins/resources/css/Preview.css";
</style>

<?php echo $this->formSalesReport->getElement('text'); ?>
