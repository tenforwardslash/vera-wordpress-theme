(function ($) {
    'use strict';
    $(function () {
        $(document).on('click', ".my-calendar-header a.mcajax, .my-calendar-footer a.mcajax", function (e) {
            e.preventDefault();
            var calendar = $( this ).closest( '.mc-main' );
            var ref      = calendar.attr('id');
            var link     = $(this).attr('href');
            var height   = $('.mc-main' ).height();
            console.log(link);
            var url = new URL(link);
            $('#' + ref).html('<div class=\"mc-loading\"></div><div class=\"loading\" style=\"height:' + height + 'px\"><span class="screen-reader-text">Loading...</span></div>');
            $('#' + ref).load(link + ' #' + ref + ' > *', function ( response, status, xhr ) {

                if ( status == 'error' ) {
                    $( '#' + ref ).html( msg + xhr.status + " " + xhr.statusText );
                }
                // functions to execute when new view loads.
                // List view.
                if ( typeof( mclist ) !== "undefined" && mclist == 'true' ) {
                    // $('li.mc-events').children().not('.event-date').hide();
                    // $('li.current-day').children().show();
                    $(document).trigger( "list-custom:reload" );
                    $(document).trigger("list-custom:load-list-expansions");
                }
                // Grid view.
                if ( typeof( mcgrid ) !== "undefined" && mcgrid == 'true' ) {
                    $('.calendar-event').children().not('.event-title').hide();
                }
                // Mini view.
                if  ( typeof( mcmini ) !== "undefined" && mcmini  == 'true' ) {
                    $('.mini .has-events').children().not('.trigger, .mc-date, .event-date').hide();
                }
                // All views.
                $( '#' + ref ).attr('tabindex', '-1').focus();
                // Your Custom ajax load changes if needed.

                // set the hash of the window so that createLocationFilterList in ./events-view knows what locations to
                //  set as 'current'
                if ( $( '.mc-main.calendar' ).length ) {
                    window.location.hash = url.search ? url.search : '';
                    $(document).trigger( "grid-custom:reload" );
                } else if ( $( '.mc-main.list' ).length ) {
                    $(document).trigger( "list-custom:reload" );
                }
            });
        });
    });
}(jQuery));