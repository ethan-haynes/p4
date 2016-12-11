(function($) {
    var test = "it worked",
        token = $('#token').val(),
        recieve_token = $('#recieve_token').val(),
        room = window.location.pathname.split("/").pop();

    $(function() {

        $('form').submit(function( event ) {
            $.ajax({
                url: '/test/' + room,
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
            $('#message-input').val('...');
        });

        $('#message-input').click( function() {
            $('#message-input').val('');
        });

        // check for a new message every second
        setInterval(function () {
            $.ajax({
                url: '/getTest/' + room,
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
                        var newMessage = $("<div/>").html(obj.name + ": " + obj.message).addClass('other-users');
                        $('#chatbox').append(newMessage);
                    });
            }
        }
    });
})(jQuery);
