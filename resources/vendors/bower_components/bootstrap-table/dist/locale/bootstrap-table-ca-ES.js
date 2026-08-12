<<<<<<< HEAD
/**
 * Bootstrap Table Catalan translation
 * Authors: Marc Pina<iwalkalone69@gmail.com>
 *          Claudi Martinez<claudix.kernel@gmail.com>
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['ca-ES'] = {
        formatLoadingMessage: function () {
            return 'Espereu, si us plau...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' resultats per pàgina';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Mostrant de ' + pageFrom + ' fins ' + pageTo + ' - total ' + totalRows + ' resultats';
        },
        formatSearch: function () {
            return 'Cerca';
        },
        formatNoMatches: function () {
            return 'No s\'han trobat resultats';
        },
        formatPaginationSwitch: function () {
            return 'Amaga/Mostra paginació';
        },
        formatRefresh: function () {
            return 'Refresca';
        },
        formatToggle: function () {
            return 'Alterna formatació';
        },
        formatColumns: function () {
            return 'Columnes';
        },
        formatAllRows: function () {
            return 'Tots';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['ca-ES']);

})(jQuery);
=======
/**
 * Bootstrap Table Catalan translation
 * Authors: Marc Pina<iwalkalone69@gmail.com>
 *          Claudi Martinez<claudix.kernel@gmail.com>
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['ca-ES'] = {
        formatLoadingMessage: function () {
            return 'Espereu, si us plau...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' resultats per pàgina';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Mostrant de ' + pageFrom + ' fins ' + pageTo + ' - total ' + totalRows + ' resultats';
        },
        formatSearch: function () {
            return 'Cerca';
        },
        formatNoMatches: function () {
            return 'No s\'han trobat resultats';
        },
        formatPaginationSwitch: function () {
            return 'Amaga/Mostra paginació';
        },
        formatRefresh: function () {
            return 'Refresca';
        },
        formatToggle: function () {
            return 'Alterna formatació';
        },
        formatColumns: function () {
            return 'Columnes';
        },
        formatAllRows: function () {
            return 'Tots';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['ca-ES']);

})(jQuery);
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
