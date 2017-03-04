var inlineForm = $("#inlineForm")
var form = $("#form");
var select = $("#inlineFormCustomSelect");

var songNumber = 100;

$(document).ready(function () {
    setSongNumber();
    $( "select" ).change(setInlineForm); 
});

function appendInline() {
    var wrap = inlineForm.wrap('<p/>').parent().html();
    form.append(wrap);
    inlineForm.unwrap();
}

function setSongNumber() {
    for(var i = 1; i <= songNumber; i++) {
        select.append("<option value=" + i.toString() + ">" + i + "</option>");
    }
}

function setInlineForm() {
    form.empty();
    var number = select.val();

    for(var i = 2; i <= number; i++) {
        appendInline();
    }
}