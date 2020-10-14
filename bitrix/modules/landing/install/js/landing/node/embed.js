;(function() {
	"use strict";

	BX.namespace("BX.Landing");

	var data = BX.Landing.Utils.data;

	/**
	 * @extends {BX.Landing.Block.Node}
	 * @param options
	 * @constructor
	 */
	BX.Landing.Block.Node.Embed = function(options)
	{
		BX.Landing.Block.Node.apply(this, arguments);
		this.onAttributeChangeHandler = options.onAttributeChange || (function() {});
		this.lastValue = this.getValue();
	};


	BX.Landing.Block.Node.Embed.prototype = {
		constructor: BX.Landing.Block.Node.Embed,
		__proto__: BX.Landing.Block.Node.prototype,

		onChange: function()
		{
			this.lastValue = this.getValue();
			this.onAttributeChangeHandler(this);
			this.onChangeHandler(this);
		},

		isChanged: function()
		{
			return JSON.stringify(this.getValue()) !== JSON.stringify(this.lastValue);
		},

		getValue: function()
		{
			return {
				src: this.node.src,
				source: data(this.node, "data-source")
			};
		},

		setValue: function(value, preventSave, preventHistory)
		{
			this.node.src = value.src;
			data(this.node, "data-source", value.source);

			if (this.isChanged())
			{
				if (!preventHistory)
				{
					BX.Landing.History.getInstance().push(
						new BX.Landing.History.Entry({
							block: this.getBlock().id,
							selector: this.selector,
							command: "editEmbed",
							undo: this.lastValue,
							redo: this.getValue()
						})
					);
				}

				this.onChange();
			}
		},

		getField: function()
		{
			return new BX.Landing.UI.Field.Embed({
				title: this.manifest.name,
				selector: this.selector,
				content: this.getValue()
			});
		}
	};

})();