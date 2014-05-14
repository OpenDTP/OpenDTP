MAPEDITOR.plugins.push(function () {
	var name = 'flatplan';
	var flatplan;

	this.load = function (editor) {
		flatplan = $('<div class="flatplan"></div>');

		this.loadFlatplan(editor);
		editor.right_pannel.append(flatplan);
	};

	this.loadFlatplan = function (editor) {
		var page;
		var spread;
		var width;
		var nb_pages;
		var nb_spreads = editor.map.spreads.length;

		for (var i = 0; i < nb_spreads; i++) {
			nb_pages = editor.map.spreads[i].pages.length;
			spread = $('<div class="spread" data-index="' + i + '"></div>');
			width = (1 / editor.map.spreads[i].nb_pages * 100);
			for (var key in editor.map.spreads[i].pages) {
				page = $('<div class="page"><img class="page" src="' + editor.map.spreads[i].pages[key].preview + '" width="100%" /></div>');
				page.css('width', width.toFixed(2) + '%');
				spread.append(page);
			}
			spread.click(editor, function (e) {
				e.data.properties.current_spread = parseInt($(e.target).parents('.spread').attr('data-index'));
				e.data.renderer.render(e.data.properties.current_spread, true);
			});
			this.flatplan.append(spread);
		}
	}

	/**
	 * Getters and Setters
	 */
	this.__defineGetter__('name', function () {return name;});
	this.__defineGetter__('flatplan', function () {return flatplan;});

	this.__defineSetter__('name', function (val) {name = val;});
});
