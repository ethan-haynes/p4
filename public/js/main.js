(function($) {
    var test = "it worked",
        token = $('#token').val(),
        recieve_token = $('#recieve_token').val();

    $(function() {

        $('form').submit(function( event ) {
            $.ajax({
                url: '/test',
                type: "post",
                data: {message: $('#message-input').val(), '_token': token},
                success: function(data){
                    console.log(data);
                }, error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest);
                    console.log("Status: " + textStatus);
                    console.log("Error: " + errorThrown);
                }
            });
            event.preventDefault();
            $('#message-input').val('...');
        });

        $('#message-input').click( function() {
            $('#message-input').val('');
        });

        setInterval(function () {
            $.ajax({
                url: '/getTest',
                type: "post",
                data: {test: test, '_token': recieve_token},
                success: function(messages){
                    if (messages) {
                        $('#chatbox').empty();
                        for (var i = 0; i < messages.length; i++) {
                                var newMessage = $("<div/>").html(messages[i].message).addClass('user');
                                $('#chatbox').append(newMessage);
                        }
                    }
                }, error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest);
                    console.log("Status: " + textStatus);
                    console.log("Error: " + errorThrown);
                }
            });
        }, 1000);
    });
})(jQuery);
