function Game() {
    this.container = $('.container');
    this.grid = this.container.find('.grid');
    this.states = {
        default:1,
        attack:2,
        block:3,
        move:4
    };
    this.state = this.states.default;
    this.init();
    this.events();
}

Game.prototype.init = function() {
    for (var y = 1; y <= 5; y++) {
        for (var x = 1; x <= 5; x++) {
            this.grid.append(this.item(x, y));
        }
    }

    this.getItem(1, 1).addClass('red');
    this.getItem(1, 5).addClass('green');
    this.getItem(5, 1).addClass('blue');
    this.getItem(5, 5).addClass('yellow');

    this.activeColor = 'yellow';
    this.grid.addClass(this.activeColor);
    this.activeItem = this.getItem(5, 5).addClass('active');
};

Game.prototype.item = function(x, y) {
    return $('<li>', {
        x: x,
        y: y
    }).text(x +':' + y);
};

Game.prototype.events = function() {
    this.container.on('click', '.attack', $.proxy(this.attack, this));
    this.container.on('click', '.move', $.proxy(this.move, this));
    this.container.on('click', '.block', $.proxy(this.block, this));
    this.container.on('click', '.end', $.proxy(this.end, this));
    this.container.on('click', '.reset', $.proxy(this.reset, this));
    this.container.on('click', '.available', $.proxy(this.available, this));
};

Game.prototype.attack = function() {
    this.toggleState(this.states.attack);
};

Game.prototype.move = function() {
    this.toggleState(this.states.move);
};

Game.prototype.block = function() {
    this.toggleState(this.states.default);
};

Game.prototype.end = function() {
    this.toggleState(this.states.default);
};

Game.prototype.reset = function() {
    this.toggleState(this.states.default);
};

Game.prototype.available = function(e) {
    this.toggleState(this.states.default);
    var $this = $(e.target);
    this.moveItem($this.attr('x'), $this.attr('y'));
};

Game.prototype.toggleState = function(state) {
    if (this.state == state) {
        this.state = this.states.default;
    } else {
        this.state = state;
    }

    this.toggleAvailable();
};

Game.prototype.toggleAvailable = function() {
    if (this.state == this.states.default) {
        this.grid.find('.available').removeClass('available');
    } else {
        var x = this.activeItem.attr('x') * 1,
            y = this.activeItem.attr('y') * 1,
            selector = '';

        selector += this.getSelector(x - 1, y - 1) + ',';
        selector += this.getSelector(x, y - 1) + ',';
        selector += this.getSelector(x + 1, y - 1) + ',';
        selector += this.getSelector(x + 1, y) + ',';
        selector += this.getSelector(x + 1, y + 1) + ',';
        selector += this.getSelector(x, y + 1) + ',';
        selector += this.getSelector(x - 1, y + 1) + ',';
        selector += this.getSelector(x - 1, y);

        this.grid.find(selector).addClass('available');
    }
};

Game.prototype.getItem = function(x, y) {
    return this.grid.find(this.getSelector(x, y));
};

Game.prototype.getSelector = function(x, y) {
    return '[x="' + x + '"][y="' + y + '"]';
};

Game.prototype.moveItem = function(x, y) {
    this.activeItem.removeClass(this.activeColor).removeClass('active');
    this.activeItem = this.getItem(x, y)
        .addClass(this.activeColor).addClass('active');
};

$(document).ready(function() {
    new Game();
});
