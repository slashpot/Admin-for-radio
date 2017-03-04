var buttons = [];

$(document).ready(function () {
    getButtons();
    setup();
    console.log(window.location.pathname);
});

$(document).on("click",".appDetails", function (event) {
    
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
