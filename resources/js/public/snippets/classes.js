$(document).ready(function (){

    /*
     *  Datepicker function -- just add class name as .datepicker
     */

    $( function() {
        $( ".datepicker" ).datepicker({
            dateFormat: 'dd.mm.yy',
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+00"
        });
    } );

    /*
     * Select - 2 search dropdown
     */

    $('.select-2').select2({
        theme: 'bootstrap-5'
    });
});
