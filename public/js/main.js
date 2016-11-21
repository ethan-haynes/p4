(function($) {
    var test = "it worked",
        token = $('#token').val();

    $(function() {

        $.ajax({
            url: '/test',
            type: "post",
            data: {test: test, '_token': token},
            success: function(data){
                alert(data);
            }
        });
    });
})(jQuery);
