$(document).ready(function() {
    
    $('input[type=checkbox]').each(function() {
       $(this).prop('checked', false);
       if($(this).val() == 1) {
           $(this).prop('checked', true);
       }
    });
    
    $('body').on('click', 'input[type=checkbox]', function() {
        $(this).val(0);
        if($(this).prop('checked') == true) {
            $(this).val(1);
        }
    });
    
});