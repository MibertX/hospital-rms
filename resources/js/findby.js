jQuery(document).ready(function() {
    jQuery('.findby').find('.filter-value').on('keyup', function(){
        var $findByContainer = jQuery(this).parents('.findby');
        var url = $findByContainer.attr('action');

        if (typeof url == 'undefined')
            return false;

        jQuery.ajax({
            type:'GET',
            url: url,
            data: $findByContainer.serialize(),
            success:function(data){
                jQuery('#findby__result-container').html(data['view']);
            }
        });
    });
});
