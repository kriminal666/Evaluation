$(document).ready(function () {

    //$('#evaluations_table').dataTable();


});
$('#module_selector').on('change', function () {
    console.log('selector changed');
    //waitSeconds(3000);
    console.log('hemos esperado');

});

function waitSeconds(iMilliSeconds) {
    var counter = 0
        , start = new Date().getTime()
        , end = 0;
    while (counter < iMilliSeconds) {
        end = new Date().getTime();
        counter = end - start;
    }
}


