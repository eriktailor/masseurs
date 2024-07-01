import $ from 'jquery';
import 'bootstrap';
import 'bootstrap-datepicker';
import 'bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css';
import 'bootstrap-datepicker/dist/locales/bootstrap-datepicker.hu.min.js';

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

  /**
   * Initialize bootstrap datepicker
   */
  $('.datepicker').datepicker({
      format: 'yyyy-mm-dd',
      language: 'hu'
  });

  // END Dom Ready ---------------------------------------------------------------------------

});
