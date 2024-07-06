$(document).ready(function() {

// START Dom Ready -------------------------------------------------------------------------

/**
 * Initialize ajax
 */
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

/**
 * Initialize tooltips
 */
$('[data-bs-toggle="tooltip"]').tooltip({
    trigger: 'hover',
    html: true
});

/**
 * Select input placeholder color fix
 */
function select_placeholder() {
	$('.form-select').each( function(){  
		var select_val = $(this).val();  
		if( select_val != '' ) {  
			$(this).removeClass('select-placeholder');  
		} else {  
			$(this).addClass('select-placeholder');  
		}

	});
}
$(document).on('change', '.form-select', function(){
	select_placeholder();
});
select_placeholder();

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
            $('#masseurName').val(res.name);
            $('#masseurShortName').text(res.name);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('AJAX call failed: ', textStatus, errorThrown);
        }
    });
});

/**
 * Set up jquery ui datepicker localization
 */
$.datepicker.regional['hu'] = {
    closeText: 'Bezár', // set a close button text
    currentText: 'Ma', // set today text
    monthNames: ['Január','Február','Március','Április','Május','Június', 'Július','Augusztus','Szeptember','Október','November','December'], // set month names
    monthNamesShort: ['Jan','Feb','Már','Ápr','Máj','Jún','Júl','Aug','Sze','Okt','Nov','Dec'], // set short month names
    dayNames: ['Vasárnap','Hétfő','Kedd','Szerda','Csütörtök','Péntek','Szombat'], // set days names
    dayNamesShort: ['V','H','K','Sz','Cs','P','Sz'], // set short day names
    dayNamesMin: ['V','H','K','Sz','Cs','P','Sz'], // set more short days names
    dateFormat: 'yyyy-mm-dd' // set format date
};
$.datepicker.setDefaults($.datepicker.regional['hu']);

/**
 * Initialize jquery ui datepicker
 */
$(".datepicker").datepicker({
    firstDay: 1
});

/**
 * Submit the store masseur form
 */
$('#storeMasseurButton').on('click', function(event) {
    event.preventDefault();
    $('#storeMasseurForm').submit();
});

$('#masseursList').masonry({ 'percentPosition': true });

/**
 * Sort masseurs dynamically with order select field
 */
$('#sortBySelect').on('change', function() {
    var sortBy = $(this).val();
    
    $.ajax({
        url: '/masseurs/sort/' + sortBy,
        type: 'GET',
        success: function(data) {
            $('#masseursList').html(data);
            $('#masseursList').masonry('reloadItems').masonry({ 'percentPosition': true });
        }
    });
});


// END Dom Ready ---------------------------------------------------------------------------

});
