<<<<<<< HEAD
/**
 * @author: Jewway
 * @version: v1.0.0
 */

!function ($) {
  'use strict';

  var BootstrapTable = $.fn.bootstrapTable.Constructor;

  BootstrapTable.prototype.changeTitle = function (locale) {
    $.each(this.options.columns, function (idx, columnList) {
      $.each(columnList, function (idx, column) {
        if (column.field) {
          column.title = locale[column.field];
        }
      });
    });

    this.initHeader();
    this.initBody();
    this.initToolbar();
  };

  BootstrapTable.prototype.changeLocale = function (localeId) {
    this.options.locale = localeId;
    this.initLocale();
    this.initPagination();
  };

  $.fn.bootstrapTable.methods.push('changeTitle');
  $.fn.bootstrapTable.methods.push('changeLocale');

=======
/**
 * @author: Jewway
 * @version: v1.0.0
 */

!function ($) {
  'use strict';

  var BootstrapTable = $.fn.bootstrapTable.Constructor;

  BootstrapTable.prototype.changeTitle = function (locale) {
    $.each(this.options.columns, function (idx, columnList) {
      $.each(columnList, function (idx, column) {
        if (column.field) {
          column.title = locale[column.field];
        }
      });
    });

    this.initHeader();
    this.initBody();
    this.initToolbar();
  };

  BootstrapTable.prototype.changeLocale = function (localeId) {
    this.options.locale = localeId;
    this.initLocale();
    this.initPagination();
  };

  $.fn.bootstrapTable.methods.push('changeTitle');
  $.fn.bootstrapTable.methods.push('changeLocale');

>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
}(jQuery);