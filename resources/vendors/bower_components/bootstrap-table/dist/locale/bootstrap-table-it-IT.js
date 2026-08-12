<<<<<<< HEAD
/**
 * Bootstrap Table Italian translation
 * Author: Davide Renzi<davide.renzi@gmail.com>
 * Author: Davide Borsatto <davide.borsatto@gmail.com>
 * Author: Alessio Felicioni <alessio.felicioni@gmail.com>
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['it-IT'] = {
        formatLoadingMessage: function () {
            return 'Caricamento in corso...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' elementi per pagina';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Pagina ' + pageFrom + ' di ' + pageTo + ' (' + totalRows + ' elementi)';
        },
        formatSearch: function () {
            return 'Cerca';
        },
        formatNoMatches: function () {
            return 'Nessun elemento trovato';
        },
        formatRefresh: function () {
            return 'Aggiorna';
        },
        formatToggle: function () {
            return 'Alterna';
        },
        formatColumns: function () {
            return 'Colonne';
        },
        formatAllRows: function () {
            return 'Tutto';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['it-IT']);

})(jQuery);
=======
/**
 * Bootstrap Table Italian translation
 * Author: Davide Renzi<davide.renzi@gmail.com>
 * Author: Davide Borsatto <davide.borsatto@gmail.com>
 * Author: Alessio Felicioni <alessio.felicioni@gmail.com>
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['it-IT'] = {
        formatLoadingMessage: function () {
            return 'Caricamento in corso...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' elementi per pagina';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Pagina ' + pageFrom + ' di ' + pageTo + ' (' + totalRows + ' elementi)';
        },
        formatSearch: function () {
            return 'Cerca';
        },
        formatNoMatches: function () {
            return 'Nessun elemento trovato';
        },
        formatRefresh: function () {
            return 'Aggiorna';
        },
        formatToggle: function () {
            return 'Alterna';
        },
        formatColumns: function () {
            return 'Colonne';
        },
        formatAllRows: function () {
            return 'Tutto';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['it-IT']);

})(jQuery);
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
