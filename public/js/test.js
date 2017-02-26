"use strict";

function Socket(url) {
    this.ws = null;
    this.content = null;
    this.init(url);
    this.events();
}

Socket.prototype.init = function(url) {
    this.ws = new WebSocket(url);
    this.content = $('#chat').find('ul');
};

Socket.prototype.events = function() {
    this.ws.onopen = $.proxy(this.onOpen, this);
    this.ws.onclose = $.proxy(this.onClose, this);
    this.ws.onmessage = $.proxy(function(e) {
        this.onMessage(JSON.parse(e.data));
    }, this);
    this.ws.onerror = $.proxy(this.onError, this);

    $('#new-message').on('submit',$.proxy(this.test, this));
};

Socket.prototype.onOpen = function() {
    this.send({
        'type': 'login'
    });
};

Socket.prototype.onClose = function(a, b) {
    this.debug(a);
    this.debug(b);
};

Socket.prototype.onMessage = function(data) {
    this.debug(data);
};

Socket.prototype.onError = function(a, b) {
    this.debug(a);
    this.debug(b);
};

Socket.prototype.send = function(data) {
    this.ws.send(JSON.stringify(data));
    this.debug(data);
};

Socket.prototype.test = function(e) {
    var $message = $(e.target).find('#message');

    this.send({
        'type': 'message',
        'data': $message.val()
    });

    $message.val('');
    return false;
};

Socket.prototype.debug = function(data) {
    if (typeof(data) == "object") {
        data = JSON.stringify(data);
    }

    this.content .prepend('<li>' + data + '</li>');
    return false;
};


$(document).ready(function() {
    var ws = new Socket('ws://dev.knightstournament.herokuapp.com:3001')
});