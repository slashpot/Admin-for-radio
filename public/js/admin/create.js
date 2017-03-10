var inlineForm = $("#inlineForm")
var form = $("#form");
var select = $("#inlineFormCustomSelect");

var songNumber = 20; 
var current = 1;

$(document).ready(function () {
    setSongNumber();
    $("select").change(setInlineForm);
});

function appendInline() {
    var wrap = inlineForm.wrap('<p/>').parent().html();
    form.append(wrap);
    inlineForm.unwrap();
}

function setSongNumber() {
    for (var i = 1; i <= songNumber; i++)
        select.append("<option value=" + i.toString() + ">" + i + "</option>");
}

function setInlineForm() {
    var selected = select.val();
    var result = selected - current;

    if (result > 0)
        for (var i = 0; i < result; i++)
            appendInline();

    else if (result < 0)
        for (var i = result; i < 0; i++)
            $("#form #inlineForm:last").remove();

    current = selected;
}
