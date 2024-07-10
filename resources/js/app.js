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
 * Logout button clicked
 */
$('#logoutButton').on('click', function(event) {
    event.preventDefault();
    $('#logout-form').submit();
});

/**
 * Run select input placeholder color change function
 */
selectPlaceholderColor();
$(document).on('change', '.form-select', selectPlaceholderColor);

/**
 * Run hide loading div in modal after content loaded
 */
$('#masseurModal').on('show.bs.modal', hideLoadingDiv);

/**
 * Run submit the masseur form from modal
 */
$('#storeMasseurButton').on('click', submitMasseurForm); 

/**
 * Run masonry on masseurs listing on page load
 */
$('#masseursList').masonry({ 'percentPosition': true });

/**
 * Run masseurs sort & filter function if filters change
 */
$('#sortBySelect').on('change', sortMasseurs);
$('#salonSelect').on('change', sortMasseurs);
$('#statusSelect').on('change', sortMasseurs);
$('#searchField').on('keyup', sortMasseurs);

/**
 * Run edit or just view masseur modal
 */
$('.edit-masseur').on('click', openMasseurModal);

/**
 * Run date input formatter when user types in
 */
$('.date-input').on('input', formatDateField);

/**
 * Run profile image uploader feature on avatar click
 */
masseurAvatarUpload('#masseurProfileImageHover', '#masseurProfileImageHidden', '#masseurProfileImage');

// END Dom Ready ---------------------------------------------------------------------------

});

// FUNCTIONS -------------------------------------------------------------------------------

/**
 * Function to change select inputs placeholder color
 */
function selectPlaceholderColor() {
	$('.form-select').each( function(){  
		var select_val = $(this).val();  
		if( select_val != '' ) {  
			$(this).removeClass('select-placeholder');  
		} else {  
			$(this).addClass('select-placeholder');  
		}

	});
}

/**
 * Function to hide loading divs after open modals
 */
function hideLoadingDiv() {
    setTimeout(function() {
        $('.loading-div').fadeOut(500);
        setTimeout(function() {
            $('.loading-div').addClass('invisible');
        }, 400);
    }, 1000);
}

/**
 * Function to edit or view a masseur in modal
 */
function openMasseurModal() {
    var masseurId = $(this).data('masseur-id');

    $('#masseurForm').trigger('reset');
    $('#masseurProfileImage').attr('src', '/img/noimage.png');
    $('#loadingDiv').removeClass('invisible');

    $.ajax({
        url: '/masseurs/fetch/' + masseurId,
        method: 'GET',
        success: function(res) {
            console.log(res);

            if (res.details) {
                if (res.details.avatar !== null) {
                    $('#masseurProfileImage').attr('src', res.details.avatar);
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
            } else {
                console.error('Error: res.details is null or undefined');
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('AJAX call failed: ', textStatus, errorThrown);
        }
    });
}

/**
 * Function to store masseur date from form in modal
 */
function submitMasseurForm(e) {
    e.preventDefault();
    $('#masseurForm').submit();
}

/**
 * Function to sort & filter masseurs listing dynamically
 */
function sortMasseurs() {
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
function formatDateField(e) {

    // Remove all non-digit characters
    var value = e.target.value.replace(/\D/g, '');
    var formattedValue = '';

    if (value.length <= 4) {
        formattedValue = value;
    } else if (value.length <= 6) {
        formattedValue = value.slice(0, 4) + '-' + value.slice(4);
    } else {
        formattedValue = value.slice(0, 4) + '-' + value.slice(4, 6) + '-' + value.slice(6);
    }

    e.target.value = formattedValue;
}

/**
 * Function to open file browser at avatar click
 */
function masseurAvatarUpload(hoverDivId, fileInputId, imageId) {

    // When the hover div is clicked
    $(hoverDivId).on('click', function(event) {
        event.stopPropagation(); // Prevent any event propagation issues
        $(fileInputId).trigger('click');
    });

    // When a file is selected
    $(fileInputId).on('change', function(event) {
        var input = event.target;

        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(imageId).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    });
}
    