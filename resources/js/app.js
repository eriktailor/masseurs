import 'bootstrap';
import $ from 'jquery';

// Ensure jQuery is available globally
window.$ = window.jQuery = $;

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


// END Dom Ready ---------------------------------------------------------------------------

});
