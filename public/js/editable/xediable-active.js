(function ($) {
 "use strict";
 
 //defaults
   $.fn.editable.defaults.url = '/post'; 
    var domain = 'http://localhost/mvc-summary/'
    
    $('.edit_invoice_colum').editable({
        url: domain + 'ajax/ajax_edit_invoice/'
    });

    $('.edit_date').editable({
        type: 'date',
        url: domain +  'ajax/ajax_edit_invoice/',
        title: 'Edit time'
    });  
    $('.edit_staff_cost').editable({
        url: domain +'ajax/ajax_edit_staff_cost/'
    });
   
})(jQuery); 