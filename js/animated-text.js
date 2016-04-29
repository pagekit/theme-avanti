(function(UI) {

    "use strict";


    UI.component('animatedText', {

        defaults: {
            animation: 'uk-animation-fade',
            duration: 40
        },

        boot: function() {

            // init code
            UI.ready(function(context) {

                UI.$("[data-uk-animatedtext]", context).each(function() {
                    var grid = UI.$(this), obj;

                    if (!grid.data("animatedText")) {
                        obj = UI.animatedText(grid, UI.Utils.options(grid.attr("data-uk-animatedtext")));
                    }
                });
            });
        },

        init: function() {

            this.on("display.uk.check", function(e) {
                if(this.element.is(":visible")) this.process();
            }.bind(this));

            this.process();
        },

        process: function() {
            var $this = this,
                text  = this.element.text().split(''),
                range = [];

            for(var i=0;i<text.length;i++) range.push(i);

            range = shuffle(range);

            text = text.map(function(chr, idx, delay){
                delay = (range[idx]*$this.options.duration);
                return '<span class="'+$this.options.animation+'" style="-webkit-animation-delay:'+delay+'ms;animation-delay:'+delay+'ms">'+chr+'</span>';
            }).join('');

            this.element.html(text);
        }
    });

    function shuffle(array) {
        for (var i = array.length - 1; i > 0; i--) {
            var j = Math.floor(Math.random() * (i + 1));
            var temp = array[i];
            array[i] = array[j];
            array[j] = temp;
        }
        return array;
    }


})(UIkit);
