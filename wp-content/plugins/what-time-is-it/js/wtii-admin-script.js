/**
 * What Time Is It
 * Widget Admin Script
 */

function wtii_admin_script() {
    jQuery(document).ready(function($) { 
        $('.wtii-colorpicker').each(function() {
            $(this).wpColorPicker();
        });
    }); 
}
// Init
wtii_admin_script();