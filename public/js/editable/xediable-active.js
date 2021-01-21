(function ($) {
 "use strict";
 
 //defaults
   $.fn.editable.defaults.url = '/post'; 


    $('.edit_invoice_colum').editable({
        url: './ajax/ajax_edit_invoice/',
    });

    $('.edit_date').editable({
        type: 'date',
        url: './ajax/ajax_edit_invoice/',
        title: 'Edit time',
       
        
    });  
 
   
})(jQuery); 