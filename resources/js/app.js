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
$(document).on('change', '.form-select', function() {
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
            console.log(res);

            if (res.details.avatar !== null) {
                $('#masseurProfileImage').attr('src', res.details.avatar);
                $('#masseurProfileImageHidden').val(res.details.avatar);
            } else {
                $('#masseurProfileImage').attr('src', '/img/noimage.png');
            }

            $('#masseurShortName').text(res.name);
            $('#masseurName').val(res.name);
            $('#masseurFullName').val(res.full_name);

            $('#masseurMotherName').val(res.details.mother_name);
            $('#masseurBirthDate').val(res.details.birth_date);
            $('#masseurBirthPlace').val(res.details.birth_place);
            $('#masseurVisaNumber').val(res.details.visa_number);
            $('#masseurVisaExpire').val(res.details.visa_expire);
            $('#masseurPassportNumber').val(res.details.passport_number);
            $('#masseurPassportExpire').val(res.details.passport_expire);

            $('#masseurIntroduction').val(res.introduction);
            $('#masseurOtherNotes').val(res.details.notes);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('AJAX call failed: ', textStatus, errorThrown);
        }
    });
});

/**
 * Submit the store masseur form
 */
$('#storeMasseurButton').on('click', function(event) {
    event.preventDefault();
    $('#storeMasseurForm').submit();
});

/**
 * Run masonry on masseurs listing on page load
 */
$('#masseursList').masonry({ 'percentPosition': true });

/**
 * Function to sort masseurs listing dynamically
 */
function fetchMasseurs() {
    var sortBy = $('#sortBySelect').val();
    var salonId = $('#salonSelect').val();
    var status = $('#statusSelect').val();
    var searchQuery = $('#searchField').val();

    $.ajax({
        url: '/masseurs/sort',
        type: 'GET',
        data: {
            sortBy: sortBy,
            salonId: salonId,
            status: status,
            searchQuery: searchQuery
        },
        success: function(data) {
            $('#masseursList').html(data);
            $('#masseursList').masonry('reloadItems').masonry({ 'percentPosition': true });
        }
    });
}

/**
 * Function to format date fields dynamically
 */
function formatDateField() {
    var value = e.target.value.replace(/\D/g, ''); // Remove all non-digit characters
    if (value.length > 8) {
        value = value.slice(0, 8); // Limit input to 8 digits
    }
    var formattedValue = value;
    if (value.length >= 5) {
        formattedValue = value.slice(0, 4) + '-' + value.slice(4, 6) + '-' + value.slice(6, 8);
    } else if (value.length >= 3) {
        formattedValue = value.slice(0, 4) + '-' + value.slice(4, 6);
    } else if (value.length >= 1) {
        formattedValue = value.slice(0, 4);
    }
    e.target.value = formattedValue;
}

/**
 * Run masseurs sort function if filters change
 */
$('#sortBySelect').on('change', fetchMasseurs);
$('#salonSelect').on('change', fetchMasseurs);
$('#statusSelect').on('change', fetchMasseurs);
$('#searchField').on('keyup', fetchMasseurs);

/**
 * Run date input formatter when user types in
 */
$('.date-input').on('input', formatDateField);

// END Dom Ready ---------------------------------------------------------------------------

});
