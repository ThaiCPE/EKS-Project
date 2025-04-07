/**
 * 2048 Game Script for WordPress
 */
jQuery(document).ready(function($) {
    // Game object
    var gameObj = {
        intiStage: function() {
            // Initialize game stage
            // Your implementation here
        },
        newBox: function() {
            // Create new box
            // Your implementation here
        },
        move: function(directionX, directionY) {
            // Handle movement
            // Your implementation here
        }
    };

    // Controller object
    var controller = {
        start: function(x, y) {
            // Handle start of movement
            // Your implementation here
        },
        move: function(x, y) {
            // Handle movement
            // Your implementation here
        },
        end: function(x, y) {
            // Handle end of movement
            // Your implementation here
        }
    };

    // Initialize game
    gameObj.intiStage();
    gameObj.newBox();

    // Event handlers
    var stage = document.getElementById('stage');
    
    // Mouse events
    document.onmousedown = function(e) {
        var event = e || window.event;
        var x = event.clientX;
        var y = event.clientY;
        controller.start(x, y);
    };
    
    document.onmousemove = function(e) {
        var event = e || window.event;
        var x = event.clientX;
        var y = event.clientY;
        controller.move(x, y);
    };
    
    document.onmouseup = function(e) {
        var event = e || window.event;
        var x = event.clientX;
        var y = event.clientY;
        controller.end(x, y);
    };

    // Keyboard events
    function keyUp(e) {
        var currKey = 0, e = e || event;
        currKey = e.keyCode || e.which || e.charCode;
        
        switch (currKey) {
            case 37: gameObj.move(0, 0); break; // Left
            case 38: gameObj.move(1, 0); break; // Up
            case 39: gameObj.move(0, 1); break; // Right
            case 40: gameObj.move(1, 1); break; // Down
        }
    }
    
    document.onkeyup = keyUp;
});