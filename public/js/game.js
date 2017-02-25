function Game(url) {
    this.ws = new WebSocket(url);
    this.init();
}

Game.prototype.init = function() {
};

