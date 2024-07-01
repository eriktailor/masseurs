import 'bootstrap';
import $ from 'jquery';

// Ensure jQuery is available globally
window.$ = window.jQuery = $;

$(document).ready(function() {
    console.log('jQuery is ready to use!');
    
    // Your jQuery code here
    
    /**
     * Initialize tooltips
     */
    $('[data-bs-toggle="tooltip"]').tooltip({
        trigger: 'hover',
        html: true
    });
});
