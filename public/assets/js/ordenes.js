$(function () {
    $(".sidebar-link").click(function () {
        $(".sidebar-link").removeClass("is-active");
        $(this).addClass("is-active");
    });
});

$(window)
    .resize(function () {
        if ($(window).width() > 1090) {
            $(".sidebar").removeClass("collapse");
        } else {
            $(".sidebar").addClass("collapse");
        }
    })
    .resize();


$(".recibidas").hide();
$(".enviadas").hide();
$(".entregadas").hide();
$(".anuladas").hide();

$(function () {
    $(".logo, .logo-expand, .pendientes_link").on("click", function (e) {
        $(".main-container").scrollTop(0);
        $(".pendientes").show();
        $(".recibidas").hide();
        $(".enviadas").hide();
        $(".entregadas").hide();
        $(".anuladas").hide();
    });
    $(".recibidas_link").on("click", function (e) {
        $(".main-container").scrollTop(0);
        $(".sidebar-link").removeClass("is-active");
        $(".recibidas_link").addClass("is-active");
        $(".recibidas").show();
        $(".enviadas").hide();
        $(".entregadas").hide();
        $(".pendientes").hide();
        $(".anuladas").hide();
    });
    $(".enviadas_link").on("click", function (e) {
        $(".main-container").scrollTop(0);
        $(".sidebar-link").removeClass("is-active");
        $(".enviadas_link").addClass("is-active");
        $(".enviadas").show();
        $(".entregadas").hide();
        $(".recibidas").hide();
        $(".pendientes").hide();
        $(".anuladas").hide();
    });
    $(".entregadas_link").on("click", function (e) {
        $(".main-container").scrollTop(0);
        $(".sidebar-link").removeClass("is-active");
        $(".entregadas_link").addClass("is-active");
        $(".enviadas").hide();
        $(".entregadas").show();
        $(".recibidas").hide();
        $(".pendientes").hide();
        $(".anuladas").hide();
    });
    $(".anuladas_link").on("click", function (e) {
        $(".main-container").scrollTop(0);
        $(".sidebar-link").removeClass("is-active");
        $(".anuladas_link").addClass("is-active");
        $(".enviadas").hide();
        $(".entregadas").hide();
        $(".recibidas").hide();
        $(".pendientes").hide();
        $(".anuladas").show();
    });
});
