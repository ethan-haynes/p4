(function($) {
    var test = "it worked",
        token = $('#token').val(),
        recieve_token = $('#recieve_token').val(),
        room = window.location.pathname.split("/").pop();

    $(function() {

        $('form').submit(function( event ) {
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
                data: {test: test, '_token': recieve_token},
                success: function(data){
                    callback(data);
                }, error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest.responseText);
                    console.log("Status: " + textStatus);
                    console.log("Error: " + errorThrown);
                }
            });
        }, 1000);

        function callback(messages) {
            if (messages) {
                $('#chatbox').empty();
                messages.map(function(obj) {
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
