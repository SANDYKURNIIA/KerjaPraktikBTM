<<<<<<< HEAD
/**
 * Bootstrap Table Persian translation
 * Author: MJ Vakili <mjv.1989@Gmail.com>
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['fa-IR'] = {
        formatLoadingMessage: function () {
            return 'در حال بارگذاری, لطفا صبر کنید...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' رکورد در صفحه';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'نمایش ' + pageFrom + ' تا ' + pageTo + ' از ' + totalRows + ' ردیف';
        },
        formatSearch: function () {
            return 'جستجو';
        },
        formatNoMatches: function () {
            return 'رکوردی یافت نشد.';
        },
        formatPaginationSwitch: function () {
            return 'نمایش/مخفی صفحه بندی';
        },
        formatRefresh: function () {
            return 'به روز رسانی';
        },
        formatToggle: function () {
            return 'تغییر نمایش';
        },
        formatColumns: function () {
            return 'سطر ها';
        },
        formatAllRows: function () {
            return 'همه';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['fa-IR']);

=======
/**
 * Bootstrap Table Persian translation
 * Author: MJ Vakili <mjv.1989@Gmail.com>
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['fa-IR'] = {
        formatLoadingMessage: function () {
            return 'در حال بارگذاری, لطفا صبر کنید...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' رکورد در صفحه';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'نمایش ' + pageFrom + ' تا ' + pageTo + ' از ' + totalRows + ' ردیف';
        },
        formatSearch: function () {
            return 'جستجو';
        },
        formatNoMatches: function () {
            return 'رکوردی یافت نشد.';
        },
        formatPaginationSwitch: function () {
            return 'نمایش/مخفی صفحه بندی';
        },
        formatRefresh: function () {
            return 'به روز رسانی';
        },
        formatToggle: function () {
            return 'تغییر نمایش';
        },
        formatColumns: function () {
            return 'سطر ها';
        },
        formatAllRows: function () {
            return 'همه';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['fa-IR']);

>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
})(jQuery);