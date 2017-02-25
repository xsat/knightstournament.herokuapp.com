$(document).ready(function() {
    var conn = new WebSocket('ws://dev.knightstournament.herokuapp.com:3001');
    var $chat = $('#chat').find('ul');

    conn.onopen = function() {

    };

    conn.onmessage = function(e) {
        $chat.prepend('<li>' + e.data + '</li>');
    };

    conn.onclose = function(e) {
        console.log(e);
    };

    $('#new-message').on('submit', function() {
        var $message = $(this).find('#message');

        if ($message.val()) {
            conn.send($message.val());
            $chat.prepend('<li>' + $message.val() + '</li>');
        }

        $message.val('');

        return false;
    });

    $('#close').on('click', function() {
        conn.close(3000);
    });
});