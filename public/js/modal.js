jQuery(function($){
   $('#datepicker').datepicker({dateFormat: 'yy-mm-dd'});
});

jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        rowId = $(this).attr('id');
    });
});

