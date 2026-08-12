<<<<<<< HEAD
/**
 * Bootstrap Table Vietnamese translation
 * Author: Duc N. PHAM <pngduc@gmail.com>
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['vi-VN'] = {
        formatLoadingMessage: function () {
            return 'Đang tải...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' bản ghi mỗi trang';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Hiển thị từ trang ' + pageFrom + ' đến ' + pageTo + ' của ' + totalRows + ' bảng ghi';
        },
        formatSearch: function () {
            return 'Tìm kiếm';
        },
        formatNoMatches: function () {
            return 'Không có dữ liệu';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['vi-VN']);

=======
/**
 * Bootstrap Table Vietnamese translation
 * Author: Duc N. PHAM <pngduc@gmail.com>
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['vi-VN'] = {
        formatLoadingMessage: function () {
            return 'Đang tải...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' bản ghi mỗi trang';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Hiển thị từ trang ' + pageFrom + ' đến ' + pageTo + ' của ' + totalRows + ' bảng ghi';
        },
        formatSearch: function () {
            return 'Tìm kiếm';
        },
        formatNoMatches: function () {
            return 'Không có dữ liệu';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['vi-VN']);

>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
})(jQuery);