$(document).ready(function() {

// START Dom Ready -------------------------------------------------------------------------
    
/**
 * Initialize tooltips
 */
$('[data-bs-toggle="tooltip"]').tooltip({
    trigger: 'hover',
    html: true
});

/**
 * Edit or view a masseur
 */
$('.edit-masseur').on('click', function() {
    var masseurId = $(this).data('masseur-id');

    $.ajax({
        url: '/masseurs/fetch/' + masseurId,
        method: 'GET',
        success: function(res) {
            console.log(res)
            $('#masseurShortName').text(res.name);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('AJAX call failed: ', textStatus, errorThrown);
        }
    });
});

$.datepicker.regional['hu'] = {
    closeText: 'Bezár', // set a close button text
    currentText: 'Ma', // set today text
    monthNames: ['Január','Február','Március','Április','Május','Június', 'Július','Augusztus','Szeptember','Október','November','December'], // set month names
    monthNamesShort: ['Jan','Feb','Már','Ápr','Máj','Jún','Júl','Aug','Sze','Okt','Nov','Dec'], // set short month names
    dayNames: ['Hétfő','Kedd','Szerda','Csütörtök','Péntek','Szombar','Vasárnap'], // set days names
    dayNamesShort: ['H','K','Sz','Cs','P','Sz','V'], // set short day names
    dayNamesMin: ['H','K','Sz','Cs','P','Sz','V'], // set more short days names
    dateFormat: 'yyyy-mm-dd' // set format date
};
$.datepicker.setDefaults($.datepicker.regional['hu']);

/**
 * Initialize jquery ui datepicker
 */
$(".datepicker").datepicker();




// END Dom Ready ---------------------------------------------------------------------------

});
