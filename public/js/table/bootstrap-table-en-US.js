/**
 * Bootstrap Table English translation
 * Author: Zhixin Wen<wenzhixin2010@gmail.com>
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['en-US'] = {
        formatLoadingMessage: function () {
            return 'Kraunama prašome palaukti...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' eilučių per puslapį';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Rodoma nuo ' + pageFrom + ' iki ' + pageTo + ' ( iš ' + totalRows + ' eilučių )';
        },
        formatSearch: function () {
            return 'Ieškoti';
        },
        formatNoMatches: function () {
            return 'Pagal duomenis niekas nerasta';
        },
        formatPaginationSwitch: function () {
            return 'Slėpti/Rodyti puslapiavimą';
        },
        formatRefresh: function () {
            return 'Atnaujinti';
        },
        formatToggle: function () {
            return 'Jungti';
        },
        formatColumns: function () {
            return 'Stulpeliai';
        },
        formatAllRows: function () {
            return 'Visi';
        },
        formatExport: function () {
            return 'Eksportuoti duomenis';
        },
        formatClearFilters: function () {
            return 'Išvalyti filtrus';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['en-US']);

})(jQuery);
