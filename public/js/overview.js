var buttons = [];
$(document).ready(function () {
    getButtons();
    setup();
});

function getButtons() {
    for (var i = 0; i < ids.length; i++) {
        var current = '#' + ids[i];
        var button = $(current);
        buttons.push(button);
    }
}

function setup() {
    for (var i = 0; i < buttons.length; i++) {
        buttons[i].on('click', function (event) {
            console.log($(this).attr('id'));
        })
    }
}
