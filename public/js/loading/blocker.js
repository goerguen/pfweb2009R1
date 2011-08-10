dojo.provide("dojox.ext-dojo.Block");
(function(){
	// a simple shallow alias
	var d = dojo;
	
	d.declare("dojo._Blocker", null, {
		// summary: The blocker instance used by dojo.block to overlay a node
		//
		// duration: Integer
		//		The duration of the fadeIn/fadeOut for the overlay
		duration: 400, 
		
		// opacity: Float
		//		The final opacity of the overlay. A number from 0 to 1
		opacity: 0.6,
		
		// backgroundColor: String
		// 		The color to set the overlay
		backgroundColor: "#fff",
		
		// zIndex: Integer
		//		The z-index to apply to the overlay, should you need to adjust for higher elements
		zIndex: 999,
		
		constructor: function(node, args){
			// the constructor function is always called by dojo.declare. 
			// first, mixin any passed args into this instance to override defaults, or hook in custom stuff
			d.mixin(this, args);
			// in-case someone passed node:"something", force this.node to be the first param 
			this.node = d.byId(node);
			// create a node for our overlay.
			this.overlay = d.doc.createElement('div');

			// do some chained magic nonsense
			d.query(this.overlay)
				// make it the last-child of <body>
				.place(d.body(),"last")
				// give it a common class
				.addClass("dojoBlockOverlay")
				// mixin our styles. I'd prefer to do this purly in CSS, but that would 
				// require external css somehow, and is an extra file. ;)
				.style({
					backgroundColor: this.backgroundColor,
					position: "absolute",
					zIndex: this.zIndex,
					display: "none",
					opacity: this.opacity
				});

		},
		
		show: function(){
			// summary: Show this overlay 
			var pos = d.coords(this.node, true),
				ov = this.overlay;

			d.marginBox(ov, pos);
			d.style(ov, { opacity:0, display:"block" });
			d._fade({ node:ov, end: this.opacity, duration: this.duration }).play();
		},
		
		hide: function(){
			// summary: Hide this overlay
			d.fadeOut({ 
				node: this.overlay,
				duration: this.duration, 
				// when the fadeout is done, set the overlay to display:none
				onEnd: d.hitch(this, function(){
					d.style(this.overlay, "display", "none");
				})
			}).play();
		}
		
	});

	// Generates a unique id for a node
	var id_count = 0; 
	var _uniqueId = function(){
		var id_base = "dojo_blocked",
			id;
		do{
			id = id_base + "_" + (++id_count);
		}while(d.byId(id));
		return id;
	}

	var blockers = {}; // hash of all blockers	
	d.mixin(d, {
		block: function(/* String|DomNode */node, /* dojo.block._blockArgs */args){
			// summary: Overlay the passed node to prevent further input, creates an 
			//		instance of dojo._Blocker attached to this node byId, or generates a
			//		unique id if the node doesn't have one already.
			//
			//	node: The node to overlay
			//	args: An object hash of configuration options. See dojo._Blocker for 
			//		a list of parameters mixed in.
			//
			//	returns: The dojo._Blocker instance created for the passed node for convenience.
			//		You can call var thing = dojo.block("someNode"); thing.hide(); or simply call 
			//		dojo.unblock("someNode"), whichever you prefer.
			var n = d.byId(node);
			var id = d.attr(n, "id");
			if(!id){
				id = _uniqueId();
				d.attr(n, "id", id);
			}
			if(!blockers[id]){
				blockers[id] = new d._Blocker(node, args);
			}
			blockers[id].show();
			return blockers[id]; // dojo._Blocker
		},
		
		unblock: function(node, args){
			// summary: Unblock the passed node
			var id = d.attr(node, "id");
			if(id && blockers[id]){
				blockers[id].hide();
			}
		}
		
	});
	
	d.extend(d.NodeList, {	
		block: // d.NodeList._mapIn("block", true), // refs #7295
			function(args){
				// summary: Wraps dojo.block, calling it for each node in this NodeList
				// 		See dojo._Blocker and dojo.block for full list of passable parameters.
				return this.forEach(function(n){
					d.block(n, args);
				});
			},
		
		unblock: // d.NodeList._mapIn("unblock", true) // refs #7295
			function(args){
				// summary: Wraps dojo.unblock, calling it for each node in this NodeList
				return this.forEach(function(n){
					d.unblock(n, args);
				});
			}
	});
	
})();