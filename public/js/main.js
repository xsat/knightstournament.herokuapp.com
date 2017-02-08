function Game() {
    this.container = $('.container');
    this.grid = this.container.find('.grid');
    this.actions = {
        default: 1,
        attack: 2,
        move: 3,
        block: 4
    };
    this.act = this.actions.default;
    this.moves = 5;
    this.iterations = [];
    this.iteration = 0;
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
    this.getItem(5, 4).addClass('blue');
    this.getItem(5, 5).addClass('yellow');

    this.activeColor = 'yellow';
    this.grid.addClass(this.activeColor);
    this.activeItem = this.getItem(5, 5).addClass('active');
    this.addIteration(this.actions.default);
};

Game.prototype.item = function(x, y) {
    return $('<li>', {
        x: x,
        y: y
    }).text(x +':' + y);
};

Game.prototype.events = function() {
    this.container.on('click', '.active', $.proxy(this.active, this));
    this.container.on('click', '.attack', $.proxy(this.attack, this));
    this.container.on('click', '.move', $.proxy(this.move, this));
    this.container.on('click', '.block', $.proxy(this.block, this));
    this.container.on('click', '.end', $.proxy(this.end, this));
    this.container.on('click', '.reset', $.proxy(this.reset, this));
    this.container.on('click', '.available', $.proxy(this.available, this));
    this.container.on('click', '.log', $.proxy(this.log, this));
    this.container.on('click', '.test', $.proxy(this.test, this));
};

Game.prototype.active = function() {
    this.toggleAct(this.actions.attack);
    this.toggleAvailable();
};

Game.prototype.attack = function() {
    this.toggleAct(this.actions.attack);
    this.toggleAvailable();
};

Game.prototype.move = function() {
    this.toggleAct(this.actions.move);
    this.toggleAvailable();
};

Game.prototype.block = function() {
    this.toggleAct(this.actions.default);
    this.toggleAvailable();
};

Game.prototype.end = function() {
    this.toggleAct(this.actions.default);
    this.toggleAvailable();
    this.startIterations();
};

Game.prototype.reset = function() {
    this.toggleAct(this.actions.default);
    this.toggleAvailable();
    var iteration = this.iterations[0];
    this.moveItem(iteration.x, iteration.y);
    this.resetIterations();
};

Game.prototype.available = function(e) {
    this.toggleAct(this.actions.default);
    this.toggleAvailable();
    var $this = $(e.target);
    this.moveItem($this.attr('x'), $this.attr('y'));
    this.addIteration(this.actions.move);
};

Game.prototype.log = function(e) {
    console.log(this);
};

Game.prototype.test = function(e) {
    this.startIteration();
};

Game.prototype.toggleAct = function(act) {
    if (this.act == act || !this.moves) {
        this.act = this.actions.default;
    } else {
        this.act = act;
    }
};

Game.prototype.toggleAvailable = function() {
    if (this.act == this.actions.default) {
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
    this.moves--;
};

Game.prototype.addIteration = function(act) {
   this.iterations.push(this.getIteration(act));
};

Game.prototype.getIteration = function(act) {
    return {
        act: act,
        x: this.activeItem.attr('x'),
        y: this.activeItem.attr('y')
    };
};

Game.prototype.startIterations = function() {
    var iteration;
    for (var i = 0; i < this.iterations.length; i++) {
        iteration = this.iterations[i];
        this.moveItem(iteration.x, iteration.y);
    }
    this.resetIterations();
};

Game.prototype.startIteration = function() {
    if (this.iterations.length < this.iteration + 1) {
        this.resetIterations();
    } else {
        var iteration = this.iterations[this.iteration++];
        this.moveItem(iteration.x, iteration.y);
    }
};

Game.prototype.resetIterations = function() {
    this.iteration = 0;
    this.iterations = [];
    this.moves = 5;
    this.addIteration(this.actions.default);
};

Game.prototype.sleep = function(seconds) {
    var startDate = new Date(),
        currentDate = null;

    do {
        currentDate = new Date();
    } while(currentDate - startDate < seconds * 1000);
};

$(document).ready(function() {
    var game = new Game();
});
