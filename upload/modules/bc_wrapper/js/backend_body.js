if(typeof jQuery != 'undefined')
{
    jQuery(document).ready(function($) {
        var toggle_autoplay = function(obj) {
            if($(obj).val()=='generic') {
                $(obj).parent().parent().find('input[name="autoplay"]').parent().parent().hide();
                $(obj).parent().parent().find('select[name="ratio"]').parent().show();
            }
            else {
                $(obj).parent().parent().find('input[name="autoplay"]').parent().parent().show();
console.log($(obj).parent().parent().find('select[name="ratio"]').parent());
                $(obj).parent().parent().find('select[name="ratio"]').parent().hide();
            }
        }
        $('select[name="content_type"]').on('change',function() {
            toggle_autoplay($(this));
        });
        $('select[name="content_type"]').each( function() {
            toggle_autoplay($(this));
        });
    });
}