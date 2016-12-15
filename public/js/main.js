(function($) {
    var token = $('#token').val(),
        recieve_token = $('#recieve_token').val(), // getting laravel post token
        room = window.location.pathname.split("/").pop(); // getting path

    $(function() {

        // when the button is clicked to send a message
        $('form').submit(function( event ) {
            // ajax call is made
            $.ajax({
                url: '/sendMessage/' + room,
                type: "post",
                data: {message: $('#message-input').val(), '_token': token},
                success: function(data){
                    console.log(data);
                }, error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest.responseText);
                    console.log("Status: " + textStatus);
                    console.log("Error: " + errorThrown);
                }
            });
            event.preventDefault();
            $('#message-input').val('');
        });

        $('#message-input').click( function() {
            $('#message-input').val('');
        });

        // check for a new message every second
        setInterval(function () {
            $.ajax({
                url: '/getMessage/' + room,
                type: "post",
                data: {'_token': recieve_token},
                success: function(data){
                    callback(data);
                }, error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest.responseText);
                    console.log("Status: " + textStatus);
                    console.log("Error: " + errorThrown);
                }
            });
        }, 1000);

        // callback used to handle response
        function callback(messages) {
            if (messages) {
                $('#chatbox').empty();
                messages.map(function(obj) {
                        // greate a new div with correct style on it
                        var newMessage = $("<div/>").html(
                            "<a href='/profile/"+ obj.user_id +"'>" + obj.user_name  + "</a>" +
                            ": " + obj.message).addClass('other-users');
                        // have to add to first because items come back in reverse order
                        $('#chatbox').prepend(newMessage);
                    });
            }
        }
    });
})(jQuery);
