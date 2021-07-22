(function($){

    $(document).ready(function(){
        $(document).on('change', '.js-filter-form', function(e){
           //console.log('It Works');
           e.preventDefault();
           var category = $(this).find('option:selected').val();
        //    console.log(category);
        var ajaxurl = 'wp-ajax.ajax_url';
        console.log(ajaxurl);
        debugger ;
           $.ajax({
               url: ajaxurl+'?&method=category',
               data: {action: 'filter', category:category},
               type: 'post',
               success: function(result){
                $('.js-filter main').html(result);
               },
               error: function(result){
                //console.warn(result);
            }
           });
        });
    });

})(jQuery);