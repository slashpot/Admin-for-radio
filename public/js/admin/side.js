var currentLink = $('a[href=window.location.pathname]'); 

$(document).ready(function () {
    currentLink.attr('class') = active;
});