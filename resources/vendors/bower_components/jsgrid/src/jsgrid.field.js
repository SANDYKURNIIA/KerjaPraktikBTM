<<<<<<< HEAD
(function(jsGrid, $, undefined) {

    function Field(config) {
        $.extend(true, this, config);
        this.sortingFunc = this._getSortingFunc();
    }

    Field.prototype = {
        name: "",
        title: null,
        css: "",
        align: "",
        width: 100,

        visible: true,
        filtering: true,
        inserting: true,
        editing: true,
        sorting: true,
        sorter: "string", // name of SortStrategy or function to compare elements

        headerTemplate: function() {
            return (this.title === undefined || this.title === null) ? this.name : this.title;
        },

        itemTemplate: function(value, item) {
            return value;
        },

        filterTemplate: function() {
            return "";
        },

        insertTemplate: function() {
            return "";
        },

        editTemplate: function(value, item) {
            this._value = value;
            return this.itemTemplate(value, item);
        },

        filterValue: function() {
            return "";
        },

        insertValue: function() {
            return "";
        },

        editValue: function() {
            return this._value;
        },

        _getSortingFunc: function() {
            var sorter = this.sorter;

            if($.isFunction(sorter)) {
                return sorter;
            }

            if(typeof sorter === "string") {
                return jsGrid.sortStrategies[sorter];
            }

            throw Error("wrong sorter for the field \"" + this.name + "\"!");
        }
    };

    jsGrid.Field = Field;

}(jsGrid, jQuery));
=======
(function(jsGrid, $, undefined) {

    function Field(config) {
        $.extend(true, this, config);
        this.sortingFunc = this._getSortingFunc();
    }

    Field.prototype = {
        name: "",
        title: null,
        css: "",
        align: "",
        width: 100,

        visible: true,
        filtering: true,
        inserting: true,
        editing: true,
        sorting: true,
        sorter: "string", // name of SortStrategy or function to compare elements

        headerTemplate: function() {
            return (this.title === undefined || this.title === null) ? this.name : this.title;
        },

        itemTemplate: function(value, item) {
            return value;
        },

        filterTemplate: function() {
            return "";
        },

        insertTemplate: function() {
            return "";
        },

        editTemplate: function(value, item) {
            this._value = value;
            return this.itemTemplate(value, item);
        },

        filterValue: function() {
            return "";
        },

        insertValue: function() {
            return "";
        },

        editValue: function() {
            return this._value;
        },

        _getSortingFunc: function() {
            var sorter = this.sorter;

            if($.isFunction(sorter)) {
                return sorter;
            }

            if(typeof sorter === "string") {
                return jsGrid.sortStrategies[sorter];
            }

            throw Error("wrong sorter for the field \"" + this.name + "\"!");
        }
    };

    jsGrid.Field = Field;

}(jsGrid, jQuery));
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
