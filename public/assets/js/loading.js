$(window).on('load', function () {
    $(".status").fadeOut(1800);
    $(".preloader").delay(900).fadeOut("slow");
});

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})