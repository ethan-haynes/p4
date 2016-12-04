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
                    logging(XMLHttpRequest, textStatus, errorThrown);
                }
            });
            event.preventDefault();
            $('#message-input').val('...');
        });

        $('#message-input').click( function() {
            $('#message-input').val('');
        });

        // check for a new message every second
        setInterval(function (callback, logging) {
            $.ajax({
                url: '/getTest',
                type: "post",
                data: {test: test, '_token': recieve_token},
                success: function(messages){
                    callback(messages);
                }, error: function(XMLHttpRequest, textStatus, errorThrown) {
                    logging(XMLHttpRequest, textStatus, errorThrown);
                }
            });
        }, 1000);

        callback = function(message) {
            if (messages) {
                $('#chatbox').empty();
                for (var i = 0; i < messages.length; i++) {
                        var newMessage = $("<div/>").html(messages[i].message).addClass('user');
                        $('#chatbox').append(newMessage);
                }
            }
        };

        logging = function(x, y, z) {
            console.log(x);
            console.log("Status: " + y);
            console.log("Error: " + z);
        };
    });
})(jQuery);
