// sticky top need padding cause of fixed nav
var navbar_height = document.querySelector('.navbar').offsetHeight;


var fullHeight1 = document.querySelectorAll('[hein="fullHeight1"]');
[].forEach.call(fullHeight1, function (fh) {
    fh.style.height = "calc( 100vh - " + navbar_height + "px - 5px)";
    fh.style.overflowY = "auto";
});
var els = document.querySelectorAll('.offsetNav');
[].forEach.call(els, function (el) {
    el.style.top = navbar_height + 'px';
});